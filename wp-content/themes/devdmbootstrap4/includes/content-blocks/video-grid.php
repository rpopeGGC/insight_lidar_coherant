<?php

if(get_sub_field('video_grid_headline')){
	$headline = get_sub_field('video_grid_headline');
}

if(get_sub_field('video_grid_subhead')){
	$sub_headline = get_sub_field('video_grid_subhead');
}

$query_num = -1;
if(get_sub_field('video_grid_number')){
	$number = get_sub_field('video_grid_number');
	if($number === 'all'){
		$query_num = -1;
	}
	elseif ($number === 'most_recent') {
		$query_num = 4;
	}
}

$videos = array();
$video_objects = get_posts(array(
	'post_type' => 'video',
	'numberposts' => $query_num,
));

foreach ($video_objects as $video_object_key => $video_object) {
	$video_object_id = $video_object->ID;
	$video['title'] = $video_object->post_title;
	$video['code'] = get_field('video_youtube_code', $video_object_id);
	array_push($videos, $video);
}

?>

<div class="video-grid-block">
	<div class="container">

		<?php if(isset($headline)): ?>
			<div class="row">
				<div class="col video-headline">
					<h2><?php echo $headline; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($sub_headline)): ?>
			<div class="row">
				<div class="col video-subhead">
					<h4><?php echo $sub_headline; ?></h4>
				</div>
			</div>
		<?php endif; ?>

		<?php if(sizeof($videos) > 0): ?>
			<div class="row">
				<div class="col">

					<?php foreach ($videos as $video_key => $video): ?>
						<?php //print_r($video_key); ?>
						<?php if($video_key === 0): ?><div class="row"><?php endif; ?>
						<?php if($video_key !== 0 && $video_key % 2 === 0 ): ?></div><?php endif; ?>
						<?php if($video_key !== 0 && $video_key % 2 === 0 ): ?><div class="row"><?php endif; ?>
						<div class="col-md-6 video">
							<div class="row">
								<div class="col">
									<h5><?php echo $video['title']; ?></h5>
								</div>
							</div>
							<?php if(isset($video['code'])): ?>
								<div class="row">
									<div class="col">
										<div class="video-wrapper">
											<iframe title="<?php echo $video['title']; ?> YouTube Video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video['code']; ?>?autoplay=0&modestbranding=1&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
						<?php if($video_key === sizeof($videos)): ?></div><?php endif; ?>
					<?php endforeach; ?>

				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
