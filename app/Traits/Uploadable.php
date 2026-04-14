<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

trait Uploadable
{
    /**
     * رفع ملف (صورة أو ملف عادي)
     */
    public function uploadFile($file, $folder = 'others', $resizeWidth = null, $resizeHeight = null)
    {
        // 1. تحديد المسار
        $path = public_path('assets/uploads/' . $folder);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // 2. إنشاء اسم فريد للملف
        $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

        // 3. التحقق إذا كان الملف صورة لاستخدام Intervention Image
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array(strtolower($file->getClientOriginalExtension()), $imageExtensions)) {
            $image = Image::make($file);

            // عمل Resize إذا طُلِب ذلك
            if ($resizeWidth || $resizeHeight) {
                $image->resize($resizeWidth, $resizeHeight, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            $image->save($path . '/' . $fileName);
        } else {
            // إذا كان ملفاً عادياً (PDF, etc.)
            $file->move($path, $fileName);
        }

        return $fileName;
    }

    /**
     * حذف ملف
     */
    public function deleteFile($fileName, $folder = 'others')
    {
        $filePath = public_path("assets/uploads/$folder/$fileName");
        if ($fileName && File::exists($filePath)) {
            File::delete($filePath);
        }
    }

    /**
     * جلب رابط الصورة الكامل
     */
    public function getImagePath($fileName, $folder = 'others')
    {
        if (!$fileName || !File::exists(public_path("assets/uploads/$folder/$fileName"))) {
            return asset("assets/uploads/default.png"); // تأكدي من وجود صورة افتراضية
        }
        return asset("assets/uploads/$folder/$fileName");
    }
}