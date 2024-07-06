const get_rest_events = document.getElementById('get_rest_events');

jQuery(document).ready(function ($) {

  if (get_rest_events) {
    get_rest_events.addEventListener('click', loadEvents);
  }

  function loadEvents() {
    $.ajax({
	  url:niceEventData.root_url + "/wp-json/event/v1/showEvents",
      type: "GET",
      success: response => {

        let events = response.events;

        for (let key in events) {
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
									</svg> Vr 22 mrt 2024
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
								<p class="program-card__content-text">Je favoriete avond is terug. Dé gratis open-mic van Almere waar alles kan en de stage voor iedereen is.</p>
							</div>
							<div class="program-card__btn-wrapper">
								<ul class="program-card__prices-list program-card__hover-animation-wrapper--opacity">
									<li class="program-card__prices-item">Deur: €6,00</li>
									<li class="program-card__prices-item">Online: €7,50</li>
								</ul>
								<a href="https://ticketlink.here" class="btn btn--min-width program-card__btn">tickets</a>
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