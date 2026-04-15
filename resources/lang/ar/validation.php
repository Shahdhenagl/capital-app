<?php

return [

    // 🔹 General Validation Messages
    'required' => 'حقل :attribute مطلوب.',
    'email'    => 'يجب أن يكون :attribute بريد إلكتروني صحيح.',
    'unique'   => ':attribute مستخدم من قبل.',
    'exists'   => ':attribute غير موجود.',
    'image'    => 'يجب أن يكون :attribute صورة.',
    'mimes'    => 'يجب أن يكون :attribute من نوع: :values.',
    
    'max' => [
        'numeric' => 'يجب ألا يزيد :attribute عن :max.',
        'file'    => 'يجب ألا يتجاوز حجم الملف :max كيلوبايت.',
        'string'  => 'يجب ألا يتجاوز :attribute :max حرف.',
    ],

    'min' => [
        'numeric' => 'يجب ألا يقل :attribute عن :min.',
        'string'  => 'يجب ألا يقل :attribute عن :min أحرف.',
    ],

    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'digits'    => 'يجب أن يكون :attribute مكون من :digits أرقام.',
    'numeric'   => 'يجب أن يكون :attribute رقم.',

    // 🔹 Custom Attributes (important جدًا)
    'attributes' => [
        'order_id'     => 'رقم الطلب',
        'status'       => 'الحالة',
        'reason'       => 'السبب',
        'image_before' => 'صورة قبل البدء',
        'image_after'  => 'صورة بعد الانتهاء',
        'email'        => 'البريد الإلكتروني',
        'password'     => 'كلمة المرور',
        'name'         => 'الاسم',
        'phone'        => 'رقم الجوال',
        'city'         => 'المدينة',
        'address'      => 'العنوان',
        'lat'          => 'خط العرض',
        'long'         => 'خط الطول',
        'code'         => 'كود التحقق',
    ],

];