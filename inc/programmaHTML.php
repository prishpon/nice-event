<?php
function showProgrammaHTML(){ 
     $request = wp_remote_get( 'https://poppodiumdemeester.nl/event_feed_json' );

if( is_wp_error( $request ) ) {
  return false; 
}

$body = wp_remote_retrieve_body( $request );

$data = json_decode( $body );

if( ! empty( $data ) ) {
  
  echo '<ul>';
  foreach( $data->events as $event ) {
	echo '<li>';
	  echo '<a href="">' . $event->title . '</a>';
	echo '</li>';
  }
  echo '</ul>';
} ?>
   <main class="grid">
			<div class="overview-title">
				<h1>Programma</h1>
			</div>
			<section class="program">
				<ul class="program__list">
					<li class="program-card program-card--clr-secondary--400">
						<div class="program-card__item  ">
							<div class="program-card__info">
								<div class="program-card__info-link">
									<h2 class="h4 program-card__info-title">1300s By The Books XI</h2>
								</div>
								<!-- Format for atribute === <time datetime="YYYY-MM-DDThh:mm:ssTZD"> -->
								<time class="program-card__info-time" datetime="2017-02-14">
									<svg version="1.1" focusable="false" viewBox="0 0 7 6" class="eagerlyicon  eagerlyicon-disc  program-card__info-date-disc" aria-hidden="true">
										<path fill="#EB6057" d="M.31 4.23V1.77L2.013 0h2.593L6.31 1.77v2.46L4.606 6H2.013L.31 4.23Z"></path>
									</svg> Vr 22 mrt 2024
								</time>
								<ul class="program-card__info-tags-list">
									<li class="program-card__info-tag">Hip hop</li>
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
					<li class="program-card program-card--clr-secondary--500">
						<div class="program-card__item  ">

							<div class="program-card__info">

								<div class="program-card__info-link">
									<h2 class="h4 program-card__info-title">Jaïnda invites buttoned &amp; Your musiq
										live talents</h2>
								</div>
								<!-- Format for atribute === <time datetime="YYYY-MM-DDThh:mm:ssTZD"> -->
								<time class="program-card__info-time" datetime="2017-02-14">
									<svg version="1.1" focusable="false" viewBox="0 0 7 6" class="eagerlyicon  eagerlyicon-disc  program-card__info-date-disc" aria-hidden="true">
										<path fill="#EB6057" d="M.31 4.23V1.77L2.013 0h2.593L6.31 1.77v2.46L4.606 6H2.013L.31 4.23Z"></path>
									</svg> Zat 23 mrt 2024
								</time>
								<ul class="program-card__info-tags-list">
									<li class="program-card__info-tag">Pop</li>
									<li class="program-card__info-tag">Rock</li>
								</ul>
							</div>
							<!--  -->
							<div class="program-card__content program-card__hover-animation-wrapper--opacity">
								<p class="program-card__content-text">Lorem ipsum dolor sit amet
									consectetur adipisicing elit. Corrupti adipisci ut eos atque quo in
									omnis accusantium exercitationem commodi vero.</p>
							</div>
							<div class="program-card__btn-wrapper">
								<button class="btn btn--min-width program-card__btn program-card__btn--disabled">gratis</button>
							</div>
						</div>
					</li>
					<li class="program-card ">
						<div class="program-card__item  ">
							<div class="program-card__info">
								<div class="program-card__info-link">
									<h2 class="h4 program-card__info-title">Helemaal House #4</h2>
								</div>
								<!-- Format for atribute === <time datetime="YYYY-MM-DDThh:mm:ssTZD"> -->
								<time class="program-card__info-time" datetime="2017-02-14">
									<svg version="1.1" focusable="false" viewBox="0 0 7 6" class="eagerlyicon  eagerlyicon-disc  program-card__info-date-disc" aria-hidden="true">
										<path fill="#EB6057" d="M.31 4.23V1.77L2.013 0h2.593L6.31 1.77v2.46L4.606 6H2.013L.31 4.23Z"></path>
									</svg> Zo 24 mrt 2024
								</time>
								<ul class="program-card__info-tags-list">
									<li class="program-card__info-tag">House</li>
								</ul>
							</div>
							<div class="program-card__content program-card__hover-animation-wrapper--opacity">
								<p class="program-card__content-text">De vijfde editie van Helemaal House belooft een spectaculaire avond te worden met een waanzinnige lichtshow, een uitgebreid drankassortiment, top-DJ's en gegarandeerd goede vibes.</p>
							</div>
							<div class="program-card__btn-wrapper">
								<ul class="program-card__prices-list program-card__hover-animation-wrapper--opacity">
									<li class="program-card__prices-item">Deur: €5,00</li>
									<li class="program-card__prices-item">Online: €6,50</li>
									<li class="program-card__prices-item">Avondkassa: €8,00</li>
								</ul>
								<a href="https://otherticketlink.here" class="btn btn--min-width program-card__btn">tickets</a>
							</div>
						</div>
					</li>
				</ul>
			</section>
		</main>

<?php }