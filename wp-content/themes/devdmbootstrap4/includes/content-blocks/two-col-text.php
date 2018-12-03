<?php

if(get_sub_field('two_col_txt_headline')){
	$headline = get_sub_field('one_col_txt_headline');
}

if(get_sub_field('two_col_txt_sub_head')){
	$sub_headline = get_sub_field('one_col_txt_sub_head');
}

if(get_sub_field('two_col_text_1')){
	$text1 = get_sub_field('two_col_text_1');
}

if(get_sub_field('two_col_text_2')){
	$text2 = get_sub_field('two_col_text_2');
}

?>

<div class="one-col-text-block">
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
				<div class="col">
					<h4><?php echo $sub_headline; ?></h4>
				</div>
			</div>
		<?php endif; ?>

		<div class="row text-col">
			<?php if(isset($text1)): ?>
					<div class="col-md-6">
						<?php echo $text1; ?>
				</div>
			<?php endif; ?>

			<?php if(isset($text2)): ?>
					<div class="col-md-6">
						<?php echo $text2; ?>
					</div>
			<?php endif; ?>
		</div>

	</div>
</div>
