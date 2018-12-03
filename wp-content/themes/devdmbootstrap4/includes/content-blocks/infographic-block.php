<?php
if(get_sub_field('infographic_block_color')){
	$block_color = get_sub_field('infographic_block_color');
}

if(get_sub_field('infographic_block_headline')){
	$headline = get_sub_field('infographic_block_headline');
}

if(get_sub_field('infographic_block_subhead')){
	$sub_headline = get_sub_field('infographic_block_subhead');
}

if(get_sub_field('infographic_text')){
	$infographic_text = get_sub_field('infographic_text');
}


?>

<div class="infographic_block">
	<div class="container">
		<div class="row">
			<?php if(isset($headline) ): ?>

					<div class="col-md-5">
						<div class="headline">
							<h2 style="color: <?php echo $block_color;?>"><?php echo $headline; ?></h2>
							<span class="divider" style="background: <?php echo $block_color;?>"></span>
							<h3 style="color: <?php echo $block_color;?>"><?php echo $sub_headline; ?></h3>
						</div>
					</div>
			<?php endif; ?>

			<?php if(isset($infographic_text)): ?>
					<div class="col-md-7">
						<?php echo $infographic_text; ?>
					</div>
			<?php endif; ?>
		</div>
	</div>
</div>
