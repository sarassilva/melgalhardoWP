</main>
<?php wp_footer(); ?>

<footer>
	<div class="vip">
		<section class="container">
			<?php if(is_active_sidebar('wdg1')){ dynamic_sidebar('wdg1'); } ?>
		</section>
	</div>

	<div class="footer">
		<section class="container">
			<div class="site__footer">
				<?php if(is_active_sidebar('wdg2')){ dynamic_sidebar('wdg2'); } ?>
			</div>
			<div class="shop__footer">
				<?php if(is_active_sidebar('wdg3')){ dynamic_sidebar('wdg3'); } ?>
			</div>

			<div class="copyright">
				<span>(C) 2023  BY MEL GALHARDO | CNPJ 23.729.666-0001-80. TODOS OS DIREITOS RESERVADOS.</span>
				<span>Move Agency.</span>
			</div>
		</section>
	</div>
</footer>

<?php include 'mobile-menu.php'; ?>
<?php include 'help-center.php'; ?>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
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
            breakpoint: 800,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });      
    });
</script>

<script async src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
<script async src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:wght@400;500&display=swap" rel="stylesheet">

</body>
</html>