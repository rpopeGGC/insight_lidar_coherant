<?php

$left_col_img = array();
if(get_sub_field('cta_one_left_col_img')){
	$left_col_img_object = get_sub_field('cta_one_left_col_img');
	$left_col_img['url'] = $left_col_img_object['sizes']['large'];
	if(isset($left_col_img_object['alt'])){
		$left_col_img['alt'] = $left_col_img_object['alt'];
	}
	//print_r($left_col_img);
}

$bullet_list_items = array();
if( have_rows('cta_one_bullet_list') ){
  while ( have_rows('cta_one_bullet_list') ) : the_row();
		$bullet_list_items[] = get_sub_field('cta_one_bullet_list_item');
  endwhile;
  //print_r($bullet_list_items);
}

$right_col_img = array();
if(get_sub_field('cta_one_right_col_img')){
	$right_col_img_object = get_sub_field('cta_one_right_col_img');
	$right_col_img['url'] = $right_col_img_object['sizes']['large'];
	if(isset($right_col_img_object['alt'])){
		$right_col_img['alt'] = $right_col_img_object['alt'];
	}
	//print_r($right_col_img);
}

$button = array();
if(get_sub_field('cta_one_button_group')){
	$button = get_sub_field('cta_one_button_group');
	//print_r($button);
}

?>

<div class="cta-one-block">
	<div class="container">
		<div class="row">
			<?php if(isset($left_col_img['url'])): ?>
				<div class="col-sm-12 col-md-4 align-self-center text-center">
					<img <?php if(array_key_exists('alt', $left_col_img)): ?>alt="<?php echo $left_col_img['alt']; ?>"<?php endif; ?> src="<?php echo $left_col_img['url']; ?>" class="img-fluid left-col-img">
				</div>
			<?php endif; ?>
			<?php if(sizeof($bullet_list_items) > 0): ?>
				<div class="col-sm-12 col-md-4 align-self-center">
					<?php foreach ($bullet_list_items as $bullet_list_key => $item): ?>
						<div class="row check-list-item">
							<div class="col-2 check-mark text-right">
								<i class="fas fa-check"></i>
							</div>
							<div class="col-10 check-text">
								<?php echo $item; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if(isset($right_col_img['url']) || array_key_exists('cta_one_btn_txt', $button) || array_key_exists('cta_one_btn_lnk', $button)): ?>
				<div class="col-sm-12 col-md-4 align-self-center text-center">
					<?php if(isset($right_col_img['url'])): ?>
						<img <?php if(array_key_exists('alt', $right_col_img)): ?>alt="<?php echo $right_col_img['alt']; ?>"<?php endif; ?> src="<?php echo $right_col_img['url']; ?>" class="img-fluid">
					<?php endif; ?>
					<?php if(isset($button['cta_one_btn_txt']) && isset($button['cta_one_btn_lnk']['url'])): ?>
						<a href="<?php echo $button['cta_one_btn_lnk']['url']; ?>" <?php if(isset($button['cta_one_btn_lnk']['target'])): ?>target="<?php echo $button['cta_one_btn_lnk']['target']; ?>"<?php endif; ?> class="btn btn-block btn-lg btn-default"><?php echo $button['cta_one_btn_txt']; ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
