<?php
if( have_rows('rotator_slide') ){

	$rotator_slides = array();

	// loop through the rows of data
  while ( have_rows('rotator_slide') ) : the_row();
		// display a sub field value
		$slide['headline'] = get_sub_field('rotator_slide_headline');
		$slide['subheadline'] = get_sub_field('rotator_slide_sub_headline');
		$slide['text'] = get_sub_field('rotator_slide_text');
		$slide['cta'] = get_sub_field('rotator_slide_cta');
		$slide['bgimg'] = get_sub_field('rotator_slide_bg_img');

		array_push($rotator_slides, $slide);
  endwhile;

  //print_r($rotator_slides);

}

?>

<div class="marquee-rotator-block">
<div class="container-fluid">
	<div class="row">
		<div class="col">

			<div id="marquee-rotator" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php foreach ($rotator_slides as $slide_key => $slide): ?>
			  		<div class="carousel-item<?php if($slide_key === 0): ?> active<?php endif; ?>">
			  			<div class="row" <?php if(sizeof($slide['bgimg']) > 0): ?>style="background-image: url('<?php echo $slide['bgimg']['sizes']['marquee-large']; ?>');"<?php endif; ?>>
			  				<div class="col d-flex rotator-slide-content-wrapper">
			  					<div class="align-self-center">
			  					<div class="row">
			  						<div class="col">
					  					<?php if(isset($slide['headline'])): ?>
						  					<div class="row">
						  						<div class="col text-center">
						  							<h2><?php echo $slide['headline']; ?></h2>
						  						</div>
						  					</div>
						  				<?php endif; ?>
					  					<?php if(isset($slide['subheadline'])): ?>
						  					<div class="row">
						  						<div class="col text-center">
						  							<h4><?php echo $slide['subheadline']; ?></h4>
						  						</div>
						  					</div>
						  				<?php endif; ?>
						  				<?php if(isset($slide['text'])): ?>
						  					<div class="row">
						  						<div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
						  							<?php echo $slide['text']; ?>
						  						</div>
						  					</div>
						  				<?php endif; ?>
						  				<?php if(isset($slide['cta']['rotator_slide_btn_txt']) && isset($slide['cta']['rotator_slide_btn_lnk'])): ?>
						  					<div class="row">
						  						<div class="col text-center">
						  							<a href="<?php echo $slide['cta']['rotator_slide_btn_lnk']['url']; ?>" <?php if(isset($slide['cta']['rotator_slide_btn_lnk']['title'])): ?>title="<?php echo $slide['cta']['rotator_slide_btn_lnk']['title']; ?>"<?php endif; ?> <?php if(isset($slide['cta']['rotator_slide_btn_lnk']['target'])): ?>target="<?php echo $slide['cta']['rotator_slide_btn_lnk']['target']; ?>"<?php endif; ?> class="btn btn-lg btn-primary"><?php echo $slide['cta']['rotator_slide_btn_txt']; ?></a>
						  						</div>
						  					</div>
						  				<?php endif; ?>
						  			</div>
						  		</div>
						  		</div>
			  				</div>
			  			</div>
				    </div>
			  	<?php endforeach; ?>
			  	<ol class="carousel-indicators">
			  		<?php foreach ($rotator_slides as $slide_key => $slide): ?>
			  			<li data-target="#marquee-rotator" data-slide-to="<?php echo $slide_key ?>" <?php if($slide_key === 0): ?>class="active"<?php endif; ?>></li>
			  		<?php endforeach; ?>
				  </ol>
				  <a class="carousel-control-prev" href="#marquee-rotator" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#marquee-rotator" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			  </div>
			</div>

		</div>
	</div>
</div>
</div>
