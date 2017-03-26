<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<?php
$color_class = !empty($atts['color']) ? "fw-btn-{$atts['color']}" : '';
$custom_class = ( isset( $atts['customclass'] ) && $atts['customclass'] ) ? ' ' . $atts['customclass'] . ' ' : '';



if ( empty( $atts['image'] ) ) {
	return;
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta($atts['image']['attachment_id'], '_wp_attachment_image_alt', true);

$img_attributes = array(
	'src' => $image,
	'alt' => $alt ? $alt : $image
);

if(!empty($width)){
	$img_attributes['width'] = $width;
}

if(!empty($height)){
	$img_attributes['height'] = $height;
}


if ( !empty( $atts['label'] ) ) {?>
	<a href="<?php echo esc_attr($img_attributes['src']) ?>" target="<?php echo esc_attr($atts['target']) ?>" class="fw-btn fw-btn-1<?php echo esc_attr($color_class) . $custom_class; ?>">
		<span><?php echo $atts['label']; ?></span>
	</a>
<?php
} else  { ?>
	<a href="<?php echo esc_attr($atts['image']['url']) ?>" target="<?php echo esc_attr($atts['target']) ?>" class="fw-btn fw-btn-1<?php echo esc_attr($color_class) . $custom_class; ?>">
		<?php echo fw_html_tag('img', $img_attributes); ?>
	</a>
<?php }

?>