<?php

if(get_sub_field('marquee_image')){
	$marquee_image_object = get_sub_field('marquee_image');

	$marquee_image['url'] = $marquee_image_object['url'];
	if(isset($marquee_image_object['alt'])){
		$marquee_image['alt'] = $marquee_image_object['alt'];
	}
}


	if( get_sub_field('marquee_height') ) {
		$marquee_height = get_sub_field('marquee_height');
	}else{
		$marquee_height = 900;
	}

	$marquee_res_height_t = $marquee_height * 0.95;
	$marquee_res_height_m = $marquee_height * 0.5;
	$id = rand(1000, 9999);

?>
<style>
@media only screen and (max-width: 991px) {
	.marquee-image{
		height: <?php echo $marquee_res_height_t; ?>px !important;
		background-size: cover;
	}
}

@media only screen and (max-width: 759px) {
	.marquee-image{
		height: <?php echo $marquee_res_height_m; ?>px !important;
	}
}

.marquee-image-<?php echo $id; ?>{
	height: <?php echo $marquee_height; ?>px;
	background-image: url('<?php echo $marquee_image['url']; ?>');
}


</style>
<?php if(isset($marquee_image['url'])): ?>
	<div class="marquee-image marquee-image-<?php echo $id; ?>">
			<div class="overlay"><?php echo get_sub_field( 'text_overlay' ); ?></div>
	</div>
</div>
<?php endif; ?>
