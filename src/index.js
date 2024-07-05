const get_rest_events = document.getElementById('get_rest_events');

jQuery(document).ready(function($) {

 if (get_rest_events) {
			get_rest_events.addEventListener('click', loadEvents);
 }

function loadEvents(){
	$.ajax({
        url:"http://foo.local/wp-json/event/v1/showEvents",
        type: "GET",
        success: response => {
          console.log("Works")
          console.log(response)
        },
        error: response => {
          console.log("Sorry")
          console.log(response)
        }
      })
    }
})
	