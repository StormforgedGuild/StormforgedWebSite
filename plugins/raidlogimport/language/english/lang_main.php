<?php
/*	Project:	EQdkp-Plus
 *	Package:	EQdkp-Plus Language File
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

 
if (!defined('EQDKP_INC')) {
	die('You cannot access this file directly.');
}

//Language: English	
//Created by EQdkp Plus Translation Tool on  2014-12-17 23:17
//File: plugins/raidlogimport/language/english/lang_main.php
//Source-Language: german

$lang = array( 
	"raidlogimport" => 'Raid-Log-Import',
	"action_raidlogimport_bz_upd" => 'Boss / Zone edited',
	"action_raidlogimport_bz_add" => 'Boss / Zone added',
	"action_raidlogimport_bz_del" => 'Boss / Zone deleted',
	"raidlogimport_long_desc" => 'The plugin enables you to import most types of data in formatted text strings and create a raid from it. You can award points per boss and per hour.',
	"raidlogimport_short_desc" => 'Imports DKP-Strings',
	"links" => 'Links',
	"raidlogimport_bz" => 'Boss/Zone Management',
	"raidlogimport_dkp" => 'Import a raid-log',
	"rli_no_save" => 'Data not savedt!',
	"rli_save_suc" => 'Data successfully saved.',
	"rli_no_del" => 'Data not deleted!',
	"rli_del_suc" => 'Data successfully deleted.',
	"rli_bz_bz" => 'Bosses / Zones',
	"rli_bz_abz" => 'Active Bosses / Zones',
	"rli_bz_ibz" => 'Inactive Bosses / Zones',
	"bz_boss" => 'Bosses',
	"bz_boss_s" => 'Boss',
	"bz_boss_oz" => 'Bosses without Zone',
	"bz_zone" => 'Zones',
	"bz_zone_s" => 'Zone',
	"bz_no_zone" => 'no Zone',
	"bz_string" => 'String',
	"bz_bnote" => 'Note',
	"bz_bonus" => 'Bonus points',
	"bz_timebonus" => 'Points per hour',
	"bz_diff" => 'Schwierigkeit',
	"bz_zevent" => 'Event',
	"bz_update" => 'Add new / Edit marked',
	"bz_delete" => 'Delete marked',
	"bz_upd" => 'Edit Bosses / Zones',
	"bz_type" => 'Type',
	"bz_note_event" => 'Note / Event',
	"bz_yes" => 'Yes!',
	"bz_no" => 'No!',
	"bz_no_id" => 'Nothing selected.',
	"bz_del" => 'Delete Bosses / Zones',
	"bz_confirm_del" => 'Do you really want to delete this?',
	"bz_tozone" => 'In zone',
	"bz_suc" => 'Bosses / Zones Success',
	"bz_missing_values" => 'All fields have to be filled in.',
	"bz_sort" => 'Order',
	"bz_copy_zone" => 'Copy marked zone (including bosses) to difficulty: ',
	"bz_copy_suc" => 'Copy successful.',
	"bz_no_copy" => 'Copy failed!',
	"bz_import_boss" => 'Import boss',
	"bz_set_inactive" => 'Toggle active/inactive for marked zones (including bosses)',
	"bz_active_suc" => 'Active/inactive toggled for marked zones.',
	"rli_dkp_insert" => 'Insert DKP-String',
	"rli_data_source" => 'Select data-source',
	"rli_continue_old" => 'Continue previous import',
	"rli_send" => 'Send',
	"rli_raidinfo" => 'Raid Infos',
	"rli_start" => 'Start',
	"rli_end" => 'End',
	"rli_bosskills" => 'Bosskills',
	"rli_cost" => 'Cost',
	"rli_success" => 'Success',
	"rli_error" => 'Data not saved because of an error!',
	"rli_no_mem_create" => ' could not be created. Please add him manually!',
	"rli_mem_auto" => ' was automatically created.',
	"rli_raid_to" => 'Raid to %1$s on %2$s',
	"rli_raid_value" => 'Raid value',
	"rli_t_points" => 'Points per hour',
	"rli_e_points" => 'Event points',
	"rli_b_dkp" => 'Boss points',
	"rli_looter" => 'Looter',
	"xml_error" => 'XML-Error. Please check the log!',
	"parse_error" => 'Parsing-Error!',
	"rli_check_data" => 'Check data',
	"rli_clock" => 'Clock',
	"rli_hour" => 'hour',
	"rli_att" => 'Attendance',
	"rli_checkmem" => 'Check member-data',
	"rli_back2raid" => 'Back to raids',
	"rli_checkraid" => 'Check raids',
	"rli_checkitem" => 'Check Items',
	"rli_itempage" => 'Itempage ',
	"rli_back2mem" => 'Back to members',
	"rli_back2item" => 'Back to items',
	"rli_checkadj" => 'Check Adjustments',
	"rli_calc_note_value" => 'Update raidnote',
	"rli_insert" => 'Insert DKP',
	"rli_adjs" => 'Adjustments',
	"rli_partial_raid" => 'Partial Raidattendance',
	"rli_missing_bosses" => 'Partial Raidattendance (missing Bosses)',
	"rli_add_raid" => 'Add raid',
	"rli_add_raids" => 'Add raids',
	"rli_delete_raids_warning" => 'Do you really want to delete the raid/boss?',
	"rli_add_mem" => 'Add member',
	"rli_add_mems" => 'Add members',
	"rli_delete_members_warning" => 'Do you really want to delete the member?',
	"rli_add_time" => 'Add a timebar',
	"rli_standby_switch" => 'Toggle standby',
	"rli_del_time" => 'Delete timebar',
	"rli_bossname" => 'Name of the boss:',
	"rli_bosstime" => 'Killtime:',
	"rli_bossvalue" => 'Value / Bonus:',
	"rli_add_item" => 'Add item',
	"rli_delete_items_warning" => 'Do you really want to delete the item?',
	"rli_item_id" => 'Item-ID',
	"rli_add_adj" => 'Add adjustment',
	"rli_add_adjs" => 'Add adjustments',
	"rli_add_bk" => 'Add bosskill',
	"rli_add_bks" => 'Add bosskills',
	"rli_imp_no_suc" => 'Import not successful',
	"rli_imp_suc" => 'Import successful',
	"rli_members_needed" => 'No members given.',
	"rli_raids_needed" => 'No raids given.',
	"rli_missing_values" => 'There are missing some values. Please: ',
	"rli_miss" => 'The following nodes are missing: ',
	"rli_lgaobk" => 'Log guild attendees on bosskill must be deactivated, before tracking. If you want to import the log anyway, you have to delete all the joins which have the same time as the bosskills.',
	"wrong_game" => 'The game from which you exported the log and the game you specified in the configuration of EQdkp-Plus are not the same!',
	"rli_process" => 'Process',
	"check_raidval" => 'Check raid values',
	"rli_choose_mem" => 'Choose a Member ...',
	"rli_go_on" => 'Forward',
	"rli_raidatt_upd" => 'Click on "Update" to show the raid attendance for the new times.',
	"rli_error_imagecreate" => 'Error while creating image file.',
	"rli_save_itempool" => 'Save itempool for marked items.',
	"rli_itempool_saved" => 'Itempools saved!',
	"rli_itempool_partial_save" => 'Itempools saved only partially.',
	"rli_itempool_nosave" => 'Not saved Items',
	"rli_help" => 'Help?',
	"rli_help_dt_member" => 'Help:  A time bar stands for the raid presence of an attendee. A green bar means he was present, a purple one means he was backup. New time bars can be created by doubleclick on free space of the time table. To delete bars, click on it and press your delete key. The skulls represent bosskills (mouseover). The background of the line is either green or red, depending on whether the character gets the raid-attendance.',
	"rli_member_refresh_for_view" => 'Press update to show the Raidslider.',
	"rli_loading" => 'Please wait',
	"rli_finish" => 'Finish',
	"rli_error_member_create" => 'Creation of character %s failed.',
	"rli_error_no_raid" => 'At least one raid needs to be created.',
	"rli_error_no_attendant" => 'The must be at least one member participating the raid.',
	"rli_error_no_buyer" => 'Could not find the buyer of the Item %s in the raid or database.',
	"rli_error_item_no_raid" => 'Item %s have not been assigned to a raid.',
	"rli_error_no_parser" => 'A parser has not been selected.',
	"rli_error_wrong_format" => 'The parser you haven chosen (%s) and the raid-log you have posted do not match.',
	"new_member_rank" => 'Default rank for automatic created members.',
	"raidcount" => 'How should the raids be created?',
	"raidcount_0" => 'One raid for everything',
	"raidcount_1" => 'One raid per hour',
	"raidcount_2" => 'One raid per boss',
	"raidcount_3" => 'One raid per hour and per boss',
	"wrong_settings" => '<i class="fa fa-exclamation-triangle fa-2x"></i> Wrong Settings!',
	"wrong_settings_1" => '<i class="fa fa-exclamation-triangle fa-2x"></i> Wrong Settings! You cannot combine One raid per hour with no Time-DKP.',
	"wrong_settings_2" => '<i class="fa fa-exclamation-triangle fa-2x"></i> Wrong Settings! You cannot combine One raid per boss with no Boss-DKP.',
	"wrong_settings_3" => '<i class="fa fa-exclamation-triangle fa-2x"></i> Wrong Settings! You cannot combine One raid per hour and per boss with no Boss- and/or Time-DKP.',
	"attendance_begin" => 'Bonus for attendance during raidbegin',
	"attendance_end" => 'Bonus for attendance during raidend',
	"attendance_all" => 'Bonus for complete attendance (all bosskills)',
	"config_success" => 'Configuration Success',
	"event_boss" => 'Exists an event for each boss?',
	"event_boss_1" => 'Yes',
	"event_boss_2" => 'Use the name of the boss as raid-note',
	"attendance_raid" => 'Should an extra raid be created for attendency?',
	"loottime" => 'Time in seconds, the loot belongs to the boss before.',
	"attendance_time" => 'Time in seconds, the invite / end of raid lasts.',
	"rli_inst_version" => 'Installed version',
	"bz_parse" => 'Delimiter between the Strings, which belong to one "event".',
	"parser" => 'In which XML-Format is the string?',
	"parser_empty" => 'Empty String',
	"rli_man_db_up" => 'Force DB-Update',
	"use_dkp" => 'Which DKP shall be used?',
	"use_dkp_1" => 'Boss-DKP',
	"use_dkp_2" => 'Time-DKP',
	"use_dkp_4" => 'Event-DKP',
	"null_sum" => 'Use Null-Sum-System?',
	"null_sum_0" => 'No',
	"null_sum_1" => 'Every member in the raid gets the DKP',
	"null_sum_2" => 'Every member in the system gehts the DKP',
	"deactivate_adj" => 'Deactivate Adjustments?',
	"deactivate_adj_warn" => 'This removes partially gain of DKP per member! Everyone gets all or nothing!',
	"auto_minus" => 'Activate automatic minus?',
	"auto_minus_help" => 'When used, member, who did not join the last x raids, lose an amount of DKP. If you use zero-sum the member will be awarded an item, else he gets an adjustment.',
	"am_raidnum" => 'Number of raids for automatic minus',
	"am_value" => 'Amount of DKP drawn off',
	"am_name" => 'lack of participation',
	"am_value_raids" => 'DKP value = DKP of last number of raids',
	"am_allxraids" => 'Reset raidcount on Minus-DKP?',
	"am_allxraids_help" => 'Example: A member looses DKP after 3 Raids of not being there. The 4th Raid he is missing again. If this option is deactivated, the member will loose DKP again. If its activated he will loose the DKP on his 6th Raid of not being there.',
	"title_am" => 'Automatic Minus',
	"title_adj" => 'Adjustments',
	"title_att" => 'Attendance',
	"title_general" => 'General',
	"title_loot" => 'Loot / Items',
	"title_parse" => 'Parse Settings',
	"title_hnh_suffix" => 'Heroic / Non-Heroic',
	"title_member" => 'Member Settings',
	"ignore_dissed" => 'Ignore disenchanted and bank loot?',
	"ignore_dissed_help" => 'e.g. Disenchanted or bank. Separarated by commata.',
	"member_miss_time" => 'Time in seconds a member can miss without it being tracked.',
	"s_member_rank" => 'Show member rank?',
	"s_member_rank_1" => 'Members-Overview',
	"s_member_rank_2" => 'Loot-Overview',
	"s_member_rank_4" => 'Adjustments-Overview',
	"rli_manual" => 'Sollte dir die Bedeutung einiger Optionen nicht klar sein, so wirf einen Blick ins Manual (<a href='.registry::get_const('root_path').'../language/german/Manual.pdf">link</a>).',
	"member_start" => 'Start-DKP a Member gains, when he is automatically created',
	"member_start_name" => 'Start-DKP',
	"member_start_event" => 'Event for Start-DKP',
	"member_raid" => 'How many % of attendance do a member need to get the particiaption in the raid?',
	"att_note_begin" => 'raid note of the start-attendance-raid',
	"att_note_end" => 'raid note of the end-attendance-raid',
	"raid_note_time" => 'raid note of the raids per hour',
	"raid_note_time_0" => '20:00-21:00, 21:00-22:00, etc.',
	"raid_note_time_1" => '1.Hour, 2.Hour, etc.',
	"timedkp_handle" => 'Calculation of Timedkp',
	"timedkp_handle_help" => '0: exact calculation per minute <br /> >0: minutes, after the member gains full dkp of the hour',
	"member_display" => 'How should the member-list be displayed?',
	"member_display_0" => 'Multi-Select',
	"member_display_1" => 'Multiple Checkboxes',
	"member_display_2" => 'Detailed Join/Leave Information',
	"member_display_help" => 'You need the GD-Lib (a php extension) to use the layout "Detailed Join/Leave Information". The following GD-Lib was found: <br />%s',
	"no_gd_lib" => '<span class="negative">no GD-lib found</span>',
	"title_standby" => 'Standby-Settings',
	"standby_raid" => 'Shall the standby-members be assigned to a raid?',
	"standby_raid_0" => 'No.',
	"standby_raid_1" => 'Yes, create an extra raid.',
	"standby_raid_2" => 'Yes, assign them to the normal raid(s).',
	"standby_absolute" => 'Shall the standby DKP be absolute?',
	"standby_value" => 'How much percent of the DKP or rather how many DKP absolute, shall the standby-members get?',
	"standby_att" => 'Shall standby-members gain start/end-DKP?',
	"standby_att_1" => 'Start-DKP',
	"standby_att_2" => 'End-DKP',
	"standby_dkptype" => 'Which DKP shall standby-members get?',
	"standby_dkptype_1" => 'Boss-DKP',
	"standby_dkptype_2" => 'Time-DKP',
	"standby_dkptype_4" => 'Event-DKP',
	"standby_raidnote" => 'Note for standby-raid',
	"standby_raid_note" => 'Standby',
	"itempool_save" => 'Itempools can be saved per item and event.',
	"itempool_save_help" => 'At the item-import-page the itempool can be saved for all displayed items. On the next import of the raid the itempool is automatically selected for that item.',
	"del_dbl_times" => 'Shall double times be deleted? The latter time for joins, the earlier one for leaves.',
	"autocomplete" => 'Add autocomplete function to the following fields?',
	"autocomplete_1" => 'Charactername',
	"autocomplete_2" => 'Itemname',
	"no_del_warn" => 'Dont show warnings on deletion?',
	"p_rli_zone_display" => 'Which zones shall be displayed?',
	"dkpvals" => 'DKP-Values',
	'autocreate_zones' => 'Create zones automatically, if they don\'t exist',
	'autocreate_bosses' =>'Create bosses automatically, if they don\'t exist',
);

?>