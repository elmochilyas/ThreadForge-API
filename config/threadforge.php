<?php

return [
    'ai' => [
        'provider' => env('THREADFORGE_AI_PROVIDER', 'xai'),
        'model' => env('THREADFORGE_AI_MODEL', 'grok-4-1-fast-reasoning'),
    ],
];
