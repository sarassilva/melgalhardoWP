<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Initialize options
$whatsapp_number = get_option('whatsapp_number');
$whatsapp_status = get_option('whatsapp_status');
$whatsapp_number_visible = get_option('whatsapp_number_visible');
$text_help_center = get_option('text_help_center');
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <form method="post" action="options.php">
        <?php settings_fields('theme_fields'); ?>
        <h2>Botão WhatsApp</h2>
         <table class="form-table">
            <tr>
                <th scope="row"><?php echo esc_html__('Ativar botão', 'theme_fields'); ?> :</th>
                <td>
                    <input type="checkbox" name="whatsapp_status" id="whatsapp_status" value="1" <?php checked('1', esc_attr($whatsapp_status));?>>
                <td>
            </tr>
            <tr>
                <th scope="row"><?php echo esc_html__('Número WhatsApp', 'theme_fields'); ?> :</th>
                <td>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" placeholder="<?php echo esc_html__('11999998888', 'theme_fields'); ?>" dir="ltr" value="<?php echo esc_attr($whatsapp_number); ?>"/>
                    <p class="description"><?php echo esc_html__('Digite o número com DDD (sem espaço ou traço)', 'theme_fields'); ?></p>
                </td>
            </tr>
         </table>

        <h2>Help Center</h2>
        <table class="form-table">
            <tr>
                <th scope="row"><?php echo esc_html__('Número WhatsApp', 'theme_fields'); ?> :</th>
                <td>
                    <input type="text" name="whatsapp_number_visible" id="whatsapp_number_visible" placeholder="<?php echo esc_html__('(00) 0000-0000', 'theme_fields'); ?>" dir="ltr" value="<?php echo esc_attr($whatsapp_number_visible); ?>"/>
                    <p class="description"><?php echo esc_html__('Digite o número com DDD e separado', 'theme_fields'); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php echo esc_html__('Texto de atendimento', 'theme_fields'); ?> :</th>
                <td>
                    <input type="text" name="text_help_center" id="text_help_center" placeholder="<?php echo esc_html__('', 'theme_fields'); ?>" dir="ltr" value="<?php echo esc_attr($text_help_center); ?>"/>
                    <p class="description"><?php echo esc_html__('Ex: Atendimento de segunda à sexta, das 9h às 17h.', 'theme_fields'); ?></p>
                </td>
            </tr>
         </table>



         <?php submit_button(); ?>
    </form>
</div>