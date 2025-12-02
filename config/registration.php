<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Registration Mode
    |--------------------------------------------------------------------------
    |
    | Controls how user registration is handled in the application.
    |
    | Supported modes:
    | - 'disabled'    : Registration is completely disabled
    | - 'public'      : Open registration for anyone
    | - 'invite_only' : Registration requires an invite code
    |
    */
    'mode' => env('REGISTRATION_MODE', 'disabled'),

    /*
    |--------------------------------------------------------------------------
    | Allowed Modes
    |--------------------------------------------------------------------------
    |
    | List of valid registration modes. Used for validation.
    |
    */
    'allowed_modes' => ['disabled', 'public', 'invite_only'],
];
