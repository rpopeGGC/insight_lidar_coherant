<?php /*  Template Name: Full Width*/ ?>
<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>



    <div class="container-fluid dmbs-content-wrapper">
      <?php include 'includes/content-blocks.php'; ?>
    </div>

<script>
		// init controller
		var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 1000}});

		// build scenes
		new ScrollMagic.Scene({triggerElement: "#triggerblock1"})
						.setClassToggle("#block1", "expanded") // add class toggle
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#triggerblock2"})
						.setClassToggle("#block2", "expanded") // add class toggle
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#triggerblock3"})
						.setClassToggle("#block3", "expanded") // add class toggle
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#triggerblock4"})
						.setClassToggle("#block4", "expanded") // add class toggle
						.addTo(controller);
    new ScrollMagic.Scene({triggerElement: "#triggerblock5"})
						.setClassToggle("#block5", "expanded") // add class toggle
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#triggerblock6"})
						.setClassToggle("#block6", "expanded") // add class toggle
						.addTo(controller);
	</script>


<?php get_template_part('template-parts/nav','footer'); ?>

<?php get_footer(); ?>
