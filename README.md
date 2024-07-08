Nice events is a wordpress plugin for displaying calendar events from JSON feed. 
To display the events calendar on the page you need to paste shortcode into the text editor.

[event_calendar]

Be default events are loading on url call and can be updated by clicking button "Update events".
There is possibility to load events only by clicking on button or hiding button and load events only by url call. For changing settings you need to pass the corresponding parameters to shortcode.
For example:

[event_calendar button_for_update="false" url_for_update="true"].

By default both parameters are set to "true".
