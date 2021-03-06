<?php
/*	Project:	EQdkp-Plus
 *	Package:	RaidLogImport Plugin
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

$english = array(
	'zone' => array(
			#		string	| note	| timebonus | diff | sort
		  1 => array("Naxxramas", "Naxx", "5", "0", "0"),
		  2 => array("The Eye of Eternity", "Malygos", "5", "0", "2"),
		  3 => array("The Obsidian Sanctum", "Sanctum", "5", "0", "1"),
		  4 => array("Vault of Archavon", "Archavon", "5", "0", "3"),
		  5 => array("Ulduar", "Ulduar", "5", "0", "4"),
		  6 => array("Trial of the Crusader", "Coliseum", "5", "2", "5"),
		  7 => array("Trial of the Crusader", "Coliseum", "5", "4", "6"),
		  8 => array("Onyxia's Lair", "Onyxia", "0", "0", "7"),
		  9 => array("Icecrown Citadel", "Icecrown", "5", "2", "8"),
		 10 => array("Icecrown Citadel", "Icecrown", "10", "4", "9"),
		 11 => array("Ruby Sanctum", "Ruby Sanctum", "5", "2", "10"),
		 12 => array("Ruby Sanctum", "Ruby Sanctum", "5", "4", "11"),
		 13 => array("The Bastion of Twilight", "The Bastion of Twilight", "5", "1", "12"),
		 14 => array("Blackwing Descent", "Blackwing Descent", "5", "1", "13"),
		 15 => array("Baradin Hold", "Baradin Hold", "5", "1", "14"),
		 16 => array("The Throne of the Four Winds", "The Throne of the Four Winds", "5", "1", "15"),
		 17 => array("The Bastion of Twilight", "The Bastion of Twilight", "5", "2", "16"),
		 18 => array("Blackwing Descent", "Blackwing Descent", "5", "2", "17"),
		 19 => array("Baradin Hold", "Baradin Hold", "5", "2", "18"),
		 20 => array("The Throne of the Four Winds", "The Throne of the Four Winds", "5", "2", "19"),
		 21 => array("The Bastion of Twilight", "The Bastion of Twilight", "5", "3", "20"),
		 22 => array("Blackwing Descent", "Blackwing Descent", "5", "3", "21"),
		 23 => array("Baradin Hold", "Baradin Hold", "5", "3", "22"),
		 24 => array("The Throne of the Four Winds", "The Throne of the Four Winds", "5", "3", "23"),
		 25 => array("The Bastion of Twilight", "The Bastion of Twilight", "5", "4", "24"),
		 26 => array("Blackwing Descent", "Blackwing Descent", "5", "4", "25"),
		 27 => array("Baradin Hold", "Baradin Hold", "5", "4", "26"),
		 28 => array("The Throne of the Four Winds", "The Throne of the Four Winds", "5", "4", "27"),
	//	-------------------- Firelands --------------------------------------
		29 => array('Firelands', 'Firelands', "5", "1", "28"),
		30 => array('Firelands', 'Firelands', "5", "2", "29"),		
		31 => array('Firelands', 'Firelands', "5", "3", "30"),
		32 => array('Firelands', 'Firelandse', "5", "4", "31"),
	//	-------------------- Dragon Soul --------------------------------------
		33 => array('Dragon Soul', 'Dragon Soul', "5", "1", "32"),
		34 => array('Dragon Soul', 'Dragon Soul', "5", "2", "33"),
		35 => array('Dragon Soul', 'Dragon Soul', "5", "3", "34"),
		36 => array('Dragon Soul', 'Dragon Soul', "5", "4", "35"),
	//	-------------------- MOP --------------------------------------
		 37	=> array("Mogu'shan Vaults", "Mogu'shan", "5", "0", "36"),
		 38 => array("Terrace of endless spring", "Terrace", "5", "0", "37"),
		 39 => array("Heart of Fear", "Heart of Fear", "5", "0", "38"),
	),
	'boss' => array(
			#		string	| note	| bonus | timebonus | diff | tozone | sort
		  1 => array("Loatheb", "Loatheb", "2", "0", "0", "1", "5"),
		  2 => array("Instructor Razuvious", "Razuvious", "2", "0", "0", "1", "6"),
		  3 => array("Gothik the Harvester", "Gothik", "2", "0", "0", "1", "7"),
		  4 => array("Four Horsemen", "Reiter", "2", "0", "0", "1", "8"),
		  5 => array("Anub'Rekhan", "Anub'rekhan", "2", "0", "0", "1", "0"),
		  6 => array("Grand Widow Faerlina", "Faerlina", "2", "0", "0", "1", "1"),
		  7 => array("Maexxna", "Maexxna", "2", "0", "0", "1", "2"),
		  8 => array("Noth the Plaguebringer", "Noth", "2", "0", "0", "1", "3"),
		  9 => array("Heigan the Unclean", "Heigan", "2", "0", "0", "1", "4"),
		 10 => array("Patchwerk", "Patchwerk", "2", "0", "0", "1", "9"),
		 11 => array("Grobbulus", "Grobbulus", "2", "0", "0", "1", "10"),
		 12 => array("Gluth", "Gluth", "2", "0", "0", "1", "11"),
		 13 => array("Thaddius", "Thaddius", "2", "0", "0", "1", "12"),
		 14 => array("Sapphiron", "Sapphiron", "2", "0", "0", "1", "13"),
		 15 => array("Kel'Thuzad", "Kel'Thuzad", "4", "0", "0", "1", "14"),
		 16 => array("Malygos", "Malygos", "4", "0", "0", "2", "0"),
		 17 => array("Sartharion", "Sartharion", "2", "0", "0", "3", "0"),
		 18 => array("Sartharion 1D", "Sartharion 1D", "4", "0", "0", "3", "1"),
		 19 => array("Sartharion 2D", "Sartharion 2D", "6", "0", "0", "3", "2"),
		 20 => array("Sartharion 3D", "Sartharion 3D", "8", "0", "0", "3", "3"),
		 21 => array("Archavon the Stone Watcher", "Archavon", "2", "0", "0", "4", "0"),
		 22 => array("Flame Leviathan", "Leviathan", "3", "0", "0", "5", "0"),
		 23 => array("Ignis the Furnace Master", "Ignis", "3", "0", "0", "5", "1"),
		 24 => array("Razorscale", "Razorscale", "3", "0", "0", "5", "2"),
		 25 => array("XT-002 Deconstructor", "XT-002", "3", "0", "0", "5", "3"),
		 26 => array("The Iron Council", "Iron Council", "3", "0", "0", "5", "4"),
		 27 => array("Kologarn", "Kologarn", "3", "0", "0", "5", "5"),
		 28 => array("Auriaya", "Auriaya", "3", "0", "0", "5", "6"),
		 29 => array("Hodir", "Hodir", "3", "0", "0", "5", "7"),
		 30 => array("Thorim", "Thorim", "3", "0", "0", "5", "8"),
		 31 => array("Freya", "Freya", "3", "0", "0", "5", "9"),
		 32 => array("Mimiron", "Mimiron", "3", "0", "0", "5", "10"),
		 33 => array("General-Vezax", "Vezax", "3", "0", "0", "5", "11"),
		 34 => array("Yogg-Saron", "Yoggy", "4", "0", "0", "5", "12"),
		 35 => array("Algalon the Observer", "Algalon", "4", "0", "0", "5", "13"),
		 36 => array("Emalon the Storm Watcher", "Emalon", "2", "0", "0", "4", "1"),
		 37 => array("Northrend Beasts", "Beasts", "2", "0", "2", "6", "0"),
		 38 => array("Lord Jaraxxus", "Jaraxxus", "2", "0", "2", "6", "1"),
		 39 => array("Faction Champions", "Champions", "3", "0", "2", "6", "2"),
		 40 => array("Twin Val'kyr", "Twin Val'kyr", "3", "0", "2", "6", "3"),
		 41 => array("Anub'arak", "Anub'arak", "4", "0", "2", "6", "4"),
		 42 => array("Northrend Beasts", "Beasts", "2", "0", "4", "7", "0"),
		 43 => array("Lord Jaraxxus", "Jaraxxus", "2", "0", "4", "7", "1"),
		 44 => array("Faction Champions", "Champions", "3", "0", "4", "7", "2"),
		 45 => array("Twin Val'kyr", "Twin Val'kyr", "3", "0", "4", "7", "3"),
		 46 => array("Anub'arak", "Anub'arak", "4", "0", "4", "7", "4"),
		 47 => array("Koralon the Flame Watcher", "Koralon", "2", "0", "0", "4", "2"),
		 48 => array("Onyxia", "Onyxia", "2", "0", "0", "8", "0"),
		 49 => array("Lord Marrowgar", "Marrowgar", "2", "0", "2", "9", "0"),
		 50 => array("Lady Deathwhisper", "Deathwhisper", "2", "0", "2", "9", "1"),
		 51 => array("Gunship Battle", "Gunship", "2", "0", "2", "9", "2"),
		 52 => array("Deathbringer Saurfang", "Saurfang", "2", "0", "2", "9", "3"),
		 53 => array("Festergut", "Festergut", "2", "0", "2", "9", "4"),
		 54 => array("Rotface", "Rotface", "2", "0", "2", "9", "5"),
		 55 => array("Professor Putricide", "Putricide", "2", "0", "2", "9", "6"),
		 56 => array("Blood Prince Council", "Blood Council", "2", "0", "2", "9", "7"),
		 57 => array("Blood-Queen Lana'thel", "Lana'thel", "2", "0", "2", "9", "8"),
		 58 => array("Valithiria Dreamwalker", "Dreamwalker", "2", "0", "2", "9", "9"),
		 59 => array("Sindragosa", "Sindragosa", "2", "0", "2", "9", "10"),
		 60 => array("The Lich King", "Arthas", "2", "0", "2", "9", "11"),
		 61 => array("Toravon the Ice Watcher", "Toralon", "2", "0", "0", "4", "3"),
		 62 => array("Lord Marrowgar", "Marrowgar", "2", "0", "4", "10", "0"),
		 63 => array("Lady Deathwhisper", "Deathwhisper", "2", "0", "4", "10", "1"),
		 64 => array("Gunship Battle", "Gunship", "2", "0", "4", "10", "2"),
		 65 => array("Deathbringer Saurfang", "Saurfang", "2", "0", "4", "10", "3"),
		 66 => array("Festergut", "Festergut", "2", "0", "4", "10", "4"),
		 67 => array("Rotface", "Rotface", "2", "0", "4", "10", "5"),
		 68 => array("Professor Putricide", "Putricide", "2", "0", "4", "10", "6"),
		 69 => array("Blood Prince Council", "Blood Council", "2", "0", "4", "10", "7"),
		 70 => array("Blood-Queen Lana'thel", "Lana'thel", "2", "0", "4", "10", "8"),
		 71 => array("Valithiria Dreamwalker", "Dreamwalker", "2", "0", "4", "10", "9"),
		 72 => array("Sindragosa", "Sindragosa", "2", "0", "4", "10", "10"),
		 73 => array("The Lich King", "Arthas", "2", "0", "4", "10", "11"),
		 74 => array("Halion the Twilight Destroyer", "Halion", "4", "0", "2", "11", "0"),
		 75 => array("Halion the Twilight Destroyer", "Halion", "5", "0", "4", "12", "0"),
		 76 => array("Valiona and Theralion", "Valiona and Theralion", "2", "0", "1", "13", "0"),
		 77 => array("Halfus Wyrmbreaker", "Halfus Wyrmbreaker", "2", "0", "1", "13", "1"),
		 78 => array("Twilight Ascendant Council", "Twilight Ascendant Council", "2", "0", "1", "13", "2"),
		 79 => array("Cho'gall", "Cho'gall", "3", "0", "1", "13", "3"),
		 80 => array("Magmaw", "Magmaw", "2", "0", "1", "14", "0"),
		 81 => array("Omnotron Defense System", "Omnotron Defence System", "2", "0", "1", "14", "1"),
		 82 => array("Maloriak", "Maloriak", "2", "0", "1", "14", "2"),
		 83 => array("Atramedes", "Atramedes", "2", "0", "1", "14", "3"),
		 84 => array("Chimaeron", "Chimaeron", "2", "0", "1", "14", "4"),
		 85 => array("Nefarian", "Nefarian", "2", "0", "1", "14", "5"),
		 86 => array("Argaloth", "Argaloth", "2", "0", "1", "15", "0"),
		 87 => array("Conclave of Wind", "Conclave of Wind", "2", "0", "1", "16", "0"),
		 88 => array("Al'Akir", "Al'Akir", "2", "0", "1", "16", "1"),
		 89 => array("Valiona and Theralion", "Valiona and Theralion", "2", "0", "2", "17", "0"),
		 90 => array("Halfus Wyrmbreaker", "Halfus Wyrmbreaker", "2", "0", "2", "17", "1"),
		 91 => array("Twilight Ascendant Council", "Twilight Ascendant Council", "2", "0", "2", "17", "2"),
		 92 => array("Cho'gall", "Cho'gall", "3", "0", "2", "17", "3"),
		 93 => array("Magmaw", "Magmaw", "2", "0", "2", "18", "0"),
		 94 => array("Omnotron Defense System", "Omnotron Defence System", "2", "0", "2", "18", "1"),
		 95 => array("Maloriak", "Maloriak", "2", "0", "2", "18", "2"),
		 96 => array("Atramedes", "Atramedes", "2", "0", "2", "18", "3"),
		 97 => array("Chimaeron", "Chimaeron", "2", "0", "2", "18", "4"),
		 98 => array("Nefarian", "Nefarian", "2", "0", "2", "18", "5"),
		 99 => array("Argaloth", "Argaloth", "2", "0", "2", "19", "0"),
		100 => array("Conclave of Wind", "Conclave of Wind", "2", "0", "2", "20", "0"),
		101 => array("Al'Akir", "Al'Akir", "2", "0", "2", "20", "1"),
		102 => array("Valiona and Theralion", "Valiona and Theralion", "2", "0", "3", "21", "0"),
		103 => array("Halfus Wyrmbreaker", "Halfus Wyrmbreaker", "2", "0", "3", "21", "1"),
		104 => array("Twilight Ascendant Council", "Twilight Ascendant Council", "2", "0", "3", "21", "2"),
		105 => array("Cho'gall", "Cho'gall", "3", "0", "3", "21", "3"),
		106 => array("Magmaw", "Magmaw", "2", "0", "3", "22", "0"),
		107 => array("Omnotron Defense System", "Omnotron Defence System", "2", "0", "3", "22", "1"),
		108 => array("Maloriak", "Maloriak", "2", "0", "3", "22", "2"),
		109 => array("Atramedes", "Atramedes", "2", "0", "3", "22", "3"),
		110 => array("Chimaeron", "Chimaeron", "2", "0", "3", "22", "4"),
		111 => array("Nefarian", "Nefarian", "2", "0", "3", "22", "5"),
		112 => array("Argaloth", "Argaloth", "2", "0", "3", "23", "0"),
		113 => array("Conclave of Wind", "Conclave of Wind", "2", "0", "3", "24", "0"),
		114 => array("Al'Akir", "Al'Akir", "2", "0", "3", "24", "1"),
		115 => array("Valiona and Theralion", "Valiona and Theralion", "2", "0", "4", "25", "0"),
		116 => array("Halfus Wyrmbreaker", "Halfus Wyrmbreaker", "2", "0", "4", "25", "1"),
		117 => array("Twilight Ascendant Council", "Twilight Ascendant Council", "2", "0", "4", "25", "2"),
		118 => array("Cho'gall", "Cho'gall", "3", "0", "4", "25", "3"),
		119 => array("Magmaw", "Magmaw", "2", "0", "4", "26", "0"),
		120 => array("Omnotron Defense System", "Omnotron Defence System", "2", "0", "4", "26", "1"),
		121 => array("Maloriak", "Maloriak", "2", "0", "4", "26", "2"),
		122 => array("Atramedes", "Atramedes", "2", "0", "4", "26", "3"),
		123 => array("Chimaeron", "Chimaeron", "2", "0", "4", "26", "4"),
		124 => array("Nefarian", "Nefarian", "2", "0", "4", "26", "5"),
		125 => array("Argaloth", "Argaloth", "2", "0", "4", "27", "0"),
		126 => array("Conclave of Wind", "Conclave of Wind", "2", "0", "4", "28", "0"),
		127 => array("Al'Akir", "Al'Akir", "2", "0", "4", "28", "1"),
		128 => array("Sinestra", "Sinestra", "3", "0", "3", "21", "4"),
		129 => array("Sinestra", "Sinestra", "3", "0", "4", "25", "4"),
		//	-------------------- Firelands --------------------------------------	
	#		string	| note	| bonus | timebonus | diff | tozone | sort
		130 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '1', '29', '0'),
		131 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '1', '29', '1'),
		132 => array('Alysrazor', 'Alysrazor', '2', '0', '1', '29', '2'),
		133 => array('Shannox', 'Shannox', '2', '0', '1', '29', '3'),
		134 => array('Baleroc', 'Baleroc', '2', '0', '1', '29', '4'),
		135 => array('Majordomo Staghelm', 'Majordomo Staghelm', '2', '0', '1', '29', '5'),
		136 => array('Ragnaros', 'Ragnaros', '2', '0', '1', '29', '6'),
		
		137 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '2', '30', '0'),
		138 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '2', '30', '1'),
		139 => array('Alysrazor', 'Alysrazor', '2', '0', '2', '30', '2'),
		140 => array('Shannox', 'Shannox', '2', '0', '2', '30', '3'),
		141 => array('Baleroc', 'Baleroc', '2', '0', '2', '30', '4'),
		142 => array('Majordomo Staghelm', 'Majordomo Staghelm', '2', '0', '2', '30', '5'),
		143 => array('Ragnaros', 'Ragnaros', '2', '0', '2', '30', '6'),
		
		144 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '3', '31', '0'),
		145 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '3', '31', '1'),
		146 => array('Alysrazor', 'Alysrazor', '2', '0', '3', '31', '2'),
		147 => array('Shannox', 'Shannox', '2', '0', '3', '31', '3'),
		148 => array('Baleroc', 'Baleroc', '2', '0', '3', '31', '4'),
		149 => array('Majordomo Staghelm', 'Majordomo Staghelm', '2', '0', '3', '31', '5'),
		150 => array('Ragnaros', 'Ragnaros', '2', '0', '3', '31', '6'),
		
		151 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '4', '32', '0'),
		152 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '4', '32', '1'),
		153 => array('Alysrazor', 'Alysrazor', '2', '0', '4', '32', '2'),
		154 => array('Shannox', 'Shannox', '2', '0', '4', '32', '3'),
		155 => array('Baleroc', 'Baleroc', '2', '0', '4', '32', '4'),
		156 => array('Majordomo Staghelm', 'Majordomo Staghelm', '2', '0', '4', '32', '5'),
		157 => array('Ragnaros', 'Ragnaros', '2', '0', '4', '32', '6'),
		
	//	-------------------- Dragon Soul --------------------------------------
	#		string	| note	| bonus | timebonus | diff | tozone | sort
		158 => array('Morchok', 'Morchok', '2', '0', '1', '33', '0'),
		159 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '1','33', '1'),
		160 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '1','33', '2'),
		161 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '1','33', '3'),
		162 => array('Ultraxion', 'Ultraxion', '2', '0', '1', '33', '4'),
		163 => array('Warmaster Blackhorn', 'Blackhorn', '0', '0', '1','33', '5'),
		164 => array('Spine of Deathwing', 'Spine', '2', '0', '1', '33', '6'),
		165 => array('Madness of Deathwing', 'Madness', '2', '0', '1', '33', '7'),
		
		166 => array('Morchok', 'Morchok', '2', '0', '2', '34', '0'),
		167 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '2','34', '1'),
		168 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '2', '34', '2'),
		169 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '2','34', '3'),
		170 => array('Ultraxion', 'Ultraxion', '2', '0', '2', '34', '4'),
		171 => array('Warmaster Blackhorn', 'Blackhorn', '0', '0', '2','34', '5'),
		172 => array('Spine of Deathwing', 'Spine', '2', '0', '2', '34', '6'),
		173 => array('Madness of Deathwing', 'Madness', '2', '0', '2', '34', '7'),
		
		174 => array('Morchok', 'Morchok', '2', '0', '3', '35', '0'),
		175 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '3','35', '1'),
		176 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '3', '35', '2'),
		177 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '3','35', '3'),
		178 => array('Ultraxion', 'Ultraxion', '2', '0', '3', '35', '4'),
		179 => array('Warmaster Blackhorn', 'Blackhorn', '0', '0', '3','35', '5'),
		180 => array('Spine of Deathwing', 'Spine', '2', '0', '3', '35', '6'),
		181 => array('Madness of Deathwing', 'Madness', '2', '0', '3', '35', '7'),
		
		182 => array('Morchok', 'Morchok', '2', '0', '4', '36', '0'),
		183 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '4','36', '1'),
		184 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '4','36', '2'),
		185 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '4','36', '3'),
		186 => array('Ultraxion', 'Ultraxion', '2', '0', '4', '36', '4'),
		187 => array('Warmaster Blackhorn', 'Blackhorn', '0', '0', '4','36', '5'),
		188 => array('Spine of Deathwing', 'Spine', '2', '0', '4', '36', '6'),
		189 => array('Madness of Deathwing', 'Madness', '2', '0', '4', '36', '7'),

	//	-------------------- MOP --------------------------------------
		190 => array("Sha of Anger", "Sha of Anger", "0", "0", "0", "0", "0"),
		191 => array("Galleon", "Galleon", "0", "0", "0", "0", "1"),
		192	=> array("The Stone Guard", "Stone Guard", "1", "1", "0", "37", "0"),
		193 => array("Feng the Accursed", "Feng", "1", "1", "0", "37", "1"),
		194 => array("Gara'jal the Spiritbinder", "Gara'jal", "1", "1", "0", "37", "2"),
		195 => array("The Spirit Emporers", "Spirit Emporers", "1", "1", "0", "37", "3"),
		196 => array("Elegon", "Elegon", "1", "1", "0", "37", "4"),
		197 => array("Will of the Emperor", "Will of the Emporer", "1", "1", "0", "37", "5"),
		198 => array("Protectors of the Endless", "Protectors", "1", "1", "0", "38", "0"),
		199 => array("Tsulong", "Tsulong", "1", "1", "0", "38", "1"),
		200 => array("Lei Shi", "Lei Shi", "1", "1", "0", "38", "2"),
		201 => array("Sha of Fear", "Sha of Fear", "1", "1", "0", "38", "3"),
		202 => array("Imperial Vizier Zor'lok", "Zor'lok", "1", "1", "0", "39", "0"),
		203 => array("Blade Lord Ta'yak", "Ta'yak", "1", "1", "0", "39", "1"),
		204 => array("Garalon", "Garalon", "1", "1", "39", "0", "2"),
		205 => array("Wind Lord Mel'jarak", "Mel'jarak", "1", "1", "0", "39", "3"),
		206 => array("Amber Shaper Un'sok", "Un'sok", "1", "1", "0", "39", "4"),
		207 => array("Grand Emporer Shek'zeer", "Shek'zeer", "1", "1", "0", "39", "5"),
	)
);

$german = array(
	//#		string	| note	| timebonus | diff | sort
	'zone' => array(
		  1 => array("Naxxramas", "Naxx", "5", "0", "0"),
		  2 => array("The Eye of Eternity", "Malygos", "5", "0", "2"),
		  3 => array("The Obsidian Sanctum", "Sanctum", "5", "0", "1"),
		  4 => array("Vault of Archavon", "Archavon", "5", "0", "3"),
		  5 => array("Ulduar", "Ulduar", "5", "0", "4"),
		  6 => array("Trial of the Crusader", "Kolosseum", "5", "2", "5"),
		  7 => array("Trial of the Crusader", "Kolosseum", "5", "4", "6"),
		  8 => array("Onyxia's Lair", "Onyxia", "5", "0", "7"),
		  9 => array("Icecrown Citadel", "Eiskrone", "5", "2", "8"),
		 10 => array("Icecrown Citadel", "Eiskrone", "5", "4", "8"),
		 11 => array("Ruby Sanctum", "Rubin Sanktum", "5", "2", "10"),
		 12 => array("Ruby Sanctum", "Rubin Sanktum", "5", "4", "11"),
	//	-------------------- Cata --------------------------------------	 
		 13 => array("The Bastion of Twilight", "Die Bastion des Zwielichts", "5", "1", "12"),
		 14 => array("Blackwing Descent", "Pechschwingenabstieg", "5", "1", "13"),
		 15 => array("Baradin Hold", "Baradinfestung", "5", "1", "14"),
		 16 => array("The Throne of the Four Winds", "Thron der Vier Winde", "5", "1", "15"),
		 17 => array("The Bastion of Twilight", "Die Bastion des Zwielichts", "5", "2", "16"),
		 18 => array("Blackwing Descent", "Pechschwingenabstieg", "5", "2", "17"),
		 19 => array("Baradin Hold", "Baradinfestung", "5", "2", "18"),
		 20 => array("The Throne of the Four Winds", "Thron der Vier Winde", "5", "2", "19"),
		 21 => array("The Bastion of Twilight", "Die Bastion des Zwielichts", "5", "3", "20"),
		 22 => array("Blackwing Descent", "Pechschwingenabstieg", "5", "3", "21"),
		 23 => array("Baradin Hold", "Baradinfestung", "5", "3", "22"),
		 24 => array("The Throne of the Four Winds", "Thron der Vier Winde", "5", "3", "23"),
		 25 => array("The Bastion of Twilight", "Die Bastion des Zwielichts", "5", "4", "24"),
		 26 => array("Blackwing Descent", "Pechschwingenabstieg", "5", "4", "25"),
		 27 => array("Baradin Hold", "Baradinfestung", "5", "4", "26"),
		 28 => array("The Throne of the Four Winds", "Thron der Vier Winde", "5", "4", "27"),
	//	-------------------- Firelands --------------------------------------
		29 => array('Firelands', 'Feuerlande', "5", "1", "28"),
		30 => array('Firelands', 'Feuerlande', "5", "2", "29"),		
		31 => array('Firelands', 'Feuerlande', "5", "3", "30"),
		32 => array('Firelands', 'Feuerlande', "5", "4", "31"),
	//	-------------------- Dragon Soul --------------------------------------
		33 => array('Dragon Soul', 'Drachenseele', "5", "1", "32"),
		34 => array('Dragon Soul', 'Drachenseele', "5", "2", "33"),
		35 => array('Dragon Soul', 'Drachenseele', "5", "3", "34"),
		36 => array('Dragon Soul', 'Drachenseele', "5", "4", "35"),	
	//	-------------------- MOP --------------------------------------
		 37	=> array("Mogu'shan Vaults", "Mogu'shan", "5", "0", "36"),
		 38 => array("Terrace of endless spring", "Terrasse", "5", "0", "37"),
		 39 => array("Heart of Fear", "Herz der Angst", "5", "0", "38"),
	),
	'boss' => array(
		  1 => array("Loatheb", "Loatheb", "2", "0", "0", "1", "5"),
		  2 => array("Instructor Razuvious", "Razuvious", "2", "0", "0", "1", "6"),
		  3 => array("Gothik the Harvester", "Gothik", "2", "0", "0", "1", "7"),
		  4 => array("Four Horsemen", "Reiter", "2", "0", "0", "1", "8"),
		  5 => array("Anub'Rekhan", "Anub'rekhan", "2", "0", "0", "1", "0"),
		  6 => array("Grand Widow Faerlina", "Faerlina", "2", "0", "0", "1", "1"),
		  7 => array("Maexxna", "Maexxna", "2", "0", "0", "1", "2"),
		  8 => array("Noth the Plaguebringer", "Noth", "2", "0", "0", "1", "3"),
		  9 => array("Heigan the Unclean", "Heigan", "2", "0", "0", "1", "4"),
		 10 => array("Patchwerk", "Patchwerk", "2", "0", "0", "1", "9"),
		 11 => array("Grobbulus", "Grobbulus", "2", "0", "0", "1", "10"),
		 12 => array("Gluth", "Gluth", "2", "0", "0", "1", "11"),
		 13 => array("Thaddius", "Thaddius", "2", "0", "0", "1", "12"),
		 14 => array("Sapphiron", "Sapphiron", "2", "0", "0", "1", "13"),
		 15 => array("Kel'Thuzad", "Kel'Thuzad", "4", "0", "0", "1", "14"),
		 16 => array("Malygos", "Malygos", "4", "0", "0", "2", "0"),
		 17 => array("Sartharion", "Sartharion", "2", "0", "0", "3", "0"),
		 18 => array("Sartharion 1D", "Sartharion 1D", "4", "0", "0", "3", "1"),
		 19 => array("Sartharion 2D", "Sartharion 2D", "6", "0", "0", "3", "2"),
		 20 => array("Sartharion 3D", "Sartharion 3D", "8", "0", "0", "3", "3"),
		 21 => array("Archavon the Stone Watcher", "Archavon", "2", "0", "0", "4", "0"),
		 22 => array("Flame Leviathan", "Leviathan", "3", "0", "0", "5", "0"),
		 23 => array("Ignis the Furnace Master", "Ignis", "3", "0", "0", "5", "1"),
		 24 => array("Razorscale", "Klingenschuppe", "3", "0", "0", "5", "2"),
		 25 => array("XT-002 Deconstructor", "XT-002", "3", "0", "0", "5", "3"),
		 26 => array("The Iron Council", "Eiserne Rat", "3", "0", "0", "5", "4"),
		 27 => array("Kologarn", "Kologarn", "3", "0", "0", "5", "5"),
		 28 => array("Auriaya", "Auriaya", "3", "0", "0", "5", "6"),
		 29 => array("Hodir", "Hodir", "3", "0", "0", "5", "7"),
		 30 => array("Thorim", "Thorim", "3", "0", "0", "5", "8"),
		 31 => array("Freya", "Freya", "3", "0", "0", "5", "9"),
		 32 => array("Mimiron", "Mimiron", "3", "0", "0", "5", "10"),
		 33 => array("General-Vezax", "Vezax", "3", "0", "0", "5", "11"),
		 34 => array("Yogg-Saron", "Yogg-Saron", "4", "0", "0", "5", "12"),
		 35 => array("Algalon the Observer", "Algalon", "4", "0", "0", "5", "13"),
		 36 => array("Emalon the Storm Watcher", "Emalon", "2", "0", "0", "4", "1"),
		 37 => array("Northrend Beasts", "Bestien", "2", "0", "2", "6", "0"),
		 38 => array("Lord Jaraxxus", "Jaraxxus", "2", "0", "2", "6", "1"),
		 39 => array("Faction Champions", "Champions", "3", "0", "2", "6", "2"),
		 40 => array("Twin Val'kyr", "Zwillingsval'kyr", "3", "0", "2", "6", "3"),
		 41 => array("Anub'arak", "Anub'arak", "4", "0", "2", "6", "4"),
		 42 => array("Northrend Beasts", "Bestien", "2", "0", "4", "7", "0"),
		 43 => array("Lord Jaraxxus", "Jaraxxus", "2", "0", "4", "7", "1"),
		 44 => array("Faction Champions", "Champions", "3", "0", "4", "7", "2"),
		 45 => array("Twin Val'kyr", "Zwillingsval'kyr", "3", "0", "4", "7", "3"),
		 46 => array("Anub'arak", "Anub'arak", "4", "0", "4", "7", "4"),
		 47 => array("Koralon the Flame Watcher", "Koralon", "2", "0", "0", "4", "2"),
		 48 => array("Onyxia", "Onyxia", "2", "0", "0", "8", "0"),
		 49 => array("Lord Marrowgar", "Mark'gar", "2", "0", "2", "9", "0"),
		 50 => array("Lady Deathwhisper", "Todeswisper", "2", "0", "2", "9", "1"),
		 51 => array("Gunship Battle", "Kanonenschiff", "2", "0", "2", "9", "2"),
		 52 => array("Deathbringer Saurfang", "Saurfang", "2", "0", "2", "9", "3"),
		 53 => array("Festergut", "Fauldarm", "2", "0", "2", "9", "4"),
		 54 => array("Rotface", "Modermiene", "2", "0", "2", "9", "5"),
		 55 => array("Professor Putricide", "Seuchenmord", "2", "0", "2", "9", "6"),
		 56 => array("Blood Prince Council", "Rat des Blutes", "2", "0", "2", "9", "7"),
		 57 => array("Blood-Queen Lana'thel", "Lana'thel", "2", "0", "2", "9", "8"),
		 58 => array("Valithiria Dreamwalker", "Traumwandler", "2", "0", "2", "9", "9"),
		 59 => array("Sindragosa", "Sindragosa", "2", "0", "2", "9", "10"),
		 60 => array("The Lich King", "Arthas", "2", "0", "2", "9", "11"),
		 61 => array("Toravon the Ice Watcher", "Toravon", "2", "0", "0", "4", "3"),
		 62 => array("Lord Marrowgar", "Mark'gar", "2", "0", "4", "10", "0"),
		 63 => array("Lady Deathwhisper", "Todeswisper", "2", "0", "4", "10", "1"),
		 64 => array("Gunship Battle", "Kanonenschiff", "2", "0", "4", "10", "2"),
		 65 => array("Deathbringer Saurfang", "Saurfang", "2", "0", "4", "10", "3"),
		 66 => array("Festergut", "Fauldarm", "2", "0", "4", "10", "4"),
		 67 => array("Rotface", "Modermiene", "2", "0", "4", "10", "5"),
		 68 => array("Professor Putricide", "Seuchenmord", "2", "0", "4", "10", "6"),
		 69 => array("Blood Prince Council", "Rat des Blutes", "2", "0", "4", "10", "7"),
		 70 => array("Blood-Queen Lana'thel", "Lana'thel", "2", "0", "4", "10", "8"),
		 71 => array("Valithiria Dreamwalker", "Traumwandler", "2", "0", "4", "10", "9"),
		 72 => array("Sindragosa", "Sindragosa", "2", "0", "4", "10", "10"),
		 73 => array("The Lich King", "Arthas", "2", "0", "4", "10", "11"),
		 74 => array("Halion the Twilight Destroyer", "Halion", "4", "0", "2", "11", "0"),
		 75 => array("Halion the Twilight Destroyer", "Halion", "5", "0", "4", "12", "0"),
		 76 => array("Valiona and Theralion", "Valiona und Theralion", "2", "0", "1", "13", "0"),
		 77 => array("Halfus Wyrmbreaker", "Halfus Wyrmbrecher", "2", "0", "1", "13", "1"),
		 78 => array("Twilight Ascendant Council", "Rat der Aszendenten", "2", "0", "1", "13", "2"),
		 79 => array("Cho'gall", "Cho'gall", "3", "0", "1", "13", "3"),
		 80 => array("Magmaw", "Magmaul", "2", "0", "1", "14", "0"),
		 81 => array("Omnotron Defense System", "Omnotron-Verteidigungssystem", "2", "0", "1", "14", "1"),
		 82 => array("Maloriak", "Maloriak", "2", "0", "1", "14", "2"),
		 83 => array("Atramedes", "Atramedes", "2", "0", "1", "14", "3"),
		 84 => array("Chimaeron", "Schimaeron", "2", "0", "1", "14", "4"),
		 85 => array("Nefarian", "Nefarian", "2", "0", "1", "14", "5"),
		 86 => array("Argaloth", "Argaloth", "2", "0", "1", "15", "0"),
		 87 => array("Conclave of Wind", "Konklave des Windes", "2", "0", "1", "16", "0"),
		 88 => array("Al'Akir", "Al'Akir", "2", "0", "1", "16", "1"),
		 89 => array("Valiona and Theralion", "Valiona und Theralion", "2", "0", "2", "17", "0"),
		 90 => array("Halfus Wyrmbreaker", "Halfus Wyrmbrecher", "2", "0", "2", "17", "1"),
		 91 => array("Twilight Ascendant Council", "Rat der Aszendenten", "2", "0", "2", "17", "2"),
		 92 => array("Cho'gall", "Cho'gall", "3", "0", "2", "17", "3"),
		 93 => array("Magmaw", "Magmaul", "2", "0", "2", "18", "0"),
		 94 => array("Omnotron Defense System", "Omnotron-Verteidigungssystem", "2", "0", "2", "18", "1"),
		 95 => array("Maloriak", "Maloriak", "2", "0", "2", "18", "2"),
		 96 => array("Atramedes", "Atramedes", "2", "0", "2", "18", "3"),
		 97 => array("Chimaeron", "Schimaeron", "2", "0", "2", "18", "4"),
		 98 => array("Nefarian", "Nefarian", "2", "0", "2", "18", "5"),
		 99 => array("Argaloth", "Argaloth", "2", "0", "2", "19", "0"),
		100 => array("Conclave of Wind", "Konklave des Windes", "2", "0", "2", "20", "0"),
		101 => array("Al'Akir", "Al'Akir", "2", "0", "2", "20", "1"),
		102 => array("Valiona and Theralion", "Valiona und Theralion", "2", "0", "3", "21", "0"),
		103 => array("Halfus Wyrmbreaker", "Halfus Wyrmbrecher", "2", "0", "3", "21", "1"),
		104 => array("Twilight Ascendant Council", "Rat der Aszendenten", "2", "0", "3", "21", "2"),
		105 => array("Cho'gall", "Cho'gall", "3", "0", "3", "21", "3"),
		106 => array("Magmaw", "Magmaul", "2", "0", "3", "22", "0"),
		107 => array("Omnotron Defense System", "Omnotron-Verteidigungssystem", "2", "0", "3", "22", "1"),
		108 => array("Maloriak", "Maloriak", "2", "0", "3", "22", "2"),
		109 => array("Atramedes", "Atramedes", "2", "0", "3", "22", "3"),
		110 => array("Chimaeron", "Schimaeron", "2", "0", "3", "22", "4"),
		111 => array("Nefarian", "Nefarian", "2", "0", "3", "22", "5"),
		112 => array("Argaloth", "Argaloth", "2", "0", "3", "23", "0"),
		113 => array("Conclave of Wind", "Konklave des Windes", "2", "0", "3", "24", "0"),
		114 => array("Al'Akir", "Al'Akir", "2", "0", "3", "24", "1"),
		115 => array("Valiona and Theralion", "Valiona und Theralion", "2", "0", "4", "25", "0"),
		116 => array("Halfus Wyrmbreaker", "Halfus Wyrmbrecher", "2", "0", "4", "25", "1"),
		117 => array("Twilight Ascendant Council", "Rat der Aszendenten", "2", "0", "4", "25", "2"),
		118 => array("Cho'gall", "Cho'gall", "3", "0", "4", "25", "3"),
		119 => array("Magmaw", "Magmaul", "2", "0", "4", "26", "0"),
		120 => array("Omnotron Defense System", "Omnotron-Verteidigungssystem", "2", "0", "4", "26", "1"),
		121 => array("Maloriak", "Maloriak", "2", "0", "4", "26", "2"),
		122 => array("Atramedes", "Atramedes", "2", "0", "4", "26", "3"),
		123 => array("Chimaeron", "Schimaeron", "2", "0", "4", "26", "4"),
		124 => array("Nefarian", "Nefarian", "2", "0", "4", "26", "5"),
		125 => array("Argaloth", "Argaloth", "2", "0", "4", "27", "0"),
		126 => array("Conclave of Wind", "Konklave des Windes", "2", "0", "4", "28", "0"),
		127 => array("Al'Akir", "Al'Akir", "2", "0", "4", "28", "1"),
		128 => array("Sinestra", "Sinestra", "3", "0", "3", "21", "4"),
		129 => array("Sinestra", "Sinestra", "3", "0", "4", "25", "4"),
	//	-------------------- Firelands --------------------------------------	
	#		string	| note	| bonus | timebonus | diff | tozone | sort
		130 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '1', '29', '0'),
		131 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '1', '29', '1'),
		132 => array('Alysrazor', 'Alysrazar', '2', '0', '1', '29', '2'),
		133 => array('Shannox', 'Shannox', '2', '0', '1', '29', '3'),
		134 => array('Baleroc', 'Baloroc', '2', '0', '1', '29', '4'),
		135 => array('Majordomo Staghelm', 'Majordomus Hirschhaupt', '2', '0', '1', '29', '5'),
		136 => array('Ragnaros', 'Ragnaros', '2', '0', '1', '29', '6'),
		
		137 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '2', '30', '0'),
		138 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '2', '30', '1'),
		139 => array('Alysrazor', 'Alysrazar', '2', '0', '2', '30', '2'),
		140 => array('Shannox', 'Shannox', '2', '0', '2', '30', '3'),
		141 => array('Baleroc', 'Baloroc', '2', '0', '2', '30', '4'),
		142 => array('Majordomo Staghelm', 'Majordomus Hirschhaupt', '2', '0', '2', '30', '5'),
		143 => array('Ragnaros', 'Ragnaros', '2', '0', '2', '30', '6'),
		
		144 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '3', '31', '0'),
		145 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '3', '31', '1'),
		146 => array('Alysrazor', 'Alysrazar', '2', '0', '3', '31', '2'),
		147 => array('Shannox', 'Shannox', '2', '0', '3', '31', '3'),
		148 => array('Baleroc', 'Baloroc', '2', '0', '3', '31', '4'),
		149 => array('Majordomo Staghelm', 'Majordomus Hirschhaupt', '2', '0', '3', '31', '5'),
		150 => array('Ragnaros', 'Ragnaros', '2', '0', '3', '31', '6'),
		
		151 => array('Beth\'tilac', 'Beth\'tilac', '2', '0', '4', '32', '0'),
		152 => array('Lord Rhyolith', 'Lord Rhyolith', '2', '0', '4', '32', '1'),
		153 => array('Alysrazor', 'Alysrazar', '2', '0', '4', '32', '2'),
		154 => array('Shannox', 'Shannox', '2', '0', '4', '32', '3'),
		155 => array('Baleroc', 'Baloroc', '2', '0', '4', '32', '4'),
		156 => array('Majordomo Staghelm', 'Majordomus Hirschhaupt', '2', '0', '4', '32', '5'),
		157 => array('Ragnaros', 'Ragnaros', '2', '0', '4', '32', '6'),
		
	//	-------------------- Dragon Soul --------------------------------------
	#		string	| note	| bonus | timebonus | diff | tozone | sort
		158 => array('Morchok', 'Morchok', '2', '0', '1', '33', '0'),
		159 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '1','33', '1'),
		160 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '1','33', '2'),
		161 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '1','33', '3'),
		162 => array('Ultraxion', 'Ultraxion', '2', '0', '1', '33', '4'),
		163 => array('Warmaster Blackhorn', 'Schwarzhorn', '0', '0', '1','33', '5'),
		164 => array('Spine of Deathwing', 'Rückgrat', '2', '0', '1', '33', '6'),
		165 => array('Madness of Deathwing', 'Wahnsinn', '2', '0', '1', '33', '7'),
		
		166 => array('Morchok', 'Morchok', '2', '0', '2', '34', '0'),
		167 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '2','34', '1'),
		168 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '2', '34', '2'),
		169 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '2','34', '3'),
		170 => array('Ultraxion', 'Ultraxion', '2', '0', '2', '34', '4'),
		171 => array('Warmaster Blackhorn', 'Schwarzhorn', '0', '0', '2','34', '5'),
		172 => array('Spine of Deathwing', 'Rückgrat', '2', '0', '2', '34', '6'),
		173 => array('Madness of Deathwing', 'Wahnsinn', '2', '0', '2', '34', '7'),
		
		174 => array('Morchok', 'Morchok', '2', '0', '3', '35', '0'),
		175 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '3','35', '1'),
		176 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '3', '35', '2'),
		177 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '3','35', '3'),
		178 => array('Ultraxion', 'Ultraxion', '2', '0', '3', '35', '4'),
		179 => array('Warmaster Blackhorn', 'Schwarzhorn', '0', '0', '3','35', '5'),
		180 => array('Spine of Deathwing', 'Rückgrat', '2', '0', '3', '35', '6'),
		181 => array('Madness of Deathwing', 'Wahnsinn', '2', '0', '3', '35', '7'),
		
		182 => array('Morchok', 'Morchok', '2', '0', '4', '36', '0'),
		183 => array('Warlord Zon\'ozz', 'Zon\'ozz', '2', '0', '4','36', '1'),
		184 => array('Yor\'sahj the Unsleeping', 'Yor\'sahj', '2', '0', '4', '36', '2'),
		185 => array('Hagara the Stormbinder', 'Hagara', '2', '0', '4','36', '3'),
		186 => array('Ultraxion', 'Ultraxion', '2', '0', '4', '36', '4'),
		187 => array('Warmaster Blackhorn', 'Schwarzhorn', '0', '0', '4','36', '5'),
		188 => array('Spine of Deathwing', 'Rückgrat', '2', '0', '4', '36', '6'),
		189 => array('Madness of Deathwing', 'Wahnsinn', '2', '0', '4', '36', '7'),
	
	//	-------------------- MOP --------------------------------------
		190 => array("The Stone Guard", "Steinwache", "1", "1", "0", "37", "0"),
		191 => array("Feng the Accursed", "Feng", "1", "1", "0", "37", "1"),
		192 => array("Gara'jal the Spiritbinder", "Gara'jal", "1", "1", "0", "37", "2"),
		193 => array("The Spirit Emporers", "Geisterkönige", "1", "1", "0", "37", "3"),
		194 => array("Elegon", "Elegon", "1", "1", "0", "37", "4"),
		195 => array("Will of the Emperor", "Wille des Kaisers", "1", "1", "0", "37", "5"),
		196 => array("Protectors of the Endless", "Beschützer", "1", "1", "0", "38", "0"),
		197 => array("Tsulong", "Tsulong", "1", "1", "0", "38", "1"),
		198 => array("Lei Shi", "Lei Shi", "1", "1", "0", "38", "2"),
		199 => array("Sha of Fear", "Sha der Angst", "1", "1", "0", "38", "3"),
		200 => array("Imperial Vizier Zor'lok", "Zor'lok", "1", "1", "0", "39", "0"),
		201 => array("Blade Lord Ta'yak", "Ta'yak", "1", "1", "0", "39", "1"),
		202 => array("Garalon", "Garalon", "1", "1", "0", "39", "2"),
		203 => array("Wind Lord Mel'jarak", "Mel'jarak", "1", "1", "0", "39", "3"),
		204 => array("Amber Shaper Un'sok", "Un'sok", "1", "1", "0", "39", "4"),
		205 => array("Grand Emporer Shek'zeer", "Shek'zeer", "1", "1", "0", "39", "5"),
	)
);
//$spanish = array();
?>
