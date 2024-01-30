<?php 
	$whatsapp_number = get_option('whatsapp_number');
	$whatsapp_status = get_option('whatsapp_status');
	$whatsapp_number_visible = get_option('whatsapp_number_visible');
	$text_help_center = get_option('text_help_center');

	$device_detection = (wp_is_mobile())?'mobile_and_tablet':'desktop';
    $devices_url = array(
        'mobile_and_tablet' => 'whatsapp://send',
        'desktop' => 'https://web.whatsapp.com/send',
    );
    $chat_args = array(
        'phone' =>  $whatsapp_number,
    );
    $chat_url = add_query_arg($chat_args, $devices_url[$device_detection]);
?>

<div class="mobile-content">
	<section class="container">
		<div class="top">
			<button class="close-menu" id="close-menu" onclick="menuMobile()" title="Fechar menu" name="Fechar menu">
				<span class="icon icon-close"></span>
			</button>
			<a class="logo" title="Mel Galhardo" href="<?php echo get_home_url(); ?>" rel="Home">Mel Galhardo</a>
		</div>
		<ul class="info">
			<li><a href="<?php echo get_home_url(); ?>/minha-conta">
				<span class="icon icon-user"></span>
				<div>
					<span class="big">

						<?php global $current_user; wp_get_current_user(); ?>
						<?php if ( is_user_logged_in() ) { 
							 echo 'Olá ' . $current_user->first_name .'';
							 }  else { 
							    echo 'Entre ou cadastre-se';
							} ?>
					</span>
					<span class="small">seus pedidos, favoritos...</span>
				</div>
			</a>
			</li>

			<li> <a href="<?php echo esc_attr($chat_url); ?>" rel="nofollow" aria-label="Botão WhatsApp">
				<span class="icon icon-whatsapp"></span>
				<div>
					<span class="big">WhatsApp: <?php echo esc_attr($whatsapp_number_visible); ?></span>
					<span class="small">Fale com nosso time pelo WhatsApp. <br /> 
					<?php echo esc_attr($text_help_center); ?></span>
				</div>
			</a>
			</li>
		</ul>

		<div class="menu-area">
			<div class="menu">
				<button class="title">Navegue</button>
				<nav class="hide-links">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'mobile-menu-collapse') ); ?>
				</nav>
			</div>

			<div class="menu">
				<button class="title">Serviços</button>
				<nav class="hide-links">
					<?php wp_nav_menu( array( 'theme_location' => 'services-menu', 'menu_class' => 'mobile-menu-collapse') ); ?>
				</nav>
			</div>

			<div class="menu">
				<button class="title">Semijoias</button>
				<nav class="hide-links">
					<?php wp_nav_menu( array( 'theme_location' => 'categories-menu', 'menu_class' => 'mobile-menu-collapse') ); ?>
				</nav>
			</div>
		</div>
	</section>
</div>