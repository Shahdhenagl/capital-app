import React, { useState } from 'react';
import { Head, useForm } from '@inertiajs/react';
import { Building2, User, Phone, MapPin, Globe2, Loader2, CheckCircle2 } from 'lucide-react';

export default function Welcome() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        phone: '',
        city: '',
        lang: '',
        country: '',
    });

    const [isSuccess, setIsSuccess] = useState(false);

    const submit = (e) => {
        e.preventDefault();
        post('/users', {
            onSuccess: () => {
                setIsSuccess(true);
                reset();
                setTimeout(() => setIsSuccess(false), 5000);
            },
        });
    };

    return (
        <>
            <Head title="إضافة مستخدم جديد" />
            <div className="min-h-screen bg-slate-50 flex items-center justify-center p-4">
                <div className="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
                    
                    {/* Sidebar / Branding */}
                    <div className="md:w-2/5 bg-slate-900 p-8 text-white flex flex-col justify-between relative overflow-hidden">
                        <div className="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                        
                        <div className="relative z-10">
                            <div className="flex items-center gap-3 mb-8">
                                <div className="p-3 bg-blue-600 rounded-lg shadow-lg">
                                    <Building2 className="w-8 h-8 text-white" />
                                </div>
                                <div>
                                    <h1 className="text-2xl font-bold text-white tracking-tight">مصاعد عاصمة الكون</h1>
                                    <p className="text-blue-400 text-sm font-medium">للتميز عنوان</p>
                                </div>
                            </div>
                            
                            <h2 className="text-3xl font-extrabold mb-4 leading-tight">بوابة<br/>تسجيل العملاء</h2>
                            <p className="text-slate-400 leading-relaxed mb-8">
                                أدخل بيانات العميل الجديد بدقة لضمان تسجيله في النظام بشكل صحيح ووصول إشعارات الخدمة إليه في الوقت المناسب.
                            </p>
                        </div>
                        
                        <div className="relative z-10 text-sm text-slate-500 font-medium">
                            &copy; {new Date().getFullYear()} جميع الحقوق محفوظة
                        </div>
                    </div>

                    {/* Form Section */}
                    <div className="md:w-3/5 p-8 md:p-12">
                        <div className="mb-8">
                            <h3 className="text-2xl font-bold text-slate-800">بيانات المستخدم</h3>
                            <p className="text-slate-500 mt-1">يرجى تعبئة الحقول أدناه</p>
                        </div>

                        {isSuccess && (
                            <div className="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-3 animate-pulse">
                                <CheckCircle2 className="w-6 h-6 text-emerald-500" />
                                <span className="text-emerald-700 font-medium">تمت إضافة المستخدم بنجاح! والإشعار في طريقه إليه.</span>
                            </div>
                        )}

                        <form onSubmit={submit} className="space-y-6">
                            
                            {/* Name Input */}
                            <div>
                                <label className="block text-sm font-semibold text-slate-700 mb-2">الاسم الكامل</label>
                                <div className="relative">
                                    <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <User className="w-5 h-5 text-slate-400" />
                                    </div>
                                    <input
                                        type="text"
                                        value={data.name}
                                        onChange={e => setData('name', e.target.value)}
                                        className={`w-full pl-4 pr-10 py-3 bg-slate-50 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors ${errors.name ? 'border-red-300 ring-red-100' : 'border-slate-200'}`}
                                        placeholder="مثال: أحمد محمد"
                                    />
                                </div>
                                {errors.name && <p className="mt-2 text-sm text-red-600">{errors.name}</p>}
                            </div>

                            {/* Phone Input */}
                            <div>
                                <label className="block text-sm font-semibold text-slate-700 mb-2">رقم الموبايل (واتساب)</label>
                                <div className="relative">
                                    <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <Phone className="w-5 h-5 text-slate-400" />
                                    </div>
                                    <input
                                        type="text"
                                        value={data.phone}
                                        onChange={e => setData('phone', e.target.value)}
                                        className={`w-full pl-4 pr-10 py-3 bg-slate-50 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors ${errors.phone ? 'border-red-300 ring-red-100' : 'border-slate-200'}`}
                                        placeholder="مثال: 05XXXXXXXX"
                                    />
                                </div>
                                {errors.phone && <p className="mt-2 text-sm text-red-600">{errors.phone}</p>}
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {/* City Select */}
                                <div>
                                    <label className="block text-sm font-semibold text-slate-700 mb-2">المدينة</label>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <MapPin className="w-5 h-5 text-slate-400" />
                                        </div>
                                        <select
                                            value={data.city}
                                            onChange={e => setData('city', e.target.value)}
                                            className={`w-full pl-4 pr-10 py-3 bg-slate-50 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none transition-colors ${errors.city ? 'border-red-300' : 'border-slate-200'}`}
                                        >
                                            <option value="">اختر المدينة...</option>
                                            <option value="مكة">مكة المكرمة</option>
                                            <option value="جدة">جدة</option>
                                            <option value="الرياض">الرياض</option>
                                        </select>
                                    </div>
                                    {errors.city && <p className="mt-2 text-sm text-red-600">{errors.city}</p>}
                                </div>

                                {/* Language Select */}
                                <div>
                                    <label className="block text-sm font-semibold text-slate-700 mb-2">اللغة</label>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <Globe2 className="w-5 h-5 text-slate-400" />
                                        </div>
                                        <select
                                            value={data.lang}
                                            onChange={e => setData('lang', e.target.value)}
                                            className={`w-full pl-4 pr-10 py-3 bg-slate-50 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none transition-colors ${errors.lang ? 'border-red-300' : 'border-slate-200'}`}
                                        >
                                            <option value="">اختر اللغة...</option>
                                            <option value="ar">العربية</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                    {errors.lang && <p className="mt-2 text-sm text-red-600">{errors.lang}</p>}
                                </div>
                            </div>

                            {/* Country Input */}
                            <div>
                                <label className="block text-sm font-semibold text-slate-700 mb-2">الدولة</label>
                                <input
                                    type="text"
                                    value={data.country}
                                    onChange={e => setData('country', e.target.value)}
                                    className={`w-full px-4 py-3 bg-slate-50 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors ${errors.country ? 'border-red-300 ring-red-100' : 'border-slate-200'}`}
                                    placeholder="مثال: السعودية"
                                />
                                {errors.country && <p className="mt-2 text-sm text-red-600">{errors.country}</p>}
                            </div>

                            {/* Submit Button */}
                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95 disabled:opacity-70 flex items-center justify-center gap-2 mt-4"
                            >
                                {processing ? (
                                    <>
                                        <Loader2 className="w-5 h-5 animate-spin" />
                                        جاري التسجيل...
                                    </>
                                ) : (
                                    'تسجيل وحفظ البيانات'
                                )}
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </>
    );
}
