<?php

if(get_sub_field('contact_info_headline')){
	$headline = get_sub_field('contact_info_headline');
}

if(get_sub_field('contact_info_subhead')){
	$sub_headline = get_sub_field('contact_info_subhead');
}

if( have_rows('contact_info_location') ){
	$locations = array();
  while ( have_rows('contact_info_location') ) : the_row();
		$location['name'] = get_sub_field('contact_info_name');
		$location['address_one'] = get_sub_field('contact_info_address_1');
		$location['address_two'] = get_sub_field('contact_info_address_2');
		$location['city'] = get_sub_field('contact_info_city');
		$location['state'] = get_sub_field('contact_info_state');
		$location['zip'] = get_sub_field('contact_info_zip_code');
		$location['phone'] = get_sub_field('contact_info_phone_number');
		$location['fax'] = get_sub_field('contact_info_fax_number');
		$location['email'] = get_sub_field('contact_info_email');
		array_push($locations, $location);
  endwhile;
}

?>

<div class="contact-info-block">
	<div class="container">

		<?php if(isset($headline)): ?>
			<div class="row">
				<div class="col contact-info-headline">
					<h2><?php echo $headline; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($sub_headline)): ?>
			<div class="row">
				<div class="col contact-info-subheadline">
					<h4><?php echo $sub_headline; ?></h4>
				</div>
			</div>
		<?php endif; ?>

		<?php if(sizeof($locations) > 0): ?>
			<div class="row">
				<div class="col">
					<div class="row">
						<?php foreach ($locations as $location_key => $location): ?>
							<div class="col">
								<div class="contact-info-container">
									<div class="row">
										<div class="col">
											<?php if(isset($location['name'])): ?>
												<div class="row">
													<div class="col">
														<b><h3><?php echo $location['name']; ?></h3></b>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php if(isset($location['address_one'])): ?>
												<div class="row">
													<div class="col">
														<?php echo $location['address_one']; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($location['address_two'])): ?>
												<div class="row">
													<div class="col">
														<?php echo $location['address_two']; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($location['city']) || isset($location['state']) || isset($location['zip'])): ?>
												<div class="row">
													<div class="col">
														<?php if(isset($location['city'])): ?><?php echo $location['city']; ?>,<?php endif; ?> <?php echo $location['state']; ?> <?php echo $location['zip']; ?>
													</div>
												</div>
											<?php endif; ?>
										</div>
										<div class="col">
											<?php if(isset($location['phone'])): ?>
												<div class="row">
													<div class="col">
														<b>Phone:</b> <?php echo $location['phone']; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($location['fax'])): ?>
												<div class="row">
													<div class="col">
														<b>Fax:</b> <?php echo $location['fax']; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($location['email'])): ?>
												<div class="row">
													<div class="col">
														<b>Email:</b> <a href="mailto:<?php echo $location['email']; ?>"><?php echo $location['email']; ?></a>
													</div>
												</div>
											<?php endif; ?>
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
