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
			'insert'	=> array('process' => 'insert_log')
		);
		parent::__construct(false, $handler);
		$this->process();
	}
	
	public function insert_log(){
		if ($this->in->get('log', '') != ''){
			include_once("../includes/monolith_parser.class.php");
			$parser = register('monolith_parser');
			
			//Check if event belongs to more than one MultiDKP-Pool
			$arrMDKPPools = $this->pdh->get('event', 'multidkppools', array($this->in->get('event', 0)));
			if (count($arrMDKPPools) > 1){
				$this->core->message($this->user->lang('monolithimport_error_more_mdkp4event'), $this->user->lang('error'), 'red');
				$this->display();
				return;
			}
			
			$strDKPTable = $this->in->get('log', '', 'raw');
			$strLootHistory = $this->in->get('loothistory', '', 'raw');
			$strDKPHistory = $this->in->get('dkphistory', '', 'raw');

			$mixedResult = $parser->parse($strDKPTable, $strLootHistory, $strDKPHistory, $this->in->get('event', 0),  $this->in->get('itempool', 0));
			
			if (!$mixedResult){
				//error
				$this->core->message($this->user->lang('monolithimport_error_wrongformat'), $this->user->lang('error'), 'red');
			} else {
				//success
				$this->core->message($this->user->lang('monolithimport_success'), $this->user->lang('success'), 'green');
				
				$this->tpl->assign_vars(array(
					'RAID_ID'  => $mixedResult,
				));

				$this->core->set_vars(array(
					'page_title'        => $this->user->lang('monolithimport_import'),
					'template_path'     => $this->pm->get_data('monolithimport', 'template_path'),
					'template_file'     => 'admin/finished.html',
						'page_path'			=> [
								['title'=>$this->user->lang('menu_admin_panel'), 'url'=>$this->root_path.'admin/'.$this->SID],
								['title'=>$this->user->lang('monolithimport').': '.$this->user->lang('monolithimport_import'), 'url'=>' '],
						],
					'display'           => true,
					)
				);
				
			}
		} else {
			$this->core->message($this->user->lang('monolithimport_error_nolog'), $this->user->lang('error'), 'red');
		}
	}

	public function display($messages=array(), $blnImportFinished=false) {

		//fetch events
		$events = $this->pdh->aget('event', 'name', 0, array($this->pdh->get('event', 'id_list')));
		asort($events);
		
		//fetch itempools
		$itempools = $this->pdh->aget('itempool', 'name', 0, array($this->pdh->get('itempool', 'id_list')));
		asort($itempools);
		
		$this->tpl->assign_vars(array(
			'EVENTS'			=> (new hdropdown('event', array('options' => $events)))->output(),
			'ITEMPOOLS'			=> (new hdropdown('itempool', array('options' => $itempools)))->output(),
		));

		$this->core->set_vars(array(
			'page_title'        => $this->user->lang('monolithimport_import'),
			'template_path'     => $this->pm->get_data('monolithimport', 'template_path'),
			'template_file'     => 'admin/insert.html',
				'page_path'			=> [
						['title'=>$this->user->lang('menu_admin_panel'), 'url'=>$this->root_path.'admin/'.$this->SID],
						['title'=>$this->user->lang('monolithimport').': '.$this->user->lang('monolithimport_import'), 'url'=>' '],
				],
			'display'           => true,
			)
		);
	}
}
registry::register('monolith_import');
?>