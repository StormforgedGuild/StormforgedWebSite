<?php
/*	Project:	EQdkp-Plus
 *	Package:	Last Comments Portal Module
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2016 EQdkp-Plus Developer Team
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

if(!defined('EQDKP_INC')){
	header('HTTP/1.0 404 Not Found');exit;
}

class login_portal extends portal_generic {
	protected static $path = 'login';
	
	protected static $data = array(
		'name'			=> 'Login Module',
		'version'		=> '1.0.4',
		'author'		=> 'GodMod',
		'icon'			=> 'fa-user',
		'contact'		=> EQDKP_PROJECT_URL,
		'description'	=> 'Shows an login form',
		'multiple'		=> false,
		'lang_prefix'	=> 'pmlogin_'
	);
	protected static $apiLevel = 20;
	
	protected static $install = array(
		'autoenable'		=> '1',
		'defaultposition'	=> 'right',
		'defaultnumber'		=> '2',
	);
	public $template_file = 'login_portal.html';
	
	public function get_settings($state){
		$settings = array();
		
		return $settings;
	}
	
	public function output(){
		$strAvatarImg = ($this->user->is_signedin() && $this->pdh->get('user', 'avatarimglink', array($this->user->id))) ? $this->pfh->FileLink($this->pdh->get('user', 'avatarimglink', array($this->user->id)), false, 'absolute') : $this->server_path.'images/global/avatar-default.svg';
		
		//Registration Link
		$registerLink = '';
		if ( ! $this->user->is_signedin() && intval($this->config->get('enable_registration'))){
			//CMS register?
			if ($this->config->get('cmsbridge_active') == 1 && strlen($this->config->get('cmsbridge_reg_url'))){
				$registerLink = $this->core->createLink($this->core->handle_link($this->config->get('cmsbridge_reg_url'),$this->user->lang('menu_register'),$this->config->get('cmsbridge_embedded'),'BoardRegister', '', '', 'fa fa-user-plus fa-lg', ''), 'register');
			} else {
				$registerLink = $this->core->createLink(array('link' => $this->controller_path_plain.'Register' . $this->routing->getSeoExtension().$this->SID, 'text' => $this->user->lang('menu_register'), 'icon' => 'fa fa-user-plus fa-lg'), 'register');
			}
		}
		
		//Notifications
		$arrNotifications = $this->ntfy->createNotifications();
		$this->tpl->assign_vars(array(
				'NOTIFICATION_COUNT_RED'	=> $arrNotifications['count2'],
				'NOTIFICATION_COUNT_YELLOW' => $arrNotifications['count1'],
				'NOTIFICATION_COUNT_GREEN' 	=> $arrNotifications['count0'],
				'NOTIFICATION_COUNT_TOTAL'	=> $arrNotifications['count'],
				'NOTIFICATIONS'				=> $arrNotifications['html'],
		));
		
		
		$this->tpl->assign_vars(array(
				'AUTH_LOGIN_BUTTON'			=> (!$this->user->is_signedin()) ? implode(' ', $this->user->handle_login_functions('login_button')) : '',
				'S_SHOW_PWRESET_LINK'		=> ($this->config->get('cmsbridge_active') == 1 && !strlen($this->config->get('cmsbridge_pwreset_url'))) ? false : true,
				'U_PWRESET_LINK'			=> ($this->config->get('cmsbridge_active') == 1 && strlen($this->config->get('cmsbridge_pwreset_url'))) ? $this->core->createLink($arrPWresetLink) : '<a href="'.$this->controller_path."Login/LostPassword/".$this->SID."\">".$this->user->lang('lost_password').'</a>',
				'USER_AVATAR'				=> $strAvatarImg,
				'U_USER_PROFILE'			=> $this->routing->build('user', (isset($this->user->data['username']) ? sanitize($this->user->data['username']) : $this->user->lang('anonymous')), 'u'.$this->user->id),
				'HONEYPOT_VALUE'			=> $this->user->csrfGetToken("honeypot"),
				'USER_IS_AWAY'				=> ($this->user->data['user_id'] > 0) ? $this->pdh->get('calendar_raids_attendees', 'user_awaymode', array($this->user->data['user_id'])) : false,
				'U_LOGOUT'					=> $this->controller_path.'Login/Logout'.$this->routing->getSeoExtension().$this->SID.'&amp;link_hash='.$this->user->csrfGetToken("login_pageobjectlogout"),
				'U_REGISTER'				=> $registerLink,
				'U_CHARACTERS'				=> ($this->user->is_signedin() && !$this->config->get('disable_guild_features') && $this->user->check_auths(array('u_member_man', 'u_member_add', 'u_member_conn', 'u_member_del'), 'OR', false)) ? $this->controller_path.'MyCharacters' . $this->routing->getSeoExtension().$this->SID : '',
		));
		
		$this->header = (!$this->user->is_signedin()) ? $this->user->lang('login') : $this->user->lang('user');
		
		return 'Error: Template file is empty.';
	}
}
?>