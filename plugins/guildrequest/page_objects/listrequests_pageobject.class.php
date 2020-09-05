<?php
/*	Project:	EQdkp-Plus
 *	Package:	GuildRequest Plugin
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

class listrequests_pageobject extends pageobject
{
  /**
   * __dependencies
   * Get module dependencies
   */
  public static function __shortcuts()
  {
    $shortcuts = array('email' => 'MyMailer');
    return array_merge(parent::__shortcuts(), $shortcuts);
  }
  
  /**
   * Constructor
   */
  public function __construct()
  {
    // plugin installed?
    if (!$this->pm->check('guildrequest', PLUGIN_INSTALLED))
      message_die($this->user->lang('gr_plugin_not_installed'));
	
	$this->user->check_auth('u_guildrequest_view');
	
    $handler = array(
		//'vote' => array('process' => 'vote', 'csrf' => true, 'check' => 'u_guildrequest_vote'),
		'mark_all_read' => array('process' => 'mark_all_read', 'csrf' => 'true'),
    );
    parent::__construct(false, $handler, array('guildrequest_requests', 'username'), null, 'gr[]');

    $this->process();
  }
	
	public function mark_all_read(){
		$arrApplicationIDs = $this->pdh->get('guildrequest_requests', 'id_list', array());
		foreach($arrApplicationIDs as $intID){
			$this->pdh->put('guildrequest_visits', 'add', array($intID));
		}
		$this->pdh->process_hook_queue();
	}

	
  public function delete(){
	$this->user->check_auth('a_guildrequest_manage');
	$arrItems = $this->in->getArray('gr', 'int');
	foreach($arrItems as $id){
		$this->pdh->put('guildrequest_requests', 'delete', array($id));
	}
	$this->core->message($this->user->lang('gr_delete_success'), $this->user->lang('success'), 'green');
	
	$this->pdh->process_hook_queue();
  }
  
  public function display()
  {
	//Output
	$hptt_page_settings	= array (
  'name' => 'hptt_guildrequest',
  'table_main_sub' => '%request_id%',
  'table_subs' => array('%request_id%', '%field_id%'),
  'page_ref' => 'listrequests.php',
  'show_numbers' => false,
  'show_select_boxes' => false,
  'show_detail_twink' => false,
  'table_sort_col' => 0,
  'table_sort_dir' => 'asc',
  'table_presets' => 
  array (
    0 => 
    array (
      'name' => 'gr_checkbox',
      'sort' => true,
      'th_add' => 'width="20"',
      'td_add' => '',
    ),
    1 => 
    array (
      'name' => 'gr_date',
      'sort' => true,
      'th_add' => '',
      'td_add' => 'nowrap="nowrap"',
    ),
    2 => 
    array (
      'name' => 'gr_name',
      'sort' => true,
      'th_add' => 'width="50%"',
      'td_add' => 'nowrap="nowrap"',
    ),
  ),
);
	
	if ($this->user->check_auth('a_guildrequest_manage', false)){
		$hptt_page_settings['table_presets'][] = array(
				'name' => 'gr_email',
      			'sort' => true,
     			'th_add' => '',
      			'td_add' => '',
		);
	}
	
	
	
	$arrCombinedFields = $this->pdh->get('guildrequest_fields', 'combined_fields', array());

	foreach($arrCombinedFields  as $key => $val){
		if (count($val) == 1){
			$hptt_page_settings['table_presets'][] = array(
				'name' 	=> 'gr_field_'.$val[0],
				'sort' 	=> true,
				'th_add'	=> '',
				'td_add'	=> '',
			);
		} else {
			$hptt_page_settings['table_presets'][] = array(
				'name' 	=> 'gr_combined_field_'.$key,
				'sort' 	=> true,
				'th_add'	=> '',
				'td_add'	=> '',
			);
		}
	}
	
	//Add colums
	/*
	$arrFields = $this->pdh->get('guildrequest_fields', 'id_list', array());
	foreach ($arrFields as $id){
		if ($this->pdh->get('guildrequest_fields', 'in_list', array($id)) && $this->pdh->get('guildrequest_fields', 'type', array($id)) < 3){
			$hptt_page_settings['table_presets'][] = array(
				 'name' 	=> 'gr_field_'.$id,
				  'sort' 	=> true,
				  'th_add'	=> '',
				  'td_add'	=> '',
			);
		}
	}
	*/
	
	$hptt_page_settings['table_presets'][] = array(
	'name' => 'gr_status',
      'sort' => true,
      'th_add' => '',
      'td_add' => '',
	);
	$hptt_page_settings['table_presets'][] = array(
	'name' => 'gr_closed',
      'sort' => true,
      'th_add' => '',
      'td_add' => 'align="center"',
	);
	
	$hptt_page_settings['table_presets'][] = array(
		 'name' => 'gr_voting_flag',
      'sort' => true,
      'th_add' => 'width="20"',
      'td_add' => 'align="center"',
	);

		//Sort
		$sort			= $this->in->get('sort');
		$sort_suffix	= '&amp;sort='.$sort;

		$start				= $this->in->get('start', 0);
		$pagination_suffix	= ($start) ? '&amp;start='.$start : '';

        
                
        
        
        $cfgValues = $this->config->get_config('guildrequest');
        if ($cfgValues['archive']) {
            // archive is active so split listings, show all open in view_list
            $view_list = $this->pdh->get('guildrequest_requests', 'id_list', array(false, true));
            
            $view_list_archive=$this->pdh->get('guildrequest_requests', 'id_list', array(false, false, ($this->user->check_auth('u_guildrequest_view_closed', false))));
        
        } else {
            // archive is not active so only one (combined) list
            $view_list = $this->pdh->get('guildrequest_requests', 'id_list', array(false, !$this->user->check_auth('u_guildrequest_view_closed', false)));
        }

        
        
	$hptt				= $this->get_hptt($hptt_page_settings, $view_list, $view_list, array('%link_url%' => 'viewraid.php', '%link_url_suffix%' => ''), $this->user->id);
        $hptt_archive                   = $this->get_hptt($hptt_page_settings, $view_list_archive, $view_list_archive, array('%link_url%' => 'viewraid.php', '%link_url_suffix%' => ''), $this->user->id.'_archive');
	$hptt->setPageRef($this->strPath);
        $hptt_archive->setPageRef($this->strPath);
	
	//footer
	$raid_count_open			= count($view_list);
        $raid_count_archive = count($view_list_archive);
	$footer_text_open		= sprintf($this->user->lang('gr_footer'), $raid_count_open ,$this->user->data['user_rlimit']);
        $footer_text_archive		= sprintf($this->user->lang('gr_footer'), $raid_count_archive ,$this->user->data['user_rlimit']);
	

        if ($cfgValues['archive']) {
            $this->jquery->Tab_header('guildrequest_tab', true);
            
        }
        $this->tpl->assign_vars(array (
		'PAGE_OUT_OPEN'			=> $hptt->get_html_table($sort, $pagination_suffix, $start, $this->user->data['user_rlimit'], $footer_text_open),
                'PAGE_OUT_ARCHIVE'              => $hptt_archive->get_html_table($sort, $pagination_suffix, $start, $this->user->data['user_rlimit'], $footer_text_archive),
	'SHOW_ARCHIVE'		=> $cfgValues['archive']&& $this->user->check_auth('u_guildrequest_view_closed', false),	
            'GR_PAGINATION'		=> generate_pagination($this->strPath.$this->SID.$sort_suffix, $raid_count_open, $this->user->data['user_rlimit'], $start),
		'S_GR_ADMIN'		=> $this->user->check_auth('a_guildrequest_manage', false),
	));
	
	$this->confirm_delete($this->user->lang('gr_confirm_delete_requests'));
	
	$this->core->set_vars(array (
      'page_title'    => $this->user->lang('gr_view'),
      'template_path' => $this->pm->get_data('guildrequest', 'template_path'),
      'template_file' => 'listrequests.html',
			'page_path'			=> [
					['title'=>$this->user->lang('gr_view'), 'url'=> ' '],
			],
      'display'       => true
    ));
  }
  
}
?>