<?php

return [
    'active' => array_map('trim', explode(',', env('MODULES', 'pages')))
];
