<?php

if(get_sub_field('series_carousel_headline')){
	$series_carousel_headline = get_sub_field('series_carousel_headline');
}
if(get_sub_field('series_carousel_subhead')){
	$series_carousel_subheadline = get_sub_field('series_carousel_subhead');
}
$carousel = array();
if(get_sub_field('series_carousel_series_carousel')){
	$series_objs = get_sub_field('series_carousel_series_carousel');
	foreach ($series_objs as $series_obj_key => $series_obj) {
		$series_obj = reset($series_obj);
		$series_obj_id = $series_obj->ID;
		$series_name = $series_obj->post_title;
		$series_url = get_permalink($series_obj_id);
		$series_image = get_field('series_image', $series_obj_id);
		$series_values['ID'] = $series_obj_id;
		$series_values['name'] = $series_name;
		$series_values['url'] = $series_url;
		$series_values['image']['url'] = $series_image['sizes']['medium'];
		if(isset($series_image['alt'])){
			$series_values['image']['alt'] = $series_image['alt'];
		}
		array_push($carousel, $series_values);
	}
	//print_r($carousel);
}

?>


<div class="series-carousel-block">
	<div class="container">
		<?php if(isset($series_carousel_headline)): ?>
			<div class="row">
				<div class="col text-center">
					<h2><?php echo $series_carousel_headline; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<?php if(isset($series_carousel_subheadline)): ?>
			<div class="row">
				<div class="col text-center">
					<h4><?php echo $series_carousel_subheadline; ?></h4>
				</div>
			</div>
		<?php endif; ?>
		<?php if(sizeof($carousel)): ?>
			<div class="row">
				<div class="col series-carousel-container">
					<div class="owl-carousel">
						<?php foreach ($carousel as $series_carousel_key => $series): ?>
							<div class="series-carousel-item">
								<div class="col">
									<div class="row">
										<div class="col series-carousel-img-container" style="background-image: url('<?php if(isset($series['image']['url'])): ?><?php echo $series['image']['url']; ?><?php else:; ?><?php echo get_template_directory_uri(); ?>/images/bud-industries-logo-default.png<?php endif; ?>');">
											<?php if(isset($series['url'])): ?><a href="<?php echo $series['url']; ?>"></a><?php endif; ?>
										</div>
									</div>
									<?php if(isset($series['name'])): ?>
										<div class="row">
											<div class="col text-center series-carousel-name">
												<h4><?php if(isset($series['url'])): ?><a href="<?php echo $series['url']; ?>"><?php endif; ?><?php echo $series['name']; ?><?php if(isset($series['url'])): ?></a><?php endif; ?></h4>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<script>
	(function($) {
		$(document).ready(function(){
		  $(".owl-carousel").owlCarousel({
		  	nav: true,
	    	loop: true,
	    	mouseDrag: true,
	    	touchDrag: true,
	    	lazyLoad: true,
	    	lazyLoadEager: true,
	    	autoplay: false,
	    	margin: 30,
	    	responsive: {
	    		0: {
	    			items: 1,
	    		},
	    		768: {
	    			items: 2,
	    		},
	    		992: {
	    			items: 3,
	    		},
	    	}
		  });
		});
	}(jQuery));
</script>