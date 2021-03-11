<?php

namespace NEKO\Basis\Config;

defined('ABSPATH') || exit;

/**
 * Gibt der Name der Option zurück.
 * @return array [description]
 */
function getOptionName()
{
    return 'neko_basis';
}

/**
 * Gibt die Einstellungen des Menus zurück.
 * @return array [description]
 */
function getMenuSettings()
{
    return [
        'page_title'    => __('NEKO Basis', 'neko-basis'),
        'menu_title'    => __('NEKO Basis', 'neko-basis'),
        'capability'    => 'manage_options',
        'menu_slug'     => 'neko-basis',
        'title'         => __('NEKO Basis Settings', 'neko-basis'),
    ];
}

/**
 * Gibt die Einstellungen der Inhaltshilfe zurück.
 * @return array [description]
 */
function getHelpTab()
{
    return [
        [
            'id'        => 'neko-basis-help',
            'content'   => [
                '<p>' . __('Here NEKO comes the NEKO Context Help NEKO content.', 'neko-basis') . '</p>'
            ],
            'title'     => __('Overview', 'neko-basis'),
            'sidebar'   => sprintf('<p><strong>%1$s:</strong></p><p><a href="https://blogs.fau.de/webworking">RRZE-NEKO Webworking</a></p><p><a href="https://github.com/RRZE Webteam">%2$s</a></p>', __('For more information', 'neko-basis'), __('RRZE Webteam on Github', 'neko-basis'))
        ]
    ];
}

/**
 * Gibt die Einstellungen der Optionsbereiche zurück.
 * @return array [description]
 */
function getSections()
{
    return [
        [
            'id'    => 'basic',
            'title' => __('Basic Settings', 'cms-basis')
        ],
        [
            'id'    => 'advanced',
            'title' => __('Advanced Settings', 'cms-basis')
        ]
    ];
}

/**
 * Gibt die Einstellungen der Optionsfelder zurück.
 * @return array [description]
 */
function getFields()
{
    return [
        'basic' => [
            [
                'name'              => 'text_input',
                'label'             => __('Text Input', 'cms-basis'),
                'desc'              => __('Text input description.', 'cms-basis'),
                'placeholder'       => __('Text Input placeholder', 'cms-basis'),
                'type'              => 'text',
                'default'           => 'Title',
                'sanitize_callback' => 'sanitize_text_field'
            ],
            [
                'name'              => 'number_input',
                'label'             => __('Number Input', 'cms-basis'),
                'desc'              => __('Number input description.', 'cms-basis'),
                'placeholder'       => '5',
                'min'               => 0,
                'max'               => 100,
                'step'              => '1',
                'type'              => 'number',
                'default'           => 'Title',
                'sanitize_callback' => 'floatval'
            ],
            [
                'name'        => 'textarea',
                'label'       => __('Textarea Input', 'cms-basis'),
                'desc'        => __('Textarea description', 'cms-basis'),
                'placeholder' => __('Textarea placeholder', 'cms-basis'),
                'type'        => 'textarea'
            ],
            [
                'name'  => 'checkbox',
                'label' => __('Checkbox', 'cms-basis'),
                'desc'  => __('Checkbox description', 'cms-basis'),
                'type'  => 'checkbox'
            ],
            [
                'name'    => 'multicheck',
                'label'   => __('Multiple checkbox', 'cms-basis'),
                'desc'    => __('Multiple checkbox description.', 'cms-basis'),
                'type'    => 'multicheck',
                'default' => [
                    'one' => 'one',
                    'two' => 'two'
                ],
                'options'   => [
                    'one'   => __('One', 'cms-basis'),
                    'two'   => __('Two', 'cms-basis'),
                    'three' => __('Three', 'cms-basis'),
                    'four'  => __('Four', 'cms-basis')
                ]
            ],
            [
                'name'    => 'radio',
                'label'   => __('Radio Button', 'cms-basis'),
                'desc'    => __('Radio button description.', 'cms-basis'),
                'type'    => 'radio',
                'options' => [
                    'yes' => __('Yes', 'cms-basis'),
                    'no'  => __('No', 'cms-basis')
                ]
            ],
            [
                'name'    => 'selectbox',
                'label'   => __('Dropdown', 'cms-basis'),
                'desc'    => __('Dropdown description.', 'cms-basis'),
                'type'    => 'select',
                'default' => 'no',
                'options' => [
                    'yes' => __('Yes', 'cms-basis'),
                    'no'  => __('No', 'cms-basis')
                ]
            ]
        ],
        'advanced' => [
            [
                'name'    => 'color',
                'label'   => __('Color', 'cms-basis'),
                'desc'    => __('Color description.', 'cms-basis'),
                'type'    => 'color',
                'default' => ''
            ],
            [
                'name'    => 'password',
                'label'   => __('Password', 'cms-basis'),
                'desc'    => __('Password description.', 'cms-basis'),
                'type'    => 'password',
                'default' => ''
            ],
            [
                'name'    => 'wysiwyg',
                'label'   => __('Advanced Editor', 'cms-basis'),
                'desc'    => __('Advanced Editor description.', 'cms-basis'),
                'type'    => 'wysiwyg',
                'default' => ''
            ],
            [
                'name'    => 'file',
                'label'   => __('File', 'cms-basis'),
                'desc'    => __('File description.', 'cms-basis'),
                'type'    => 'file',
                'default' => '',
                'options' => [
                    'button_label' => __('Choose an Image', 'cms-basis')
                ]
            ]
        ]
    ];
}


/**
 * Gibt die Einstellungen der Parameter für Shortcode für den klassischen Editor und für Gutenberg zurück.
 * @return array [description]
 */

function getShortcodeSettings(){
	return [
		'block' => [
            'blocktype' => 'cms-basis/SHORTCODE-NAME', // dieser Wert muss angepasst werden
			'blockname' => 'SHORTCODE-NAME', // dieser Wert muss angepasst werden
			'title' => 'SHORTCODE-TITEL', // Der Titel, der in der Blockauswahl im Gutenberg Editor angezeigt wird
			'category' => 'widgets', // Die Kategorie, in der der Block im Gutenberg Editor angezeigt wird
            'icon' => 'admin-users',  // Das Icon des Blocks
            'show_block' => 'content', // 'right' or 'content' : Anzeige des Blocks im Content-Bereich oder in der rechten Spalte
		],
		'Beispiel-Textfeld-Text' => [
			'default' => 'ein Beispiel-Wert',
			'field_type' => 'text', // Art des Feldes im Gutenberg Editor
			'label' => __( 'Beschriftung', 'cms-basis' ),
			'type' => 'string' // Variablentyp der Eingabe
		],
		'Beispiel-Textfeld-Number' => [
			'default' => 0,
			'field_type' => 'text', // Art des Feldes im Gutenberg Editor
			'label' => __( 'Beschriftung', 'cms-basis' ),
			'type' => 'number' // Variablentyp der Eingabe
		],
		'Beispiel-Textarea-String' => [
			'default' => 'ein Beispiel-Wert',
			'field_type' => 'textarea',
			'label' => __( 'Beschriftung', 'cms-basis' ),
			'type' => 'string',
			'rows' => 5 // Anzahl der Zeilen 
		],
		'Beispiel-Radiobutton' => [
			'values' => [
				'wert1' => __( 'Wert 1', 'cms-basis' ), // wert1 mit Beschriftung
				'wert2' => __( 'Wert 2', 'cms-basis' )
			],
			'default' => 'DESC', // vorausgewählter Wert
			'field_type' => 'radio',
			'label' => __( 'Order', 'cms-basis' ), // Beschriftung der Radiobutton-Gruppe
			'type' => 'string' // Variablentyp des auswählbaren Werts
		],
		'Beispiel-Checkbox' => [
			'field_type' => 'checkbox',
			'label' => __( 'Beschriftung', 'cms-basis' ),
			'type' => 'boolean',
			'default'   => true // Vorauswahl: Haken gesetzt
        ],
        'Beispiel-Toggle' => [
            'field_type' => 'toggle',
            'label' => __( 'Beschriftung', 'cms-basis' ),
            'type' => 'boolean',
            'default'   => true // Vorauswahl: ausgewählt
        ],
		'Beispiel-Select' => [
			'values' => [
                [
                    'id' => 'wert1',
                    'val' =>  __( 'Wert 1', 'cms-basis' )
                ],
                [
                    'id' => 'wert2',
                    'val' =>  __( 'Wert 2', 'cms-basis' )
                ],
			],
			'default' => 'wert1', // vorausgewählter Wert: Achtung: string, kein array!
			'field_type' => 'select',
			'label' => __( 'Beschriftung', 'cms-basis' ),
			'type' => 'string' // Variablentyp des auswählbaren Werts
		],
        'Beispiel-Multi-Select' => [
			'values' => [
                [
                    'id' => 'wert1',
                    'val' =>  __( 'Wert 1', 'cms-basis' )
                ],
                [
                    'id' => 'wert2',
                    'val' =>  __( 'Wert 2', 'cms-basis' )
                ],
                [
                    'id' => 'wert3',
                    'val' =>  __( 'Wert 3', 'cms-basis' )
                ],
			],
			'default' => ['wert1','wert3'], // vorausgewählte(r) Wert(e): Achtung: array, kein string!
			'field_type' => 'multi_select',
			'label' => __( 'Beschrifung', 'cms-basis' ),
			'type' => 'array',
			'items'   => [
				'type' => 'string' // Variablentyp der auswählbaren Werte
			]
        ]
    ];
}

