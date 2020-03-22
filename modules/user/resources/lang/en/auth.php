<?php


return [
    'html' => [
        'sign_in' => 'Sign In',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'E-mail',
        'password' => 'Password',
        'new_password' => 'New Password',
        'password_confirm' => 'Confirm Password',
        'see_you_again' => 'Happy to see you again!',
        'remember' => 'Remember Me',
        'forgot_password' => 'Forgot Password ?',
        'not_account' => 'Don\'t have an account ?',
        'create_account' => 'Create an account',
        'register' => 'Register',
        'join_step' => 'Join us today! It takes only few steps',
        'accept' => 'I Accept',
        'term_condition' => 'Terms and Conditions',
        'has_account' => 'Already have an account ?',
        'forgot' => 'Forgot Password',
        'forgot_logan' => 'We will send you a link to reset password.',
        'reset' => 'Reset Password',
        'reset_logan' => 'Almost done. Enter your new password, and you\'re good to go.',

        'btn' => [
            'forgot' => 'Reset Password',
        ],
    ],

    'messages' => [
        'confirms' => [
            'subject' => 'Register Confirmation',
            'body' => 'Your registration is completed. Please click link to get access',
            'check_email' => 'Confirmation email has been send. Please check your email',
            'completed' => 'Your activation is completed',
            'confirm_email' => 'Please confirm your email',
            'btn_name' => 'Confirm Registered',
        ],
        'passwords' => [
            'user' => 'We can\'t find a user with that e-mail address',
            'token' => 'This password reset token is invalid',
            'reset' => 'Your password has been reset',
            'sent' => 'We have e-mailed your password reset link',
            'success' => 'Change password successfully',
            'subject' => 'Change Password',
            'body' => 'You have changed your password successfully.'
        ],
        'auth' => [
            'failed' => 'These credentials do not match our records',
            'token_invalid' => 'This confirmation token is invalid',
            'unauthorized' => 'Unauthorized',
            'unauthorized_access' => 'You do not have the appropriate permissions to access that page.',
            'unauthenticated' => 'Not logged',
        ],
        'forgot' => [
            'subject' => 'Reset Password Request',
            'body' => 'You are receiving this email because we received a password reset request for your account.',
            'btn_name' => 'Reset Password',
        ],
        'reset' => [
            'subject' => 'Password Reset Success',
            'body' => 'You have reset your password successfully.',
            'token_not_found' => 'Token not found',
        ],
        'login' => [
            'success' => 'Logged in successfully',
        ],
    ],

    'validations' => [
        'required' => 'Please enter your :attribute',
        'string' => 'The :attribute must be a string',
        'max' => [
            'numeric' => 'The :attribute may not be greater than :max',
            'file'    => 'The :attribute may not be greater than :max kilobytes',
            'string'  => 'The :attribute may not be greater than :max characters',
            'array'   => 'The :attribute may not have more than :max items',
        ],
        'min' => [
            'numeric' => 'The :attribute must be at least :min',
            'file'    => 'The :attribute must be at least :min kilobytes',
            'string'  => 'The :attribute must be at least :min characters',
            'array'   => 'The :attribute must have at least :min items',
        ],
        'email' => 'The :attribute is invalid',
        'unique' => 'The :attribute you have entered is already registered',
        'confirmed' => 'The :attribute confirmation does not match',
        'password_regex' => 'The Password may have alpha-numeric characters, as well as symbols (only . - _)',
    ],

    'page_title' => [
        'login' => 'Login Authenticate',
        'register' => 'Register Authenticate',
        'forgot' => 'Forgot Password',
        'reset' => 'Reset Password',
    ],
];
