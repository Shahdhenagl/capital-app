<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Notifications\WelcomeWhatsAppNotification;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::post('/users', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'city' => 'nullable|string',
        'lang' => 'nullable|string',
        'country' => 'nullable|string',
    ]);

    $user = new User();
    $user->name = $validated['name'];
    $user->phone = $validated['phone'];
    
    // Simulate saving the user to the database
    // $user->save();

    // Send the notification (which goes to DB and WhatsApp via our listener)
    $user->notify(new WelcomeWhatsAppNotification("أهلاً بك يا {$user->name} في مصاعد عاصمة الكون! تم استلام بيانات تسجيلك بنجاح."));

    return redirect()->back();
});

Route::get('/test-whatsapp', function () {
    $phone = request('phone', '0500000000');
    
    $user = new \App\Models\User();
    $user->phone = $phone;

    $user->notify(new \App\Notifications\WelcomeWhatsAppNotification());

    return "تم إرسال الإشعار إلى $phone. يرجى التحقق من الواتساب.";
});
