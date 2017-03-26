<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => __( 'Button Label', 'fw' ),
		'desc'  => __( 'This is the text that appears on your modal-image', 'fw' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'customclass' => array(
		'label' => __('Custom Button Class', 'fw'),
		'desc'  => __('Insert Custom Button Class to this section', 'fw'),
		'type'  => 'text',
	),

	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Choose Image', 'fw' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => __( 'Width', 'fw' ),
				'desc'  => __( 'Set image width', 'fw' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => __( 'Height', 'fw' ),
				'desc'  => __( 'Set image height', 'fw' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'target' => array(
				'type'         => 'switch',
				'label'        => __( 'Open Link in New Window', 'fw' ),
				'desc'         => __( 'Select here if you want to open the linked page in a new window', 'fw' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => __( 'Yes', 'fw' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => __( 'No', 'fw' ),
				),
			),
		)
	)
);