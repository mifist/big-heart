<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'customclass' => array(
		'label' => __('Custom Section Class', 'fw'),
		'desc'  => __('Insert Custom Section Class to this section', 'fw'),
		'type'  => 'text',
	),
	'customid' => array(
		'label' => __('Custom Section Id', 'fw'),
		'desc'  => __('Insert Custom Section Class to this Id', 'fw'),
		'type'  => 'text',
	),
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	)
);
