<?php 
/**
 * Plugin Name: Certificate Verification- for Tutor LMS
 * Plugin URI: webtoptemplate.com
 * Description: You can varify and open direct certificate using this
 * Author: kardi
 * Version: 1.0
 * Author URI: https://github.com/ikardi420
 * Domain Path: /languages/
 *License : GPL v or later
*Text Domain: varifcert
 * @package 
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

function varif_cert_enqueue_scripts() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'varify_cert') ) {
    wp_register_style( 'varify-cert-stylesheet',  plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
        wp_enqueue_style( 'varify-cert-stylesheet' );

    }
   }

   add_action( 'wp_enqueue_scripts', 'varif_cert_enqueue_scripts');

if(!function_exists('varif_cert_shortcode')){
    function varif_cert_shortcode() { 
        $string='';
          
          $string .= '<p>Enter your certificate id and varify</p>
          <input type="text" value="" id="cert-id"/>
          <button type="button" id="go-cert" onclick="certvrFunction()">Varify certificate</button>
      ';
            
          return $string; 
            
          }
}

    // Register shortcode
    add_shortcode('varify_cert', 'varif_cert_shortcode'); 
?>
<script>
function certvrFunction() {
    var id=document.getElementById("cert-id").value;
    console.log(id);
        var url="<?php echo get_site_url();?>/?cert_hash=";
         var new_url=  url+id;
  window.open(new_url);
}
</script>
