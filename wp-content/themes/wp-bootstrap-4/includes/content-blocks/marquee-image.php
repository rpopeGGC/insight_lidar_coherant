<?php

if(get_sub_field('marquee_image')){
	$marquee_image_object = get_sub_field('marquee_image');
	$marquee_image['url'] = $marquee_image_object['sizes']['marquee-large'];
	if(isset($marquee_image_object['alt'])){
		$marquee_image['alt'] = $marquee_image_object['alt'];
	}
}

?>

<?php if(isset($marquee_image['url'])): ?>
<div class="marquee-image-block">
	<div class="container-fluid">
		<div class="row">
			<div class="col px-0">

				<img <?php if(array_key_exists('alt', $marquee_image)): ?>alt="<?php echo $marquee_image['alt']; ?>"<?php endif; ?> src="<?php echo $marquee_image['url']; ?>" class="img-fluid">

			</div>
		</div>
	</div>
</div>
<?php endif; ?>
