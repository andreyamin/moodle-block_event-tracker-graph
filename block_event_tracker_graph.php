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
 * Event tracker block definition
 *
 * @package    block_event_tracker_graph
 * @copyright  2018 Andre Yamin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Event tracker block class
 * @copyright  2018 Andre Yamin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_event_tracker_graph extends block_base {

    /**
     * Init function
     */
    public function init() {
        $this->title = get_string('event_tracker_graph', 'block_event_tracker_graph');
    }

    /**
     * Instance allow multiple function
     */
    public function instance_allow_multiple() {
        return true;
    }

    /**
     * Specialization function
     */
    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('pluginname', 'block_event_tracker_graph');
            } else {
                $this->title = $this->config->title;
            }
        }
    }

    /**
     * Get content function
     */
    public function get_content() {

        Global $OUTPUT, $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        $wag = new DateTime("-1 week", core_date::get_server_timezone_object());
        $wag->setTime(0, 0, 0);
        $start = $wag->getTimestamp();

        $days = $s1 = $s2 = $s3 = $s4 = $s5 = array();

        if (isset($this->config->event1enabled)) {
            $e1 = ($this->config->event1enabled == 1) ? true : false;
        } else {
            $e1 = false;
        }
        if (isset($this->config->event2enabled)) {
            $e2 = ($this->config->event2enabled == 1) ? true : false;
        } else {
            $e2 = false;
        }
        if (isset($this->config->event3enabled)) {
            $e3 = ($this->config->event3enabled == 1) ? true : false;
        } else {
            $e3 = false;
        }
        if (isset($this->config->event4enabled)) {
            $e4 = ($this->config->event4enabled == 1) ? true : false;
        } else {
            $e4 = false;
        }
        if (isset($this->config->event5enabled)) {
            $e5 = ($this->config->event5enabled == 1) ? true : false;
        } else {
            $e5 = false;
        }

        $wd = [
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6 => 'Friday',
            7 => 'Saturday'
            ];

        for ($i = 1; $i <= 7; $i++) {

            $timefrom = $start + $i * 24 * 3600;
            $timeto = $timefrom + 24 * 3600;

            $basecond = "timecreated > " . $timefrom . " AND timecreated < " . $timeto;

            if ($e1) {

                $event1 = $this->config->event1;
                $cond1 = $basecond . " AND eventname = '" . $event1 . "'";
                $s1[] = $DB->count_records_select('logstore_standard_log', $cond1);

            }
            if ($e1) {

                $event2 = $this->config->event2;
                $cond2 = $basecond . " AND eventname = '" . $event2 . "'";
                $s2[] = $DB->count_records_select('logstore_standard_log', $cond2);

            }
            if ($e3) {

                $event3 = $this->config->event3;
                $cond3 = $basecond . " AND eventname = '" . $event3 . "'";
                $s3[] = $DB->count_records_select('logstore_standard_log', $cond3);

            }
            if ($e4) {

                $event4 = $this->config->event4;
                $cond4 = $basecond . " AND eventname = '" . $event4 . "'";
                $s4[] = $DB->count_records_select('logstore_standard_log', $cond4);

            }
            if ($e5) {

                $event5 = $this->config->event5;
                $cond5 = $basecond . " AND eventname = '" . $event5 . "'";
                $s5[] = $DB->count_records_select('logstore_standard_log', $cond5);

            }

            $days[] = $wd[date('N', $timeto)];
        }

        $chart = new \core\chart_line();

        $eventlist = report_eventlist_list_generator::get_all_events_list();

        if ($e1) {
            if (isset($this->config->customlabel1)) {
                if (!empty($this->config->customlabel1)) {
                    $label1 = $this->config->customlabel1;
                } else {
                    $label1 = $eventlist[$event1]["raweventname"];
                }
            } else {
                $label1 = $eventlist[$event1]["raweventname"];
            }

            $series1 = new \core\chart_series($label1, $s1);
            $chart->add_series($series1);
        }
        if ($e2) {
            if (isset($this->config->customlabel2)) {
                if (!empty($this->config->customlabel2)) {
                    $label2 = $this->config->customlabel2;
                } else {
                    $label2 = $eventlist[$event2]["raweventname"];
                }
            } else {
                $label2 = $eventlist[$event2]["raweventname"];
            }
            $series2 = new \core\chart_series($label2, $s2);
            $chart->add_series($series2);
        }
        if ($e3) {
            if (isset($this->config->customlabel3)) {
                if (!empty($this->config->customlabel3)) {
                    $label3 = $this->config->customlabel3;
                } else {
                    $label3 = $eventlist[$event3]["raweventname"];
                }
            } else {
                    $label3 = $eventlist[$event3]["raweventname"];
            }
            $series3 = new \core\chart_series($label3, $s3);
            $chart->add_series($series3);
        }
        if ($e4) {
            if (isset($this->config->customlabel4)) {
                if (!empty($this->config->customlabel4)) {
                    $label4 = $this->config->customlabel4;
                } else {
                    $label4 = $eventlist[$event4]["raweventname"];
                }
            } else {
                    $label4 = $eventlist[$event4]["raweventname"];
            }
            $series4 = new \core\chart_series($label4, $s4);
            $chart->add_series($series4);
        }
        if ($e5) {
            if (isset($this->config->customlabel5)) {
                if (!empty($this->config->customlabel5)) {
                    $label5 = $this->config->customlabel5;
                } else {
                    $label5 = $eventlist[$event5]["raweventname"];
                }
            } else {
                    $label5 = $eventlist[$event5]["raweventname"];
            }
            $series5 = new \core\chart_series($label5, $s5);
            $chart->add_series($series5);
        }

        $chart->set_labels($days);

        if (isset($this->config->showchartdata)) {
            if ($this->config->showchartdata == 1) {
                $showchartdata = true;
            } else {
                $showchartdata = false;
            }
        } else {
            $showchartdata = false;
        }

        if (isset($this->config->smooth)) {
            if ($this->config->smooth == 1) {
                $smooth = true;
            } else {
                $smooth = false;
            }
        } else {
            $smooth = false;
        }

        $chart->set_smooth($smooth);
        $html = $OUTPUT->render_chart($chart, $showchartdata);

        $this->content         = new stdClass;
        $this->content->text   = $html;
        $this->content->footer = '';

        return $this->content;
    }
}