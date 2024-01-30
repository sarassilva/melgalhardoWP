<?php
// register menu
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'categories-menu' => __( 'Categorias' ),
      'services-menu' => __( 'Serviços' ),
      'semijoias-menu' => __( 'Semijoias' ),
     )
   );
 }

//remove itens
add_action( 'admin_menu', 'remove_itens' );
function remove_itens() {
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('tools.php');
}

//theme options
include 'theme_options/theme-options.php';

// overrider wc
function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// widgets
register_sidebar( array(
    'name' => 'Lista vip',
    'id' => 'wdg1',
    'description' => 'Widgets do rodapé',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

register_sidebar( array(
    'name' => 'Footer institucional',
    'id' => 'wdg2',
    'description' => 'Widgets do rodapé',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

register_sidebar( array(
    'name' => 'Footer e-commerce',
    'id' => 'wdg3',
    'description' => 'Widgets do rodapé',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

register_sidebar( array(
    'name' => 'Barra de vantagens - Cabeçalho',
    'id' => 'wdg4',
    'description' => 'Widgets da barra de vantagens',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

register_sidebar( array(
    'name' => 'Barra de vantagens - Corpo',
    'id' => 'wdg5',
    'description' => 'Widgets da barra de vantagens',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

register_sidebar( array(
    'name' => 'Filtros',
    'id' => 'wdg6',
    'description' => 'Widgets da barra de vantagens',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="wdgt_titulo">',
    'after_title' => '</div>',
) );

//my account page
add_filter( 'woocommerce_account_menu_items', 'QuadLayers_remove_acc_tab', 999 );
function QuadLayers_remove_acc_tab( $items ) {
  unset($items['dashboard']);
  return $items;
}

add_filter( 'woocommerce_account_menu_items', 'QuadLayers_rename_acc_adress_tab', 9999 );
function QuadLayers_rename_acc_adress_tab( $items ) {
  $items['edit-address'] = 'Meus endereços';
  return $items;
}

add_action( 'init', 'password_add_endpoint' );
function password_add_endpoint() {
    add_rewrite_endpoint( 'alterar-senha', EP_ROOT | EP_PAGES );
} 

add_filter( 'query_vars', 'password_add_query_vars', 5 );
function password_add_query_vars( $vars ) {
    $vars[] = 'alterar-senha';
    return $vars;
}
  
add_filter( 'woocommerce_account_menu_items', 'password_add_link_my_account' );
function password_add_link_my_account( $items ) {
    $items['alterar-senha'] = 'Alterar senha';
    return $items;
}

add_filter("woocommerce_get_query_vars", function ($vars) {
    foreach (["alterar-senha"] as $e) {
        $vars[$e] = $e;
    }
    return $vars;
});

add_action( 'woocommerce_account_alterar-senha_endpoint', 'password_add_support_content' ); 
function password_add_support_content() {
  include 'woocommerce/myaccount/form-edit-password.php';
}

// Rename My account > Orders "view" action button text
add_filter( 'woocommerce_my_account_my_orders_actions', 'change_my_account_my_orders_view_text_button', 10, 2 );
function change_my_account_my_orders_view_text_button( $actions, $order ) {
    $actions['view']['name'] = __( 'Ver detalhes', 'woocommerce' );
    return $actions;
}

//thank u page
add_filter( 'the_title', 'woo_title_order_received', 10, 2 );
function woo_title_order_received( $title, $id ) {
  if ( function_exists( 'is_order_received_page' ) && 
       is_order_received_page() && get_the_ID() === $id ) {
    $title = "Obrigada por Escolher a by Mel Galhardo semijoias! ✨";
  }
  return $title;
}

add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
    echo '<h2>'.esc_html( $order->get_billing_first_name() ).' sua compra foi realizada com sucesso! </h2>';
    echo '<p>Cada semijoia que você escolheu passou pela curadoria exclusiva da Mel Galhardo, garantindo peças atemporais e especiais para você.</p>';
    echo '<p>Você vai receber em seu email todas as informações sobre o seu pedido e se precisar de assistência ou tiver dúvidas, estamos aqui para ajudar.</p>';
    echo '<p>Siga-nos nas redes sociais e fique por dentro das novidades!</p>';
    echo '<p>Um abraço carinhoso, <br />Equipe Mel Galhardo</p>';
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Eu quero', 'woocommerce' );
}

add_filter( 'woocommerce_product_add_to_cart_text', 'create_button_product_list' );  
function create_button_product_list( $text ) {
   global $product;
   $id = $product->get_id();

   if ( ! $product->is_in_stock() ) {           
       echo '<button type="submit" data-security="f8907c6a14" data-variation_id="" data-product_id="' .  $id  . '" class="cwg_popup_submit ">Avise-me Quando Chegar :)</button>';
   }
   return $text;
}

// redirect after logout
function skip_logout_confirmation() {
    global $wp;
    if ( isset( $wp->query_vars['customer-logout'] ) ) {
        wp_redirect( str_replace( '&amp;', '&', wp_logout_url( home_url() ) ) );
        exit;
      }
    }
add_action( 'template_redirect', 'skip_logout_confirmation' );

//hide button out of stock
add_filter( 'woocommerce_loop_add_to_cart_link', 'ace_remove_out_of_stock_product_button', 10, 3 );
function ace_remove_out_of_stock_product_button( $html, $product, $args ) {
    if ( ! $product->is_in_stock() && ! $product->backorders_allowed() ) {
        return '';
    }
    return $html;
}

//remove produt data tabs
add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}

//change price positions
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_before_add_to_cart_button', 'misha_before_add_to_cart_btn' );
function misha_before_add_to_cart_btn(){
  global $product;
  echo '<div class="price">'.$product->get_price_html().'</div>';
}

// sku
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );
add_filter('gettext', 'change_sku', 999, 3);

function change_sku( $translated_text, $text, $domain ) {
  if( $text == 'SKU' || $text == 'SKU:' ) return 'REF:';
  return $translated_text;
}

//rename related title
remove_action( 'woocommerce_product_related_products_heading','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_product_related_products_heading', 'abChangeProductsTitle', 10 );

function abChangeProductsTitle() {
    echo '<h3>Veja também</h3>';
}

// refresh cart
add_action( 'wp_footer', 'ecommercehints_update_cart_on_quantity_change');
function ecommercehints_update_cart_on_quantity_change() { ?>
    <script>
    jQuery( function( $ ) {
        let timeout;
        $('.woocommerce').on('change', 'input.qty', function(){
            if ( timeout !== undefined ) {
                clearTimeout( timeout );
            }
            timeout = setTimeout(function() {
                $("[name='update_cart']").trigger("click");
            }, 500 ); // 500 being MS (half a second)
        });
    } );
    </script>
<?php }



//separate variation and title on cart
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

//breadcrumbs
function tsh_wp_custom_breadcrumbs() {
    $separator              = '/';
    $breadcrumbs_id         = 'breadcrumbs';
    $breadcrumbs_class      = 'breadcrumbs';
    $home_title             = esc_html__('Home', 'your-domain');

    // Add here you custom post taxonomies
    $tsh_custom_taxonomy    = 'product_cat';

    global $post,$wp_query;
       
    // Hide from front page
    if ( !is_front_page() ) {
       
        echo '<ul id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';
           
        // Home
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // For Custom post type
            $post_type = get_post_type();
              
            // Custom post type name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            $post_type = get_post_type();

            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Last category post is in
                $last_category = $category[count($category) - 1];
                  
                // Parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }

            $taxonomy_exists = taxonomy_exists($tsh_custom_taxonomy);
            if(empty($last_category) && !empty($tsh_custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $tsh_custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $tsh_custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // If the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // Get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents order
                $anc = array_reverse($anc);
                   
                // Parent pages
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Render parent pages
                echo $parents;
                   
                // Active page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display active page if not parents pages
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) { // Tag page
               
            // Tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Return tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) { // Day archive page
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) { // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) { // Display year archive

            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) { // Author archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';  
    }
}

?>