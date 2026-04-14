<?php

return [
    'required' => 'حقل :attribute مطلوب.',
    'email'    => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح.',
    'unique'   => 'قيمة :attribute مستخدمة من قبل.',
    'exists'   => 'القيمة المحددة لـ :attribute غير موجودة.',
    'image'    => 'يجب أن يكون :attribute صورة.',
    'mimes'    => 'يجب أن يكون :attribute ملفاً من نوع: :values.',
    'max'      => [
        'numeric' => 'يجب أن لا يتجاوز :attribute الـ :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :max كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز عدد حروف :attribute الـ :max حرف.',
    ],

    'attributes' => [
        'order_id' => 'رقم الطلب',
        'status'   => 'الحالة',
        'reason'   => 'السبب',
        'image_before' => 'صورة قبل البدء',
        'image_after' => 'صورة بعد الانتهاء',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
    ],
];