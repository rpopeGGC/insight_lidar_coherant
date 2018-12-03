<?php

if(get_sub_field('one_col_txt_headline')){
	$headline = get_sub_field('one_col_txt_headline');
}

if(get_sub_field('one_col_txt_sub_head')){
	$sub_headline = get_sub_field('one_col_txt_sub_head');
}

if(get_sub_field('one_col_txt_text')){
	$text = get_sub_field('one_col_txt_text');
}

?>

<div class="one-col-text-block">
	<div class="container">

		<?php if(isset($headline)): ?>
			<div class="row text-col">
				<div class="col">
					<h2><?php echo $headline; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($sub_headline)): ?>
			<div class="row">
				<div class="col">
					<h4><?php echo $sub_headline; ?></h4>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($text)): ?>
			<div class="row">
				<div class="col">
					<?php echo $text; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
