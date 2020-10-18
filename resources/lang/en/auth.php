<?php

return [

    'failed' => 'Credential not available',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'login' => [
        'ok' => 'Login success',
        'failed' => [
            'username' => 'No credential found the given username',
            'password' => 'Password credential is not correct',
            'general' => 'Unable to logged in with given credential'
        ]
    ],

    'register' => [
        'ok' => 'Registration success',
        'failed' => [
            'username_used' => 'Credential username already used',
            'general' => 'Unable to register with given credential'
        ]
    ],

    'otp' => [
        'ok' => 'OTP verified!',
        'expired' => 'OTP has expired',
        'failed' => 'Incorrect OTP'
    ]

];
