<?php /*  Template Name: Full Width*/ ?>
<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>

    <div class="container-fluid dmbs-content-wrapper">
      <?php include 'includes/content-blocks.php'; ?>
    </div>

<?php get_template_part('template-parts/nav','footer'); ?>

<?php get_footer(); ?>
