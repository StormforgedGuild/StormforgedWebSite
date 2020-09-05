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

// EQdkp required files/vars
define('EQDKP_INC', true);
define('IN_ADMIN', true);
$eqdkp_root_path = './../../../';
include_once($eqdkp_root_path.'common.php');

class monolith_import extends page_generic {

	public function __construct() {
		$this->user->check_auth('a_monolithimport_import');
		
		$handler = array(
			'export'	=> array('process' => 'export')
		);
		parent::__construct(false, $handler);
		$this->process();
	}
	
	public function export(){
		//Create DKPTable
		$intPoolID = $this->in->get('poolid', 0);
		
		$arrRankFilter = $this->in->getArray('rank');
		
		include_once($this->root_path . 'core/data_export.class.php');
		$myexp = new content_export();
		$arrData = $myexp->export(0, 0, false, false, true);
		$arrEntry = array();
		foreach($arrData['players'] as $arrPlayerData){
			$intRank = $this->pdh->get('member', 'rankid', array($arrPlayerData['id']));
			if(count($arrRankFilter) && !in_array($intRank, $arrRankFilter)){
				continue;
			}
			
			$arrPoints = $arrPlayerData['points']['multidkp_points:'.$intPoolID];
			$arrEntry['dkpentry:'.$arrPlayerData['id']] = array(
					'player' => $arrPlayerData['name'],
					'class' => strtoupper($this->game->get_name('classes', $arrPlayerData['class_id'], 'english')),
					'dkp' => runden($arrPoints['points_current']),
					'lifetimegained' => runden($arrPoints['points_earned']),
					'lifetimespent' => runden($arrPoints['points_spent']),
			);
		}
		
		$xml_array = $this->xmltools->array2simplexml($arrEntry, 'dkptable');
		
		$dom = dom_import_simplexml($xml_array)->ownerDocument;

		$string = $dom->saveXML();
		$string = str_replace("<?xml version=\"1.0\"?>\n", "", $string);
		
		@header('Pragma: no-cache');
		@header("Content-Type: application/zip; name=\"DKPTable.xml\"");
		@header("Content-disposition: attachment; filename=DKPTable.xml");
		
		echo $string;
		
		exit;
	}

	public function display($messages=array(), $blnImportFinished=false) {		
		$multilist = $this->pdh->get('multidkp', 'id_list', array());
		$arrOverviewSettings = $this->pdh->get_page_settings('listmembers', 'hptt_listmembers_memberlist_overview');
		$defaultPoolOverview = (isset($arrOverviewSettings['default_pool_ov'])) ? $arrOverviewSettings['default_pool_ov'] : $multilist[0];
		
		$arrMultiNames = $this->pdh->aget('multidkp', 'name', 0, array($multilist));
		
		$arrRanks			= $this->pdh->aget('rank', 'name', 0, array($this->pdh->get('rank', 'id_list', array())));

		$this->tpl->assign_vars(array(
			'MULTIDKPPOOLS'			=> (new hdropdown('poolid', array('options' => $arrMultiNames, 'value' => $defaultPoolOverview)))->output(),
			'MS_RANK'				=> (new hmultiselect('rank', array('options' => $arrRanks)))->output(),
		));
		
		

		$this->core->set_vars(array(
			'page_title'        => $this->user->lang('monolithimport_export'),
			'template_path'     => $this->pm->get_data('monolithimport', 'template_path'),
			'template_file'     => 'admin/export.html',
				'page_path'			=> [
						['title'=>$this->user->lang('menu_admin_panel'), 'url'=>$this->root_path.'admin/'.$this->SID],
						['title'=>$this->user->lang('monolithimport').': '.$this->user->lang('monolithimport_export'), 'url'=>' '],
				],
			'display'           => true,
			)
		);
	}
}
registry::register('monolith_import');
?>