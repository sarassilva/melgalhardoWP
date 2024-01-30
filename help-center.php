<?php
	$whatsapp_number = get_option('whatsapp_number');
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

<div class="help-center">
	<section class="container">		
		<div class="top">
			<button class="close-help help-link" id="close-help" title="Fechar help center" name="Fechar help center">
				<span class="icon icon-close"></span>
			</button>
			<span><?php global $current_user; wp_get_current_user(); ?>
			<?php if ( is_user_logged_in() ) { 
				 echo 'Olá ' . $current_user->first_name .'!';
				 }  else { 
				    echo 'Oi!';
				} ?> Estamos aqui para te ajudar!</span>
		</div>

		<ul class="info">
			<li><a href="<?php echo get_home_url(); ?>/faq">
				<span class="icon icon-help"></span>
				<div>
					<span class="big">Perguntas frequentes</span>
					<span class="small">Devoluções, pagamentos, prazos e outros...</span>
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

			<li><a href="<?php echo get_home_url(); ?>/contato">
				<span class="icon icon-envelope"></span>
				<div>
					<span class="big">Mande um e-mail</span>
					<span class="small">Precisa de ajuda? Manda um e-mail pra gente.</span>
				</div>
			</a>
			</li>
		</ul>
	</section>
</div>