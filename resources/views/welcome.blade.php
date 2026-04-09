@extends('Layouts.Master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>إضافة مستخدم جديد</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Offset for sidebar -->
                    <div class="col-lg-9 col-md-12 col-sm-12 offset-lg-3 offset-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center">إضافة مستخدم جديد</h3>
                            </div>
                            <div class="card-body">
                                <form action=" " method="POST">
                                    @csrf

                                    <div class="row">
                                        <!-- الاسم الكامل -->
                                        <div class="col-md-6 mb-3">
                                            <label for="name">الاسم الكامل</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم الكامل" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- رقم الموبايل -->
                                        <div class="col-md-6 mb-3">
                                            <label for="phone">رقم الموبايل</label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="ادخل رقم الموبايل" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- المكان / المدينة -->
                                        <div class="col-md-4 mb-3">
                                            <label for="city">المدينة</label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="">اختر المدينة</option>
                                                <option value="مكة" {{ old('city') == 'مكة' ? 'selected' : '' }}>مكة</option>
                                                <option value="جدة" {{ old('city') == 'جدة' ? 'selected' : '' }}>جدة</option>
                                                <option value="الرياض" {{ old('city') == 'الرياض' ? 'selected' : '' }}>الرياض</option>
                                            </select>
                                            @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- اللغة -->
                                        <div class="col-md-4 mb-3">
                                            <label for="lang">اللغة</label>
                                            <select name="lang" id="lang" class="form-control">
                                                <option value="">اختر اللغة</option>
                                                <option value="ar" {{ old('lang') == 'ar' ? 'selected' : '' }}>العربية</option>
                                                <option value="en" {{ old('lang') == 'en' ? 'selected' : '' }}>English</option>
                                            </select>
                                            @error('lang')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- الدولة -->
                                        <div class="col-md-4 mb-3">
                                            <label for="country">الدولة</label>
                                            <input type="text" name="country" id="country" class="form-control" placeholder="ادخل الدولة" value="{{ old('country') }}">
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- زر التسجيل -->
                                    <div class="form-group text-center mt-3">
                                        <button type="submit" class="btn btn-success btn-lg">إضافة المستخدم</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
