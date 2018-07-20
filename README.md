# Event Tracker block for Moodle
The event tracker graph block show a chart with the weekly trend of events of your choice. It allow you to select up to five different events to calculate the daily totals from the last week.
![](https://lh5.googleusercontent.com/WYzl2DNr-a5f6-VQUsUHXQ4RwWb69oPKFzesfxjPL_QVzfPpYH9z5J_VPlud_64U8fTIVJ8t779q-Q=w3252-h1860-rw)
Admins can use it to track site access, login errors, password resets etc. Course creators could measure engagement monitoring number of topics and messages in forum.
# Instalation 
## Using the zip file
1. unzip the under the /blocks folder on your moodle install
2. Make sure the plugin folder name is event_block_graph
3. Go to /admin and run the install process
## With git
1. Go to /blocks folder
2. Run git clone https://github.com/andreyamin/moodle-block_event-tracker-graph.git event_graph_graph
3. Cd event_graph_graph
4. git checkout MOODLE_35_STABLE
# Configuration
## Block options
* Block title - this setting allow you to set a custom block title. The default title is "Event tracker"
* Show chart data - enable a link at he bottom of the chart to show the source data in a table bellow the chart
* Smooth lines - change appearance of the lines from straight to curvy lines
## Data series
When you add this block to any page it'll show no data. To make it show some data all you need to do is:
1. Enable at least one data series
2. Select the event you want to use to calculate the data series
3. (optional) Set a custom label for you data series. The default labels looks something like "User logged in \core\event\user_loggedin". You might want to make it simpler like "Logins"
# Chart features
## Showing and hiding data series
You can show and hide data series by clicking on labels.
## Showing and hiding chart data
If the block is configured to show chart data, you can see the source data for all data series by clicking on "Show chart data" bottom left corner of the block.
