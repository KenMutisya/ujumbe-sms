<?php
return [

        'api_key'   => env('UJUMBE_API_KEY', 'bf4ca6e4-a1f0-4153-b361-6785991083c3'),
        'sender_id' => env("UJUMBE_SENDER_ID", 'UjumbeSMS'),
        'email'     => env("UJUMBE_EMAIL", '*****@gmail.com'),
        'prefix'     => 'ujumbe',
        'middleware' => ['web'],

];
