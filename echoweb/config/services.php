<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
	
	'facebook' => [
		'client_id' => '483041602057745',
		'client_secret' => '887b8fe0ea7a7b8291645bea18e02182',
		'redirect' => 'http://domaingue.com/yukbantu/callback',
	],
	
	'google' => [
		'client_id' => '999133532168-iml2b3mh6vbctv16hfmumr2ncgn06d2u.apps.googleusercontent.com',
		'client_secret' => '29KEI0C4WkjyalNPMIMU0Z26',
		'redirect' => 'http://domaingue.com/yukbantu/callback/google',
	],

];
