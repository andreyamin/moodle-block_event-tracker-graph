<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Event tracker block instance settings
 *
 * @package    block_event_tracker_graph
 * @copyright  2018 Andre Yamin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
class block_event_tracker_graph_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));
 
        // A sample string variable with a default value.
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_event_tracker_graph'));
        $mform->setType('config_title', PARAM_TEXT);

        $mform->addElement('advcheckbox', 'config_showchartdata', get_string('showchartdata', 'block_event_tracker_graph'));

        $events = report_eventlist_list_generator::get_all_events_list(false);

        //Event 1 options
        $mform->addElement('header', 'config_header', get_string('event1', 'block_event_tracker_graph'));
        $mform->addElement('advcheckbox', 'config_event1enabled', get_string('enablevent1', 'block_event_tracker_graph'));
        $mform->addElement('select', 'config_event1', get_string('event1', 'block_event_tracker_graph'), $events);
		$mform->setType('config_event1', PARAM_TEXT);

        $mform->addElement('text', 'config_customlabel1', get_string('customlabel', 'block_event_tracker_graph'));
        $mform->setType('config_customlabel1', PARAM_TEXT);

		//Event 2 options
        $mform->addElement('header', 'config_header', get_string('event2', 'block_event_tracker_graph'));
		$mform->addElement('advcheckbox', 'config_event2enabled', get_string('enablevent2', 'block_event_tracker_graph'));
		$mform->addElement('select', 'config_event2', get_string('event2', 'block_event_tracker_graph'), $events);
		$mform->setType('config_event2', PARAM_TEXT);

		$mform->addElement('text', 'config_customlabel2', get_string('customlabel', 'block_event_tracker_graph'));
        $mform->setType('config_customlabel2', PARAM_TEXT);
		
		//Event 3 options
		$mform->addElement('header', 'config_header', get_string('event3', 'block_event_tracker_graph'));
		$mform->addElement('advcheckbox', 'config_event3enabled', get_string('enablevent3', 'block_event_tracker_graph'));
		$mform->addElement('select', 'config_event3', get_string('event3', 'block_event_tracker_graph'), $events);
		$mform->setType('config_event3', PARAM_TEXT);

		$mform->addElement('text', 'config_customlabel3', get_string('customlabel', 'block_event_tracker_graph'));
        $mform->setType('config_customlabel3', PARAM_TEXT);
		
		//Event 4 options
		$mform->addElement('header', 'config_header', get_string('event4', 'block_event_tracker_graph'));
		$mform->addElement('advcheckbox', 'config_event4enabled', get_string('enablevent4', 'block_event_tracker_graph'));
		$mform->addElement('select', 'config_event4', get_string('event4', 'block_event_tracker_graph'), $events);
		$mform->setType('config_event4', PARAM_TEXT);

		$mform->addElement('text', 'config_customlabel4', get_string('customlabel', 'block_event_tracker_graph'));
        $mform->setType('config_customlabel4', PARAM_TEXT);

		//Event 5 options
		$mform->addElement('header', 'config_header', get_string('event5', 'block_event_tracker_graph'));
		$mform->addElement('advcheckbox', 'config_event5enabled', get_string('enablevent5', 'block_event_tracker_graph'));
		$mform->addElement('select', 'config_event5', get_string('event5', 'block_event_tracker_graph'), $events);
		$mform->setType('config_event', PARAM_TEXT);

		$mform->addElement('text', 'config_customlabel5', get_string('customlabel', 'block_event_tracker_graph'));
        $mform->setType('config_customlabel5', PARAM_TEXT);

    }
}