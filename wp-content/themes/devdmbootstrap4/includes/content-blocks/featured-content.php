<?php

if( have_rows('featured_content_column') ){
	$featured_content_columns = array();
  while ( have_rows('featured_content_column') ) : the_row();
		$column_img = get_sub_field('featured_content_image');
		$column['image']['url'] = $column_img['sizes']['medium'];
		$column['image']['alt'] = $column_img['alt'];
		$column['title'] = get_sub_field('featured_content_title');
		$column['subhead'] = get_sub_field('featured_content_subhead');
		$column['text'] = get_sub_field('featured_content_text');
		$column['link_text'] = get_sub_field('featured_content_link_text');
		$column['link_url'] = get_sub_field('featured_content_link_url');
		array_push($featured_content_columns, $column);
  endwhile;
}

?>

<div class="featured-content-block">
	<div class="container">

		<div class="row">
			<?php foreach ($featured_content_columns as $featured_key => $content): ?>
				<div class="col-12 col-md featured-content-column">
					<div class="col column-border">
						<?php if(isset($content['image']['url'])): ?>
							<div class="row">
								<div class="col column-image" style="background-image: url('<?php echo $content['image']['url']; ?>');"></div>
							</div>
						<?php endif; ?>
						<?php if(isset($content['title']) || isset($content['subhead']) || isset($content['text']) || isset($content['link_text'])): ?>
							<div class="row">
								<div class="col column-content">
									<?php if(isset($content['title'])): ?>
										<div class="row">
											<div class="col text-center column-title">
												<h4><?php echo $content['title']; ?></h4>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($content['subhead'])): ?>
										<div class="row">
											<div class="col text-center column-subhead">
												<h5><?php echo $content['subhead']; ?></h5>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($content['text'])): ?>
										<div class="row">
											<div class="col text-center column-text">
												<?php echo $content['text']; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($content['link_text']) && isset($content['link_url']['url'])): ?>
										<div class="row">
											<div class="col text-center column-link">
												<a <?php if(isset($content['link_url']['title'])): ?>title="<?php echo $content['link_url']['title']; ?>"<?php endif; ?> href="<?php echo $content['link_url']['url']; ?>" <?php if(isset($content['link_url']['target'])): ?>target="<?php echo $content['link_url']['target']; ?>"<?php endif; ?>><?php echo $content['link_text']; ?></a>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</div>
