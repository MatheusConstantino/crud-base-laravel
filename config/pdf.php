<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'font_path' => base_path('min/fonts/print/'),
	'font_data' => [
		'DejaVuSans' => [
			'R'  => 'DejaVuSans-Regular.ttf',    // regular font
			'B'  => 'DejaVuSans-Bold.ttf',       // optional: bold font
			'I'  => 'DejaVuSans-Oblique.ttf',     // optional: italic font
			'BI' => 'DejaVuSans-BoldOblique.ttf' // optional: bold-italic font
			//'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			//'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
		// ...add as many as you want.
	]
];
