<?php 

// check if the flexible content field has rows of data
if(have_rows('content')){
	// loop through the rows of data
  while ( have_rows('content') ) : the_row();

      if( get_row_layout() == 'marquee_rotator' ){
      	include 'content-blocks/marquee-rotator.php';
      }
      if( get_row_layout() == 'marquee_image' ){
      	include 'content-blocks/marquee-image.php';
      }
      if( get_row_layout() == 'call_to_action_one' ){
      	include 'content-blocks/cta-one.php';
      }
      if( get_row_layout() == 'one_col_text' ){
      	include 'content-blocks/one-col-text.php';
      }
      if( get_row_layout() == 'series_carousel' ){
      	include 'content-blocks/series-carousel.php';
      }

  endwhile;
}

?>