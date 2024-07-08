const get_rest_events = document.getElementById('get_rest_events');


jQuery(document).ready(function ($) {

	if(niceEventData.urlForUpdate == "true"){
		showEventsOnPageLoad();
	}else{
		console.log('Load by url is false');
	}
	
	if(niceEventData.buttonForUpdate == "true"){
		showEventsOnBtn();
	}else{
		console.log('Load by button is false');
	}
	
	//events
	function showEventsOnBtn(){
		if (get_rest_events) {
			get_rest_events.addEventListener('click', loadEvents);
		  }
	}
	
	function showEventsOnPageLoad(){
	   window.addEventListener("load",loadEvents);
	}	

	//methods
  function loadEvents() {
    $.ajax({
	  url:niceEventData.root_url + "/wp-json/event/v1/showEvents",
      type: "GET",
      success: response => {

        let events = response.events;
		let arrTime;

        for (let key in events) {
		    arrTime = events[key].times[0];
          $(`
                   <li class="program-card program-card--${events[key].color}">
						<div class="program-card__item  ">
							<div class="program-card__info">
								<div class="program-card__info-link">
									<h2 class="h4 program-card__info-title">${events[key].title}</h2>
								</div>
								<!-- Format for atribute === <time datetime="YYYY-MM-DDThh:mm:ssTZD"> -->
								<time class="program-card__info-time" datetime="2017-02-14">
									<svg version="1.1" focusable="false" viewBox="0 0 7 6" class="eagerlyicon  eagerlyicon-disc  program-card__info-date-disc" aria-hidden="true">
										<path fill="#EB6057" d="M.31 4.23V1.77L2.013 0h2.593L6.31 1.77v2.46L4.606 6H2.013L.31 4.23Z"></path>
									</svg> 
									${arrTime.program_start}
								</time>
								<ul class="program-card__info-tags-list">
									${Object.keys(events[key].tags).map(item=>`
										  <li class="program-card__info-tag">
											${document.createElement("span").innerText = item}
										  </li>	
											`
										).join("")}
								</ul>
							</div>
							<div class="program-card__content program-card__hover-animation-wrapper--opacity">
								<p class="program-card__content-text">${events[key].intro}</p>
							</div>
							<div class="program-card__btn-wrapper">
								<ul class="program-card__prices-list program-card__hover-animation-wrapper--opacity">
								    	${arrTime.price ?
											Object.entries(arrTime.price).map(item=>`
										  <li class="program-card__prices-item">
											${document.createElement("span").innerText = item[0]}
											  :
											${document.createElement("span").innerText = item[1]}
										  </li>	
											`
										).join("")
									:""}
								</ul>
								<a href="${arrTime.price ? arrTime.ticket_link : '#'}" class="btn btn--min-width program-card__btn">${arrTime.price ? `tickets` : `gratis`}</a>
							</div>
						</div>
					</li>
            `)
            .prependTo(".program__list")
        }
      },
      error: response => {
        console.log("Sorry")
        console.log(response)
      }
    })
  }
})