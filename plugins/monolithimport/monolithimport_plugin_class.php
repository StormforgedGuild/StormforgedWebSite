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

if ( !defined('EQDKP_INC') ) {
	die('You cannot access this file directly.');
}

class monolithimport extends plugin_generic {

	public $vstatus = 'Stable';
	public $version = '1.1.1';
	
	protected static $apiLevel = 23;
	
	public function __construct() {
		parent::__construct();

		$this->add_dependency(array(
			'plus_version' => '2.3',
			'games'	=> array('wow', 'wowclassic')
		));

		$this->add_data(array(
			'name'				=> 'MonolithDKP-Import',
			'code'				=> 'monolithimport',
			'path'				=> 'monolithimport',
			'contact'			=> 'https://eqdkp-plus.eu',
			'template_path' 	=> 'plugins/monolithimport/templates/',
			'version'			=> $this->version,
			'author'			=> 'GodMod',
			'description'		=> $this->user->lang('monolithimport_short_desc'),
			'long_description'	=> $this->user->lang('monolithimport_long_desc'),
			'homepage'			=> EQDKP_PROJECT_URL,
			'manuallink'		=> 'https://wiki.eqdkp-plus.eu/',
			'icon'				=> 'fa-list-alt',
			)
		);

		//permissions
		$this->add_permission('a', 'import', 'N', $this->user->lang('monolithimport_import'), array(2,3));

		//menu
		$this->add_menu('admin', $this->gen_admin_menu());
	}
	
	public function pre_install() {
		//initialize config
		$this->config->set('last_lootimport', 0, 'monolithimport');
		$this->config->set('last_dkpimport', 0, 'monolithimport');
	}

	
	public function gen_admin_menu() {
		return array(array(
			'icon' => 'fa-list-alt',
			'name' => $this->user->lang('monolithimport'),
			1 => array(
				'link' => 'plugins/' . $this->code . '/admin/import.php'.$this->SID,
				'text' => $this->user->lang('monolithimport_import'),
				'check' => 'a_monolithimport_import',
				'icon' => 'fa-upload'),
			2 => array(
				'link' => 'plugins/' . $this->code . '/admin/export.php'.$this->SID,
				'text' => $this->user->lang('monolithimport_export'),
				'check' => 'a_monolithimport_import',
				'icon' => 'fa-download')
		));
	}

}
?>
