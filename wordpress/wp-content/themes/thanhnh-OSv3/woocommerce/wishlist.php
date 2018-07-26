<?php if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>
<div id="yith-wcwl-messages"></div>

<?php yith_wcwl_get_template( 'wishlist-' . $template_part . '.php', $atts ) ?>