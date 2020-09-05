<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2017
 * Date:		$Date: 2017-11-20 00:00:00 +0400 (Mon, 20 Jan 2017) $
 * -----------------------------------------------------------------------
 * @author		$Author: Darkmaeg $
 * @copyright	2006-2017 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.eu
 * @package		eqdkp-plus
 * @version		$Rev: 00001 $
 * 
 * $Id: eq2guildinfo_portal.class.php 00001 2017-11-20 00:00:00Z Darkmaeg $
 * Shows guild info about members
 *
 * This version populates the guild member data from the Data Api
 *
 * V1.0 Initial Release 
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

class eq2guildinfo_portal extends portal_generic {
	protected static $path		= 'eq2guildinfo';
	protected static $data		= array(
		'name'			=> 'EQ2 guildinfo',
		'version'		=> '1.0',
		'author'		=> 'Darkmaeg',
		'contact'		=> EQDKP_PROJECT_URL,
		'description'	=> 'Everquest 2 Guild Info',
		'multiple'		=> false,
		'lang_prefix'	=> 'eq2guildinfo_'
	);
	protected static $positions = array('left1', 'left2', 'right');
	protected static $install	= array(
		'autoenable'		=> '0',
		'defaultposition'	=> 'right',
		'defaultnumber'		=> '7',
	);
	protected static $apiLevel = 20;
	public function get_settings($state) {
			$settings = array();
		return $settings;
	}
	private $image_path;
	protected function read_url($url) {
		if(!is_object($this->puf)) {
			global $eqdkp_root_path;
			include_once($eqdkp_root_path.'core/urlfetcher.class.php');
			$this->puf = new urlfetcher();
		}
		return $this->puf->fetch($url);
	}
	public function output() {
		//Convert time played
		function seconds2human($ss) {
		$s = $ss%60;
		$m = floor(($ss%3600)/60);
		$h = floor(($ss%86400)/3600);
		$d = floor(($ss%2592000)/86400);
		$M = floor($ss/2592000);
		return "$M months, $d days, $h hours, $m minutes, $s second(s)";
		}
		//Guild Info
		$total = 0; $avgtotal = 0; $level = 0; $tlevel = 0; $leveltotal = 0; $tsleveltotal = 0;
		$gname = ""; $glevel = 0; $toons = 0; $accounts = 0; $avgadv = 0; $realm = "";
		$avgts = 0; $start = ""; $avgquest = ""; $rares = 0; $crafted = 0; $questotal; 
		//Leaderboard
		$statuscontrib = 0; $gstats = 0 ; $statuscontribname = ""; $questcomp = 0; $questcompname = ""; 
		$collcomp = 0; $collcompname = ""; $maxmelee = 0; $maxmeleename = "";
		$maxmagic = 0; $maxmagicname = ""; $rarecoll = 0; $rarecollname = "";
		$crafteditem = 0; $crafteditemname = ""; $tplayed = 0; $tplayedname = ""; $hidden = 0;
		$kills = 0; $killsname = ""; $deaths = 0; $deathsname = "";
		//Adv Class
		$fighter = 0; $berserker = 0; $bruiser = 0; $guardian = 0; $monk = 0; $paladin = 0; $shadowknight = 0;
		$healer = 0; $channeler = 0; $defiler = 0; $fury = 0; $inquisitor = 0; $mystic = 0; $templar = 0; $warden = 0;
		$mage = 0; $coercer = 0; $conjuror = 0; $illusionist = 0; $necromancer = 0; $wizard = 0; $warlock = 0;
		$scout = 0; $assassin = 0; $beastlord = 0; $brigand = 0; $dirge = 0; $ranger = 0; $swashbuckler = 0;
		//Asc Class
		$elementalist = 0; $etherealist = 0; $geomancer = 0; $thaumaturgist = 0; 
		//TS Class
		$craftsman = 0; $crafter = 0; $carpenter = 0; $provisioner = 0; $woodworker = 0;
		$outfitter = 0; $outfit = 0; $armorer = 0; $tailor = 0; $weaponsmith = 0;
		$scholar = 0; $schol = 0; $alchemist = 0; $jeweler = 0; $sage = 0; $artisan = 0;
		//Race
		$aerakyn = 0; $arasai = 0; $barbarian = 0; $darkelf = 0; $dwarf = 0; $erudite = 0; $fae = 0; 
		$freeblood = 0; $froglok = 0; $gnome = 0; $halfelf = 0; $halfling = 0; $highelf = 0; 
		$human = 0; $iksar = 0; $kerran = 0; $ratonga = 0; $ogre = 0; $sarnak = 0; $troll = 0; $woodelf = 0; 
		//Data Update
		$eq2guild = $this->pdc->get('portal.module.eq2guildinfo.'.$this->root_path);
				if (!$eq2guild){
		$this->game->new_object('eq2_daybreak', 'daybreak', array($this->config->get('uc_server_loc'), $this->config->get('uc_data_lang')));
		if(!is_object($this->game->obj['daybreak'])) return "";
		$guilddat = $this->game->obj['daybreak']->guildinfo($this->config->get('guildtag'), $this->config->get('servername'), false);
		$gid 	   = $guilddat['guild_list'][0]['id'];			
		$gname     = $guilddat['guild_list'][0]['name'];	
		$accounts  = $guilddat['guild_list'][0]['accounts'];	
		$toons     = $guilddat['guild_list'][0]['members'];	
		$glevel    = $guilddat['guild_list'][0]['level'];
		$startd    = $guilddat['guild_list'][0]['dateformed'];
		$start     = date('l jS \of F Y', $startd);
		$realm     = $guilddat['guild_list'][0]['world'];
		//Resolve Members Data
		$murl ='http://census.daybreakgames.com/s:eqdkpplus/json/get/eq2/guild/'.$gid.'?c:resolve=members(name.first,statistics,stats,type,collections.complete,quests.complete,playedtime,guild.status,ascension_list)';
		$ginfo		 = $this->read_url($murl);
		$guildmem    = json_decode($ginfo, true);
		$memberlist  = $guildmem['guild_list'][0]['member_list'];
		//Leaderboard
		foreach($memberlist as $member){
		$name = $member['name']['first'];
		$kill = $member['statistics']['kills']['value'];
		$death = $member['statistics']['deaths']['value'];
		$tplay = $member['playedtime'];
		$rare = $member['statistics']['rare_harvests']['value'];
		$craf = $member['statistics']['items_crafted']['value'];
		$maxmag = $member['statistics']['max_magic_hit']['value'];
		$maxmel = $member['statistics']['max_melee_hit']['value'];
		$ques = $member['quests']['complete'];
		$gstatus = $member['guild']['status'];
		$collect = $member['collections']['complete'];
		if ($tplay > $tplayed) {$tplayed = $tplay; $tplayedname = $name;}
		if ($kill > $kills) {$kills = $kill; $killsname = $name;}
		if ($death > $deaths) {$deaths = $death; $deathsname = $name;}
		if ($rare > $rarecoll) {$rarecoll = $rare; $rarecollname = $name;}
		if ($craf > $crafteditem) {$crafteditem = $craf; $crafteditemname = $name;}
		if ($ques > $questcomp) {$questcomp = $ques; $questcompname = $name;}
		if ($maxmag > $maxmagic) {$maxmagic = $maxmag; $maxmagicname = $name;}
		if ($maxmel > $maxmelee) {$maxmelee = $maxmel; $maxmeleename = $name;}
		if ($gstatus > $statuscontrib) 
		{$statuscontrib = $gstatus; $statuscontribname = $name;}
		if ($collect > $collcomp) {$collcomp = $collect; $collcompname = $name;}
		//Check for characters with census turned off
		$id = $member['id'];
		if ($id == NULL) {++$hidden;}
		//Cumulative Totals
		++$total;
		$level = $member['type']['level'];
		$tlevel = $member['type']['ts_level'];
		$leveltotal = $leveltotal + $level;
		$tsleveltotal = $tsleveltotal + $tlevel;
		$rares = $rares + $rare;
		$crafted = $crafted + $craf;
		$questotal = ($questotal + $ques);
		$aclass = $member['type']['class'];
		$tradeclass = $member['type']['ts_class'];
		$aclass = lcfirst($aclass);
		(${$aclass} = ${$aclass} + 1);
		(${$tradeclass} = ${$tradeclass} +1);
		$race = strtolower($member['type']['race']);
		$race = str_replace(' ', '', $race);
		(${$race} = ${$race} + 1);
		//Active Ascension Class
		$ascensionlist = $member['ascension_list'];
		foreach($ascensionlist as $ascension){
			$activeasc = $ascension['active'];
			$ascclass = $ascension['name'];
			($asc = ${$ascclass});
			if ($activeasc == 1) { 
			(${$ascclass} = ${$ascclass} +1);
			}
		}
		}
		$healer = ($channeler + $defiler + $fury + $inquisitor + $mystic + $templar + $warden);
		$fighter = ($berserker + $bruiser + $guardian + $monk + $paladin + $shadowknight);
		$mage = ($coercer + $conjuror + $illusionist + $necromancer + $wizard + $warlock);
		$scout = ($assassin + $beastlord + $brigand + $dirge + $ranger + $swashbuckler);
		$crafter = ($craftsman + $carpenter + $provisioner + $woodworker);
		$outfit = ($outfitter + $armorer + $tailor + $weaponsmith);
		$schol = ($scholar + $alchemist + $jeweler + $sage);
		$avgtotal = ($total - $hidden);
		$avgquest = floor($questotal / $total);
		$avgts = floor($tsleveltotal / $total);	
		$avgadv = floor($leveltotal / $total);	
		$eq2guild = array($gname,$realm,$glevel,$toons,$accounts,$avgadv,$avgts,$start,$avgquest,$rares,$crafted,
		$statuscontribname,$statuscontrib,$questcompname,$questcomp,$collcompname,$collcomp,$maxmeleename,$maxmelee,
		$maxmagicname,$maxmagic,$rarecollname,$rarecoll,$crafteditemname,$crafteditem,$tplayedname,$tplayed,$killsname,$kills,
		$deathsname,$deaths,$hidden,
		$fighter,$berserker,$bruiser,$guardian,$monk,$paladin,$shadowknight,
		$healer,$channeler,$defiler,$fury,$inquisitor,$mystic,$templar,$warden,
		$mage,$coercer,$conjuror,$illusionist,$necromancer,$wizard,$warlock,
		$scout,$assassin,$beastlord,$brigand,$dirge,$ranger,$swashbuckler,
		$elementalist,$etherealist,$geomancer,$thaumaturgist,
		$artisan,$crafter,$craftsman,$carpenter,$provisioner,$woodworker,
		$outfit,$outfitter,$armorer,$tailor,$weaponsmith,
		$schol,$scholar,$alchemist,$jeweler,$sage,
		$aerakyn,$arasai,$barbarian,$darkelf,$dwarf,$erudite,$fae,$freeblood,$froglok,$gnome,
		$halfelf,$halfling,$highelf,$human,$iksar,$kerran,$ratonga,$ogre,$sarnak,$troll,$woodelf
		);
		$this->pdc->put('portal.module.eq2guildinfo.'.$this->root_path, $eq2guild, 86400);
		}
		//Output Totals
		$out .= "<style>#toggle-view {
				list-style:none;	
				font-family:arial;
				font-size:12px;
				margin:0;
				padding:0;
				width:180px;
			}
				#toggle-view li {
				margin:10px;
				border-bottom:1px solid #ccc;
				position:relative;
				cursor:pointer;
			}
				#toggle-view h3 {
				margin:0;
				font-size:14px;
			}
				#toggle-view span {
				position:absolute;
				right:5px; top:0;
				color:#ccc;
				font-size:13px;
			}
				#toggle-view .panel {
				margin:5px 0;
				display:none;
			}</style>";
		$out .= "<script>$(document).ready(function () {
				$('#toggle-view li').click(function () {
				var text = $(this).children('div.panel');
				if (text.is(':hidden')) {
				text.slideDown('200');
				$(this).children('span').html('-');		
				} else {
				text.slideUp('200');
				$(this).children('span').html('+');		
				}});});</script>";
		$out .= '<center>';
		$out .= '<ul id="toggle-view">';
		$out .= '<div class="guildinfo">';	
		$out .= '<br>Guild Name:<br>';
		$out .= $eq2guild[0].'<br>';
		$out .= 'Server:<br>';
		$out .= $eq2guild[1].'<br>';
		$out .= 'Guild Level: '.$eq2guild[2].'<br>';
		$out .= 'Total Characters: '.$eq2guild[3].'<br>';
		$out .= 'Unique Members: '.$eq2guild[4].'<br>';
		$out .= 'Average Adventure Level: '.$eq2guild[5].'<br>';
		$out .= 'Average Tradeskill Level: '.$eq2guild[6].'<br>';
		$out .= '▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>';
		$out .= 'Date Formed:<br>';
		$out .= $eq2guild[7].'<br>';
		$out .= 'Average Quest Completed: '.number_format($eq2guild[8]).'<br>';
		$out .= 'Total Rares Harvested: '.number_format($eq2guild[9]).'<br>';
		$out .= 'Total Items Crafted: '.number_format($eq2guild[10]).'<br>';
		$out .= '</div>';
		$out .= '▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>';
		$out .= '</ul>';
		$out .= '<ul id="toggle-view">';
		$out .= '<div class="leaderboards">';	
		$out .= 'Highest Guild Status Contributer:<br>';
		$out .= $eq2guild[11].' - '.number_format($eq2guild[12]).'<br>';
		$out .= 'Most Quests Completed:<br>';
		$out .= $eq2guild[13].' - '.number_format($eq2guild[14]).'<br>';
		$out .= 'Highest Collections Completed:<br>';
		$out .= $eq2guild[15].' - '.number_format($eq2guild[16]).'<br>';
		$out .= 'Highest Max Melee Hit:<br>';
		$out .= $eq2guild[17].' - '.number_format($eq2guild[18]).'<br>';
		$out .= 'Highest Max Magic Hit:<br>';
		$out .= $eq2guild[19].' - '.number_format($eq2guild[20]).'<br>';
		$out .= 'Most Rares Harvested:<br>';
		$out .= $eq2guild[21].' - '.number_format($eq2guild[22]).'<br>';
		$out .= 'Most Items Crafted:<br>';
		$out .= $eq2guild[23].' - '.number_format($eq2guild[24]).'<br>';
		$out .= 'Longest Time Played: '.$eq2guild[25].'<br>';
		$out .= seconds2human($eq2guild[26]).'<br>';
		$out .= 'Most Kills:<br>';
		$out .= $eq2guild[27].' - '.number_format($eq2guild[28]).'<br>';
		$out .= 'Most Deaths:<br>';
		$out .= $eq2guild[29].' - '.number_format($eq2guild[30]).'<br>';
		$out .= 'Hidden from Census: '.$eq2guild[31].'<br>';
		$out .= '▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>';
		$out .= '</div>';
		$out .= '</ul>';
		$out .= '<ul id="toggle-view">
				<p><u>Class Breakdown</u></p>
				<li>Fighters: '.$eq2guild[32].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Berserker: '.$eq2guild[33].'<br></tr>
				<tr>Bruiser: '.$eq2guild[34].'<br></tr>
				<tr>Guardian: '.$eq2guild[35].'<br></tr>
				<tr>Monk: '.$eq2guild[36].'<br></tr>
				<tr>Paladin: '.$eq2guild[37].'<br></tr>
				<tr>Shadowknight: '.$eq2guild[38].'</tr>
				</td></table>
				</div>
				</li>
				<li>Healers: '.$eq2guild[39].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Channeler: '.$eq2guild[40].'<br></tr>
				<tr>Defiler: '.$eq2guild[41].'<br></tr>
				<tr>Fury: '.$eq2guild[42].'<br></tr>
				<tr>Inquisitor: '.$eq2guild[43].'<br></tr>
				<tr>Mystic: '.$eq2guild[44].'<br></tr>
				<tr>Templar: '.$eq2guild[45].'<br></tr>
				<tr>Warden: '.$eq2guild[46].'</tr>
				</td></table>
				</div>
				</li>
				<li>Mages: '.$eq2guild[47].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Coercer: '.$eq2guild[48].'<br></tr>
				<tr>Conjuror: '.$eq2guild[49].'<br></tr>
				<tr>Illusionist: '.$eq2guild[50].'<br></tr>
				<tr>Necromancer: '.$eq2guild[51].'<br></tr>
				<tr>Wizard: '.$eq2guild[52].'<br></tr>
				<tr>Warlock: '.$eq2guild[53].'</tr>
				</td></table>
				</div>
				</li>
				<li>Scouts: '.$eq2guild[54].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Assassin: '.$eq2guild[55].'<br></tr>
				<tr>Beastlord: '.$eq2guild[56].'<br></tr>
				<tr>Brigand: '.$eq2guild[57].'<br></tr>
				<tr>Dirge: '.$eq2guild[58].'<br></tr>
				<tr>Ranger: '.$eq2guild[59].'<br></tr>
				<tr>Swashbuckler: '.$eq2guild[60].'</tr>
				</td></table>
				</div>
				</li>
				</ul>';
		$out .= '<ul id="toggle-view"><br>
				<li>Ascensions
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Elementalist: '.$eq2guild[61].'<br></tr>
				<tr>Etherealist: '.$eq2guild[62].'<br></tr>
				<tr>Geomancer: '.$eq2guild[63].'<br></tr>
				<tr>Thaumaturgist: '.$eq2guild[64].'</tr>
				</td></table>
				</div>
				</li>';
		$out .= '<ul id="toggle-view"><br>
				<p><u>Tradeskill Breakdown</u></p>
				<p>Artisan : '.$eq2guild[65].'</p>
				<li>Craftsmen: '.$eq2guild[66].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Crafsman: '.$eq2guild[67].'<br></tr>
				<tr>Carpenter: '.$eq2guild[68].'<br></tr>
				<tr>Provisioner: '.$eq2guild[69].'<br></tr>
				<tr>Woodworker: '.$eq2guild[70].'</tr>
				</td></table>
				</div>
				</li>
				<li>Outfitters: '.$eq2guild[71].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Outfitter: '.$eq2guild[72].'<br></tr>
				<tr>Armorer: '.$eq2guild[73].'<br></tr>
				<tr>Tailor: '.$eq2guild[74].'<br></tr>
				<tr>Weaponsmith: '.$eq2guild[75].'</tr>
				</td></table>
				</div>
				</li>
				<li>Scholars: '.$eq2guild[76].'
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Scholar: '.$eq2guild[77].'<br></tr>
				<tr>Alchemist: '.$eq2guild[78].'<br></tr>
				<tr>Jeweler: '.$eq2guild[79].'<br></tr>
				<tr>Sage: '.$eq2guild[80].'</tr>
				</td></table>
				</div>
				</li>
				</ul>';
		$out .= '<ul id="toggle-view"><br>
				<li><u>Race Breakdown</u>
				<span>+</span>
				<div class="panel">
				<table><td>
				<tr>Aerakyn: '.$eq2guild[81].'<br></tr>
				<tr>Arasai: '.$eq2guild[82].'<br></tr>
				<tr>Barbarian: '.$eq2guild[83].'<br></tr>
				<tr>Dark Elf: '.$eq2guild[84].'<br></tr>
				<tr>Dwarf: '.$eq2guild[85].'<br></tr>
				<tr>Erudite: '.$eq2guild[86].'<br></tr>
				<tr>Fae: '.$eq2guild[87].'<br></tr>
				<tr>Freeblood: '.$eq2guild[88].'<br></tr>
				<tr>Froglok: '.$eq2guild[89].'<br></tr>
				<tr>Gnome: '.$eq2guild[90].'<br></tr>
				<tr>Half Elf: '.$eq2guild[91].'<br></tr>
				<tr>Halfling: '.$eq2guild[92].'<br></tr>
				<tr>High Elf: '.$eq2guild[93].'<br></tr>
				<tr>Human: '.$eq2guild[94].'<br></tr>
				<tr>Iksar: '.$eq2guild[95].'<br></tr>
				<tr>Kerra: '.$eq2guild[96].'<br></tr>
				<tr>Ratonga: '.$eq2guild[97].'<br></tr>
				<tr>Ogre: '.$eq2guild[98].'<br></tr>
				<tr>Sarnak: '.$eq2guild[99].'<br></tr>
				<tr>Troll: '.$eq2guild[100].'<br></tr>
				<tr>Wood Elf: '.$eq2guild[101].'<br></tr>
				</td></table>
				</div>
				</li>';
		$out .= '</center>';
		$out .= '</center>';
		return $out;
	}
}
?>