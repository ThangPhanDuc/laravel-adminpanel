<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'created' => 'The role was successfully created.',
                'updated' => 'The role was successfully updated.',
                'deleted' => 'The role was successfully deleted.',
            ],

            'permissions' => [
                'created' => 'The permission was successfully created.',
                'updated' => 'The permission was successfully updated.',
                'deleted' => 'The permission was successfully deleted.',
            ],

            'users' => [
                'created' => 'The user was successfully created.',
                'updated' => 'The user was successfully updated.',
                'deleted' => 'The user was successfully deleted.',
                'deleted_permanently' => 'The user was deleted permanently.',
                'restored' => 'The user was successfully restored.',
                'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
                'confirmation_email' => 'A new confirmation e-mail has been sent to the address on file.',
                'confirmed' => 'The user was successfully confirmed.',
                'session_cleared' => "The user's session was successfully cleared.",
                'social_deleted' => 'Social Account Successfully Removed',
                'unconfirmed' => 'The user was successfully un-confirmed',
                'updated_password' => "The user's password was successfully updated.",
            ],
        ],

        'blogs' => [
            'created' => 'The blog was successfully created.',
            'updated' => 'The blog was successfully updated.',
            'deleted' => 'The blog was successfully deleted.',
        ],

        'blog-category' => [
            'created' => 'The blog category was successfully created.',
            'updated' => 'The blog category was successfully updated.',
            'deleted' => 'The blog category was successfully deleted.',
        ],

        'blog-tags' => [
            'created' => 'The blog tag was successfully created.',
            'updated' => 'The blog tag was successfully updated.',
            'deleted' => 'The blog tag was successfully deleted.',
        ],

        'leaves' => [
            'created' => 'The leave was successfully created.',
            'updated' => 'The leave was successfully updated.',
            'deleted' => 'The leave was successfully deleted.',
        ],

        'products' => [
            'created' => 'The product was successfully created.',
            'updated' => 'The product was successfully updated.',
            'deleted' => 'The product was successfully deleted.',
        ],

        'product-categories' => [
            'created' => 'The product category was successfully created.',
            'updated' => 'The product category was successfully updated.',
            'deleted' => 'The product category was successfully deleted.',
        ],


        'pages' => [
            'created' => 'The page was successfully created.',
            'updated' => 'The page was successfully updated.',
            'deleted' => 'The page was successfully deleted.',
        ],

        'faqs' => [
            'created' => 'The faq was successfully created.',
            'updated' => 'The faq was successfully updated.',
            'deleted' => 'The faq was successfully deleted.',
        ],

        'email-templates' => [
            'created' => 'The email template was successfully created.',
            'updated' => 'The email template was successfully updated.',
            'deleted' => 'The email template was successfully deleted.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
