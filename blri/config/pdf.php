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
	'font_path' => base_path('resources/fonts/'),
	'font_data' => [
		'kalpurushf' => [
			'R'  => 'kalpurush.ttf',    // regular font
			'B'  => 'kalpurush.ttf', // optional: bold font
			'I'  => 'kalpurush.ttf',     // optional: italic font
			'BI' => 'kalpurush.ttf' // optional: bold-italic font
			//'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			//'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		],
		'ShonarBangla' => [
			        'R' => "Shonar.ttf",
					'B' => "Shonarb.ttf",
					'I' => "Shonar.ttf",
					'BI' => "Shonarb.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
		],
		"Bijoy" => [
					'R' => "BIJOY___.TTF",
					'B' => "BIJOB___.TTF",
					'I' => "BIJOI___.TTF",
					'BI' => "BIJOBI__.TTF",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				]
	]
];
