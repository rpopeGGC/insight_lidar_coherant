<?php

if(get_sub_field('cta_two_bg_color')){
	$bg_color = get_sub_field('cta_two_bg_color');
	//rint_r($bg_color);
}

if(get_sub_field('cta_two_title')){
	$title = get_sub_field('cta_two_title');
	//print_r($title);
}

if(get_sub_field('cta_two_subhead')){
	$subhead = get_sub_field('cta_two_subhead');
	//print_r($subhead);
}

if(get_sub_field('cta_two_text')){
	$text = get_sub_field('cta_two_text');
	//print_r($text);
}

if(get_sub_field('cta_two_btn_txt')){
	$btn_txt = get_sub_field('cta_two_btn_txt');
	//print_r($btn_txt);
}

if(get_sub_field('cta_two_btn_lnk')){
	$btn_lnk = get_sub_field('cta_two_btn_lnk');
	//print_r($btn_lnk);
}

?>

<div class="cta-two-block<?php if(isset($bg_color)): ?><?php if($bg_color === 'blue'): ?> blue<?php endif; ?><?php endif; ?>">
	<div class="container">

		<?php if(isset($title) || isset($subhead) || isset($text) || isset($btn_txt)): ?>
			<div class="row">
				<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
					<?php if(isset($title)): ?>
						<div class="row">
							<div class="col text-center">
								<h2><?php echo $title; ?></h2>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($subhead)): ?>
						<div class="row">
							<div class="col text-center">
								<h4><?php echo $subhead; ?></h4>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($text)): ?>
						<div class="row">
							<div class="col text-center">
								<?php echo $text; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($btn_txt) && isset($btn_lnk['url'])): ?>
						<div class="row">
							<div class="col text-center">
								<a <?php if(isset($btn_lnk['title'])): ?>title="<?php echo $btn_lnk['title']; ?>"<?php endif; ?> href="<?php echo $btn_lnk['url']; ?>" <?php if(isset($btn_lnk['target'])): ?>title="<?php echo $btn_lnk['target']; ?>"<?php endif; ?> class="btn btn-lg btn-secondary"><?php echo $btn_txt; ?></a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
