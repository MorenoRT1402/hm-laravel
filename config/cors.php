<?php

return [

'paths' => ['api/*', 'auth/*', '*'], // Rutas donde se aplicará CORS
'allowed_methods' => ['*'], // Métodos permitidos (GET, POST, etc.)
'allowed_origins' => ['http://localhost:3000'],
'allowed_origins_patterns' => [],
'allowed_headers' => ['*'], // Encabezados permitidos
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => true, // Si usas cookies o autenticación basada en sesiones
];
