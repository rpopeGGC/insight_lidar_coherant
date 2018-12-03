<?php

if(get_sub_field('new_product_grid_headline')){
	$headline = get_sub_field('new_product_grid_headline');
}

if(get_sub_field('new_product_grid_subhead')){
	$sub_headline = get_sub_field('new_product_grid_subhead');
}

$new_products = get_posts(array(
	'post_type' => 'products',
	'numberposts' => -1,
	'meta_query' => array(
		array(
			'key' => 'new_product', // name of custom field
			'value' => true, // matches exactly "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
		)
	)
));

foreach ($new_products as $product_key => $product) {
	$product_id = $product->ID;
	$product_fields = get_field_objects($product_id);
	$all_products_content = array();
	$series_product_fields = array();
	// Add ACF Fild data to product objects
	foreach ($product_fields as $product_field_key => $field) {
		// Seperate fields that are on all products from fields that are specific to a series
		if (in_array($product_field_key, array('model_number', '5_day_modifications', 'product_gallery', 'description', 'external_dimensions_group', 'internal_dimensions', 'weight', 'dimension_key', 'color', 'accessories', 'series', 'rohs_group', 'related_series_group'))) {
			if (in_array($product_field_key, array('model_number', '5_day_modifications', 'product_gallery', 'external_dimensions_group', 'internal_dimensions', 'weight'))) {
				if ($product_field_key === 'product_gallery') {
					$all_products_content[$product_field_key]['label'] = $field['label'];
					$all_products_content[$product_field_key]['name'] = $field['name'];
					$image_object = array();
					$image_object['ID'] = $field['value'][0]['ID'];
					$image_object['id'] = $field['value'][0]['id'];
					$image_object['title'] = $field['value'][0]['title'];
					$image_object['alt'] = $field['value'][0]['alt'];
					$image_object['description'] = $field['value'][0]['description'];
					$image_object['caption'] = $field['value'][0]['caption'];
					$image_object['url'] = $field['value'][0]['sizes']['product-image'];
					$all_products_content[$product_field_key]['value'] = $image_object;
				}
				else {
					// Add External & Internal dimensions to product object
					$all_products_content[$product_field_key]['label'] = $field['label'];
					$all_products_content[$product_field_key]['name'] = $field['name'];
					$all_products_content[$product_field_key]['value'] = $field['value'];
					if ($product_field_key === 'internal_dimensions') {
						$int_measurement_unit = '';
						if ($field['value']['unit_of_measurement'] === 'inches') {
							$int_measurement_unit = '"';
						}
						$int_dimensions_string = $field['value']['int__width'] . $int_measurement_unit . ' x ';
						$int_dimensions_string = $int_dimensions_string . $field['value']['int__height'] . $int_measurement_unit . ' x ';
						$int_dimensions_string = $int_dimensions_string . $field['value']['int__depth'] . $int_measurement_unit;
						$int_dimensions_value = $field['value']['int__width'];
						$int_dimensions_value = $int_dimensions_value . $field['value']['int__height'];
						$int_dimensions_value = $int_dimensions_value . $field['value']['int__depth'];
						$int_dimension_array['label'] = $int_dimensions_string;
						$int_dimensions_value =  str_replace(array('.'), '' , $int_dimensions_value);
						$int_dimension_array['value'] = $int_dimensions_value;
					}
					if ($product_field_key === 'external_dimensions_group'){
						$ext_measurement_unit = '';
						if ($field['value']['external_unit_of_measurement'] === 'inches') {
							$ext_measurement_unit = '"';
						}
						$ext_dimensions_string = $field['value']['ext_width'] . $ext_measurement_unit . ' x ';
						$ext_dimensions_string = $ext_dimensions_string . $field['value']['ext_height'] . $ext_measurement_unit . ' x ';
						$ext_dimensions_string = $ext_dimensions_string . $field['value']['ext_depth'] . $ext_measurement_unit;
						$ext_dimensions_value = $field['value']['ext_width'];
						$ext_dimensions_value = $ext_dimensions_value . $field['value']['ext_height'];
						$ext_dimensions_value = $ext_dimensions_value . $field['value']['ext_depth'];
						$ext_dimension_array['label'] = $ext_dimensions_string;
						$ext_dimensions_value =  str_replace(array('.'), '' , $ext_dimensions_value);
						$ext_dimension_array['value'] = $ext_dimensions_value;
					}
				}
			}
		}
		else {
			$series_product_fields[$product_field_key]['label'] = $field['label'];
			$series_product_fields[$product_field_key]['name'] = $field['name'];
			$series_product_fields[$product_field_key]['value'] = $field['value'];
		}
	}
	$new_products[$product_key]->all_products_content = $all_products_content;
	$new_products[$product_key]->series_product_fields = $series_product_fields;
}

//print_r($new_products);

?>

<div class="new-product-grid-block">
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

		<?php if(sizeof($new_products) > 0): ?>
			<div class="row">
				<div class="col new-product-grid">
					<div class="row">

						<?php foreach ($new_products as $product_item_key => $product): ?>
							<?php

								$product_url = get_post_permalink($product->ID);

								$is_mod = $product->all_products_content['5_day_modifications']['value'][0];

								$ext_dimensions_object = $product->all_products_content['external_dimensions_group'];
								$int_dimensions_object = $product->all_products_content['internal_dimensions'];

								$ext_measurement_unit = '';
								if ($ext_dimensions_object['value']['external_unit_of_measurement'] === 'inches') {
									$ext_measurement_unit = '"';
								}
								$ext_dimensions_string = $ext_dimensions_object['value']['ext_width'] . $ext_measurement_unit . ' x ';
								$ext_dimensions_string = $ext_dimensions_string . $ext_dimensions_object['value']['ext_height'] . $ext_measurement_unit . ' x ';
								$ext_dimensions_string = $ext_dimensions_string . $ext_dimensions_object['value']['ext_depth'] . $ext_measurement_unit;
								$ext_dimensions_value = $ext_dimensions_object['value']['ext_width'];
								$ext_dimensions_value = $ext_dimensions_value . $ext_dimensions_object['value']['ext_height'];
								$ext_dimensions_value = $ext_dimensions_value . $ext_dimensions_object['value']['ext_depth'];
								$ext_dimension_array['label'] = $ext_dimensions_string;
								$ext_dimensions_value =  str_replace(array('.'), '' , $ext_dimensions_value);
								$ext_dimension_array['value'] = $ext_dimensions_value;

								$int_measurement_unit = '';
								if ($int_dimensions_object['value']['unit_of_measurement'] === 'inches') {
									$int_measurement_unit = '"';
								}
								$int_dimensions_string = $int_dimensions_object['value']['int__width'] . $int_measurement_unit . ' x ';
								$int_dimensions_string = $int_dimensions_string . $int_dimensions_object['value']['int__height'] . $int_measurement_unit . ' x ';
								$int_dimensions_string = $int_dimensions_string . $int_dimensions_object['value']['int__depth'] . $int_measurement_unit;
								$int_dimensions_value = $int_dimensions_object['value']['int__width'];
								$int_dimensions_value = $int_dimensions_value . $int_dimensions_object['value']['int__height'];
								$int_dimensions_value = $int_dimensions_value . $int_dimensions_object['value']['int__depth'];
								$int_dimension_array['label'] = $int_dimensions_string;
								$int_dimensions_value =  str_replace(array('.'), '' , $int_dimensions_value);
								$int_dimension_array['value'] = $int_dimensions_value;
							?>
							<div class="col-md-4 new-product" data-jplist-item>
								<div class="product-item-wrapper">
									<?php if(isset($product->all_products_content['product_gallery']['value'])): ?>
										<div class="row">
											<div class="col product-image">
												<?php if (isset($is_mod)): ?>
													<img alt="5 Day Modifications" src="<?php echo get_template_directory_uri(); ?>/images/5-day-modification.png" class="five-day-mod-image" />
												<?php endif; ?>
												<?php if (isset($product_url)): ?><a href="<?php echo $product_url; ?>"><span class="sr-only">View Product Detials</span><?php endif; ?>
													<img <?php if(isset($product->all_products_content['product_gallery']['value']['alt'])): ?>alt="<?php echo $product->all_products_content['product_gallery']['value']['alt']; ?>"<?php endif; ?> src="<?php echo $product->all_products_content['product_gallery']['value']['url']; ?>" class="img-fluid w-100">
												<?php if (isset($product_url)): ?></a><?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if (isset($product->post_title)): ?>
										<h3 class="sr-only"><?php echo $product->post_title; ?></h3>
									<?php endif; ?>
									<?php if(isset($page_title)): ?>
										<div class="row">
											<div class="col product-series">
												<?php echo $page_title; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($product->all_products_content['model_number']['value'])): ?>
										<div class="row">
											<div class="col product-model-num">
												Model # <?php echo $product->all_products_content['model_number']['value']; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($ext_dimension_array['label']) || isset($ext_dimension_array['value'])): ?>
										<div class="row">
											<div class="col external-dimensions external_dimensions_group-<?php echo $ext_dimension_array['value']; ?>">
												<?php echo $ext_dimension_array['label']; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($int_dimension_array['label']) || isset($int_dimension_array['value'])): ?>
										<div class="row attribute-row">
											<div class="col internal_dimensions-<?php echo $int_dimension_array['value']; ?>">
												<div class="filter-value">
													<b>Internal Size:</b> <?php echo $int_dimension_array['label']; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<!-- <?php //foreach ($filters as $filter_object_key => $filter):?>
										<?php //$attribute = $product->series_product_fields[$filter_object_key]; ?>
										<?php //$attribute_value_key = array_keys($attribute['value'])[0]; ?>
										<?php //if(!in_array($filter_object_key, array('external_dimensions_group', 'internal_dimensions'))): ?>
											<?php //if(isset($attribute['label']) && isset($attribute['value'][$attribute_value_key]['label']) && isset($attribute['value'][$attribute_value_key]['value'])): ?>
												<div class="row attribute-row">
													<div class="col <?php //echo $filter_object_key; ?>-<?php //echo $attribute['value'][$attribute_value_key]['value']; ?>">
														<div class="filter-value">
															<b><?php //echo $attribute['label']; ?>:</b> <?php //echo $attribute['value'][$attribute_value_key]['label']; ?>
														</div>
													</div>
												</div>
											<?php //endif; ?>
										<?php //endif; ?>
									<?php //endforeach; ?> -->
									<?php if (isset($product_url)): ?>
										<div class="row">
											<div class="col view-product-details">
												<a href="<?php echo $product_url; ?>">View All Details</a>
											</div>
										</div>
									<?php endif; ?>
									<div class="row">
										<div class="col">
											<a href="#" class="btn btn-block btn-secondary">Check Stock</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
