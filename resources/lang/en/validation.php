<?php

return [
    'required' => 'The :attribute field is required.',
    'email'    => 'The :attribute must be a valid email address.',
    'unique'   => 'The :attribute has already been taken.',
    'exists'   => 'The selected :attribute is invalid.',
    'image'    => 'The :attribute must be an image.',
    'mimes'    => 'The :attribute must be a file of type: :values.',
    'max'      => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file'    => 'The :attribute must not be greater than :max kilobytes.',
        'string'  => 'The :attribute must not be greater than :max characters.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'order_id'     => 'order ID',
        'status'       => 'status',
        'reason'       => 'reason',
        'image_before' => 'image before',
        'image_after'  => 'image after',
        'email'        => 'email address',
        'password'     => 'password',
        'phone'        => 'phone number',
        'report'       => 'report',
    ],
];