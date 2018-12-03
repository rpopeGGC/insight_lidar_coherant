<?php


if(get_sub_field('two_col_img_txt_headline')){
	$headline = get_sub_field('two_col_img_txt_headline');
}

if(get_sub_field('two_col_img_txt_subheadline')){
	$sub_headline = get_sub_field('two_col_img_txt_subheadline');
}

if(get_sub_field('two_col_img_txt_left')){
	$left_col = get_sub_field('two_col_img_txt_left');
	$left_col_type = $left_col['two_col_img_txt_left_content_type'];
	if(isset($left_col['two_col_img_txt_left_text'])) {
		$left_col_txt = $left_col['two_col_img_txt_left_text'];
	}
	if(isset($left_col['two_col_img_txt_left_image']['sizes']['large'])) {
		$left_col_img_url = $left_col['two_col_img_txt_left_image']['sizes']['large'];
		$left_col_img_alt = $left_col['two_col_img_txt_left_image']['alt'];
	}
}

if(get_sub_field('two_col_img_txt_right')){
	$right_col = get_sub_field('two_col_img_txt_right');
	$right_col_type = $right_col['two_col_img_txt_right_content_type'];
	if(isset($right_col['two_col_img_txt_right_text'])) {
		$right_col_txt = $right_col['two_col_img_txt_right_text'];
	}
	if(isset($right_col['two_col_img_txt_right_image']['sizes']['large'])) {
		$right_col_img_url = $right_col['two_col_img_txt_right_image']['sizes']['large'];
		$right_col_img_alt = $right_col['two_col_img_txt_right_image']['alt'];
	}
}

?>

<div class="two-col-text-img-block">
	<div class="container">

		<?php if(isset($headline)): ?>
			<div class="row">
				<div class="col">
					<h2><?php echo $headline; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($sub_headline)): ?>
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
					<h4><?php echo $sub_headline; ?></h4>
				</div>
			</div>
		<?php endif; ?>

		<div>
		</div>

		<?php if(isset($left_col_txt) || isset($left_col_img_url) || isset($right_col_txt) || isset($right_col_img_url)): ?>
			<div class="row">
				<div class="col two-col-txt-img-content">
					<div class="row">
						<?php if(isset($left_col_txt) || isset($left_col_img_url)): ?>
							<div class="col-sm-12 col-md d-flex">
								<?php if(isset($left_col_txt) && $left_col_type === 'txt'): ?>
									<div class="row">
										<div class="col">
											<?php echo $left_col_txt; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($left_col_img_url) && $left_col_type === 'img'): ?>
									<div class="row">
										<div class="col">
											<img <?php if(isset($left_col_img_alt)): ?>alt="<?php echo $left_col_img_alt; ?>"<?php endif; ?> src="<?php echo $left_col_img_url; ?>" class="img-fluid">
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if(isset($right_col_txt) || isset($right_col_img_url)): ?>
							<div class="col-sm-12 col-md d-flex align-items-center justify-content-end">
								<?php if(isset($right_col_txt) && $right_col_type === 'txt'): ?>
									<div class="row">
										<div class="col">
											<?php echo $right_col_txt; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($right_col_img_url) && $right_col_type === 'img'): ?>
									<div class="row">
										<div class="col">
											<img <?php if(isset($right_col_img_alt)): ?>alt="<?php echo $left_col_img_alt; ?>"<?php endif; ?> src="<?php echo $right_col_img_url; ?>" class="img-fluid">
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
