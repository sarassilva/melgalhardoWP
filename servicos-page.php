<?php 
/* Template Name: Serviços */ 
?>

<?php acf_form_head(); get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="page-content">
			<div class="main-image">
				<h1><?php the_title(); ?></h1>	
				<?php  if ( has_post_thumbnail() ) {
				    the_post_thumbnail();
				} ?>
			</div>
			
			<div class="call">
			    <div class="container">	
			    <h2><?php the_field('titulo') ?></h2>
			    <?php the_field('texto') ?>
			    </div>
			</div>

			<div class="container milpx">				
				<?php the_content(); ?>
			</div>
			


			<section class="regular slider">
    <div>
      <img src="http://placehold.it/350x300?text=1">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=6">
    </div>
  </section>
			
			<div class="instagram">
				<section class="container">
					<?php echo do_shortcode(get_field('instagram')); ?>
				</section>
			</div>
		</section>
	<?php endwhile; endif; ?>

	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<script async src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
<script type="text/javascript">
    $(document).on('ready', function() {     
      $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });      
    });
</script>

<?php get_footer(); ?>

