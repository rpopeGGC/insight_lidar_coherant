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
    if( get_row_layout() == 'two_col_img_txt' ){
    	include 'content-blocks/two-col-img-txt.php';
    }
    if( get_row_layout() == 'featured_content' ){
      include 'content-blocks/featured-content.php';
    }
    if( get_row_layout() == 'call_to_action_two' ){
      include 'content-blocks/cta-two.php';
    }
    if( get_row_layout() == 'video_grid' ){
      include 'content-blocks/video-grid.php';
    }
    if( get_row_layout() == 'contact_info' ){
      include 'content-blocks/contact-info.php';
    }
    if( get_row_layout() == 'new_product_grid' ){
      include 'content-blocks/new-product-grid.php';
    }
    if( get_row_layout() == 'item_list_block' ){
      include 'content-blocks/item-list-block.php';
    }
    if( get_row_layout() == 'infographic_block' ){
      include 'content-blocks/infographic-block.php';
    }

  endwhile;
}

?>
