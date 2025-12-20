<?php
// config/cors.php

return [
 'paths' => ['api/*'],
'allowed_methods' => ['*'],
'allowed_origins' => ['*'], // Sesuaikan dengan domain frontend nanti
'allowed_headers' => ['*'],
'allowed_origins_patterns' => [],
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => false,
];