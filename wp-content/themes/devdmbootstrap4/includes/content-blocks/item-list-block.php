
<div class="container">
			<?php $title = get_sub_field( 'item_list_block_headline' ); ?>
			<?php $subhead = get_sub_field( 'item_list_block_subhead' ); ?>
			<?php print_r(); ?>

			<?php if(isset($title)): ?>
				<div class="row">
					<div class="col-md-12">
						<h2><?php echo $title; ?></h2>
					</div>
				</div>
			<?php endif; ?>
			<?php if(isset($subhead)): ?>
				<div class="row">
					<div class="col-md-12">
						<h4><?php echo $subhead; ?></h4>
					</div>
				</div>
			<?php endif; ?>


			<?php if ( have_rows( 'item_list_column' ) ) : ?>
				<div class="row">
				<?php while ( have_rows( 'item_list_column' ) ) : the_row(); ?>
					<?php $bullet = get_sub_field( 'bullet_style' ); ?>
					<?php if ( have_rows( 'item_bullet' ) ) : ?>
						<div class="col">
							<ul>
						<?php while ( have_rows( 'item_bullet' ) ) : the_row(); ?>
							<li class="<?php echo $bullet;?>"><?php the_sub_field( 'bullet' ); ?></li>
						<?php endwhile; ?>
					</div>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
				</ul>
			</div>
			<?php endif; ?>
</div>
