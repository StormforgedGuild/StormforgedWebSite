<?php
/*	Project:	EQdkp-Plus
 *	Package:	monolithimport Plugin
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2015 EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if(!defined('EQDKP_INC')) {
	header('HTTP/1.0 Not Found');
	exit;
}

if(!class_exists('monolith_parser')) {
	class monolith_parser extends gen_class {
		public function __construct() {
		}
		
		public function parse($strDKPTable, $strLootHistory, $strDKPHistory, $intEventID, $intItempoolID){	
			if($this->config->get('dkp_easymode')){
				$intItempoolID = $this->pdh->get('event', 'def_itempool', array($intEventID));
			}
			
			if ($objLog = simplexml_load_string($strDKPTable)){
				//Build itemList
				$blnRaidItemList = false;
				$arrItemMembernameServernameList = array();
				$arrItemMemberList = $arrAdjMemberList = array();
				$arrItemList = array();
				
				$arrMember = array();
				$arrAdjustment = array();
				
				$strCurrentTime = $this->time->date("Y-m-d H:i");
				$intTime = $this->time->time;
				
				
				$objLootHistory = simplexml_load_string($strLootHistory);
				
				$intLastLootImport = $this->config->get('last_lootimport', 'monolithimport');
				if(!$intLastLootImport) $intLastLootImport = 0;
				$intNewLastLootImport = $intLastLootImport;
				
				//Items
				foreach($objLootHistory->lootentry as $objLootItem){
					
					$strBuyerName = $objLootItem->player;
					if(strpos($strBuyerName, '-') === false){
						$strBuyerName = $strBuyerName.'-'.unsanitize($this->config->get('servername'));
					}
					
					$strGameID = intval($objLootItem->itemnumber);
					$strItemname = (string)$objLootItem->itemname;
					$floatValue = (float)$objLootItem->cost;
					$floatValue = runden($floatValue);
					$time = (int)$objLootItem->timestamp;
					
					if($time > $intNewLastLootImport) $intNewLastLootImport = $time;
					
					if($time <= $intLastLootImport) continue;
					
					$arrItemList[] = array(
						'gameid' => $strGameID,
						'value'	 => $floatValue,
						'buyer'	 => $strBuyerName,
						'name' => $strItemname,
					);
					$arrItemMemberList[$strBuyerName] += $floatValue;

				}
				
				//Adjustments
				$intLastDKPImport = $this->config->get('last_dkpimport', 'monolithimport');
				if(!$intLastDKPImport) $intLastDKPImport = 0;
				
				$intNewLastDKPImport = $intLastDKPImport;
				
				$objDKPHistory = simplexml_load_string($strDKPHistory);
				foreach($objDKPHistory->historyentry as $objAdj){
					$strPlayers = (string)$objAdj->playerstring;
					$arrPlayers = explode(',', $strPlayers);
					
					$strValues = (string)$objAdj->dkp;
					$arrValues = explode(',', $strValues);
					
					$fltValue = (float)$objAdj->dkp;
					$time = (int)$objAdj->timestamp;
					$strReason = (string)$objAdj->reason;
					
					if($time > $intNewLastDKPImport) $intNewLastDKPImport = $time;
					if($time <= $intLastDKPImport) continue;
					
					foreach($arrPlayers as $k => $strPlayer){
						if(!strlen($strPlayer)) continue;
						
						list($membername, $servername) = explode('-', $strPlayer);
						$servername = preg_replace_callback(
								"/([^A-Z\'\"\-; ])([A-Z])/",
								function($m) { return $m[1].' '.$m[2]; },
								$servername
								);
						
						$strMembername = trim($membername);
						
						$strServername = (isset($servername) && strlen($servername)) ? trim($servername) : $this->config->get('servername');
						
						$strFullMembername = $strMembername.'-'.unsanitize($strServername);
						$strValue = (count($arrValues)>1) ? $arrValues[$k] : $fltValue;
						
						if(strpos($strValue, '%') !== false){
							continue;
						}
						
						$value = (float)$strValue;
						$value = runden($value);
												
							//create adjustment
							$arrAdjustment[$value.'__'.$strReason][] = array(
									'value' => $value,
									'member_name'=> $strFullMembername,
									'reason'=> $strReason,
							);
							if(!isset($arrAdjMemberList[$strFullMembername])) $arrAdjMemberList[$strFullMembername] = 0;
							$arrAdjMemberList[$strFullMembername] += $value;
					}
					
				}


				//The members
				foreach($objLog->dkpentry as $objRosterItem){
					list($membername, $servername) = explode('-', $objRosterItem->player);
					$servername = preg_replace_callback(
							"/([^A-Z\'\"\-; ])([A-Z])/",
							function($m) { return $m[1].' '.$m[2]; },
							$servername
					);
					
					$strMembername = trim($membername);

					$strServername = (isset($servername) && strlen($servername)) ? trim($servername) : $this->config->get('servername'); 
					
					$strFullMembername = $strMembername.'-'.unsanitize($strServername);
					
					$floatEP = (float)$objRosterItem->dkp;
					
					$strClass = (string)$objRosterItem->class;
					
					$intClassID = $this->resolveClassname($strClass);
															
					//Get MemberID, if none, create member
					$intMemberID = $this->pdh->get('member', 'id', array(sanitize($strMembername), array('servername' => sanitize($strServername))));
					
					if (!$intMemberID){
						//create new Member
						$data = array(
							'name' 		=> $strMembername,
							'level'		=> 0,
							'race'		=> 0,
							'class'		=> $intClassID,
							'rankid'	=> $this->pdh->get('rank', 'default', array()),
							'servername'=> $strServername,
						);
						$intMemberID = $this->pdh->put('member', 'addorupdate_member', array(0, $data));
						$this->pdh->process_hook_queue();
						
						$floatCurrentEP = 0;
					} else {
						$arrMDKPools = $this->pdh->get('event', 'multidkppools', array($intEventID));
						$intMultidkpID = $arrMDKPools[0];
						$floatCurrentEP = $this->pdh->get('points', 'current', array($intMemberID, $intMultidkpID, 0, 0));
					}
										
					$floatAdjustement = ($floatEP + ((isset($arrItemMemberList[$strFullMembername])) ? $arrItemMemberList[$strFullMembername] : 0) - ((isset($arrAdjMemberList[$strFullMembername])) ? $arrAdjMemberList[$strFullMembername] : 0)) - $floatCurrentEP;
					
					if ($floatAdjustement != 0){
						//create adjustment
						$strReason =  'MonolithDKP Import '.$strCurrentTime;
						$arrAdjustment[$floatAdjustement.'__'.$strReason][] = array(
							'value' => runden($floatAdjustement),
							'member'=> $intMemberID,
							'reason'=> $strReason,
						);
					}
					
					$arrMember[] = $intMemberID;
				}		
				
				//Create raid with value 0
				$raid_upd = $this->pdh->put('raid', 'add_raid', array($intTime, $arrMember, $intEventID, 'MonolithDKP Import '.$strCurrentTime, 0));

				if ($raid_upd){
					//Add Adjustments
					
					foreach ($arrAdjustment as $val => $a){
						$arrMembers = array();
						foreach($a as $adj){
							if($adj['value'] == 0) continue;
							
							if(!isset($adj['member'])){
								$arrMembername = explode("-", $adj['member_name']);
								$strBuyerName = trim($arrMembername[0]);
								$strBuyerServername = (isset($arrMembername[1]) && strlen($arrMembername[1])) ? trim($arrMembername[1]) : $this->config->get('servername');
								$intMemberID = $this->pdh->get('member', 'id', array($strBuyerName, array('servername' => $strBuyerServername)));
								if($intMemberID){
									$arrMembers[] = $intMemberID;	
								}
							} else {
								$arrMembers[] = $adj['member'];	
							}
						}
						
						$adj_upd[] = $this->pdh->put('adjustment', 'add_adjustment', array($adj['value'], $adj['reason'], $arrMembers, $intEventID, $raid_upd, $intTime));
					}

					//Add Items
					foreach ($arrItemList as $item){
						if ($item['value'] == 0) continue;
						
						$arrMembername = explode("-", $item['buyer']);
						$strBuyerName = trim($arrMembername[0]);
						$strBuyerServername = (isset($arrMembername[1]) && strlen($arrMembername[1])) ? trim($arrMembername[1]) : $this->config->get('servername');
						
						$intMemberID = $this->pdh->get('member', 'id', array($strBuyerName, array('servername' => $strBuyerServername)));
						if ($intMemberID) {
							$item_upd[] = $this->pdh->put('item', 'add_item', array($item['name'], $intMemberID, $raid_upd, $item['gameid'], $item['value'], $intItempoolID, $intTime));
						} else {

						}
					}
					
					$this->config->set('last_lootimport', $intNewLastLootImport, 'monolithimport');
					$this->config->set('last_dkpimport', $intNewLastDKPImport, 'monolithimport');
					
					$this->pdh->process_hook_queue();
					return $raid_upd;
				}
			} 
			
			return false;
		}

	
		private function resolveClassname($strClassname){
			if(strtolower($strClassname) == strtolower('DEATHKNIGHT')){
				$strClassname = "Death Knight";
			}
			if(strtolower($strClassname) == strtolower('DEMONHUNTER')){
				$strClassname = "Demon Hunter";
			}
			
			$intClassID = $this->game->get_id('classes', $strClassname);
			return $intClassID;
		}
		
	}
}
?>