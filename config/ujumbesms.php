<?php
return [

        'api_key'   => env('UJUMBE_API_KEY', 'NWNkMTZlYjkzNjAzMTM4ZTQ5YmFlNGI2MzQ1YmZj'),
        'sender_id' => env("UJUMBE_SENDER_ID", 'UjumbeSMS'),
        'email'     => env("UJUMBE_EMAIL", 'kenmsh@gmail.com'),

        'prefix'     => 'ujumbe',
        'middleware' => ['web'],

];
