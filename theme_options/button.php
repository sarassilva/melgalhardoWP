<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function show_button() {
    $post_id = get_the_ID();
    $whatsapp_status = get_option('whatsapp_status');
    if ($whatsapp_status === 1){
        // Initialize options
        $whatsapp_number = get_option('whatsapp_number');

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
        <style>
            #wpp-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: #3ac746;
                border-radius: 100%;
                width: 60px;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                -webkit-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
            }

            #wpp-button:hover {
                box-shadow: 0 2px 8px 2px rgba(0, 0, 0, .15);
                -webkit-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
            }

            #wpp-icon {
                width: 35px;
                height: 35px;
                display: block;
                background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjU2IiB3aWR0aD0iMjU2IiB2aWV3Qm94PSItMjMgLTIxIDY4MiA2ODIuNjY3IiBmaWxsPSIjZmZmIiB4bWxuczp2PSJodHRwczovL3ZlY3RhLmlvL25hbm8iPjxwYXRoIGQ9Ik01NDQuMzg3IDkzLjAwOEM0ODQuNTEyIDMzLjA2MyA0MDQuODgzLjAzNSAzMjAuMDUxIDAgMTQ1LjI0NiAwIDIuOTggMTQyLjI2MiAyLjkxIDMxNy4xMTNjLS4wMjMgNTUuODk1IDE0LjU3OCAxMTAuNDU3IDQyLjMzMiAxNTguNTUxTC4yNSA2NDBsMTY4LjEyMS00NC4xMDJjNDYuMzI0IDI1LjI3IDk4LjQ3NyAzOC41ODYgMTUxLjU1MSAzOC42MDJoLjEzM2MxNzQuNzg1IDAgMzE3LjA2Ni0xNDIuMjczIDMxNy4xMzMtMzE3LjEzMy4wMzUtODQuNzQyLTMyLjkyMi0xNjQuNDE4LTkyLjgwMS0yMjQuMzU5ek0zMjAuMDUxIDU4MC45NDFoLS4xMDljLTQ3LjI5Ny0uMDItOTMuNjg0LTEyLjczLTEzNC4xNi0zNi43NDJsLTkuNjIxLTUuNzE1LTk5Ljc2NiAyNi4xNzIgMjYuNjI5LTk3LjI3LTYuMjctOS45NzNjLTI2LjM4Ny00MS45NjktNDAuMzItOTAuNDc3LTQwLjI5Ny0xNDAuMjgxLjA1NS0xNDUuMzMyIDExOC4zMDUtMjYzLjU3IDI2My42OTktMjYzLjU3IDcwLjQwNi4wMjMgMTM2LjU5IDI3LjQ3NyAxODYuMzU1IDc3LjMwMXM3Ny4xNTYgMTE2LjA1MSA3Ny4xMzMgMTg2LjQ4NGMtLjA2MiAxNDUuMzQ0LTExOC4zMDUgMjYzLjU5NC0yNjMuNTk0IDI2My41OTR6bTE0NC41ODYtMTk3LjQxOGMtNy45MjItMy45NjktNDYuODgzLTIzLjEzMy01NC4xNDgtMjUuNzgxLTcuMjU4LTIuNjQ1LTEyLjU0Ny0zLjk2MS0xNy44MjQgMy45NjktNS4yODUgNy45My0yMC40NjkgMjUuNzgxLTI1LjA5NCAzMS4wNjZzLTkuMjQyIDUuOTUzLTE3LjE2OCAxLjk4NC0zMy40NTctMTIuMzM2LTYzLjcyNy0zOS4zMzJjLTIzLjU1NS0yMS4wMTItMzkuNDU3LTQ2Ljk2MS00NC4wODItNTQuODkxLTQuNjE3LTcuOTM3LS4wMzktMTEuODEyIDMuNDc3LTE2LjE3MiA4LjU3OC0xMC42NTIgMTcuMTY4LTIxLjgyIDE5LjgwOS0yNy4xMDVzMS4zMi05LjkxOC0uNjY0LTEzLjg4M2MtMS45NzctMy45NjUtMTcuODI0LTQyLjk2OS0yNC40MjYtNTguODQtNi40MzctMTUuNDQ1LTEyLjk2NS0xMy4zNTktMTcuODMyLTEzLjYwMi00LjYxNy0uMjMtOS45MDItLjI3Ny0xNS4xODctLjI3N3MtMTMuODY3IDEuOTgtMjEuMTMzIDkuOTE4LTI3LjczIDI3LjEwMi0yNy43MyA2Ni4xMDUgMjguMzk1IDc2LjY4NCAzMi4zNTUgODEuOTczIDU1Ljg3OSA4NS4zMjggMTM1LjM2NyAxMTkuNjQ4YzE4LjkwNiA4LjE3MiAzMy42NjQgMTMuMDQzIDQ1LjE3NiAxNi42OTUgMTguOTg0IDYuMDMxIDM2LjI1NCA1LjE4IDQ5LjkxIDMuMTQxIDE1LjIyNy0yLjI3NyA0Ni44NzktMTkuMTcyIDUzLjQ4OC0zNy42OCA2LjYwMi0xOC41MTIgNi42MDItMzQuMzc1IDQuNjE3LTM3LjY4NC0xLjk3Ny0zLjMwNS03LjI2Mi01LjI4NS0xNS4xODQtOS4yNTR6bTAgMCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+") center/35px 35px no-repeat;
            }
        </style>

        <div id="wpp-button">
            <a id="wpp-icon" href="<?php echo esc_attr($chat_url); ?>" rel="nofollow" aria-label="Botão WhatsApp"></a>
        </div>
        <?php
    }
}


add_action('wp_footer', 'show_button');