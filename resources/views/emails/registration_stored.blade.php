<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <title>تأكيد التسجيل</title>
</head>
<body style="font-family: Arial, sans-serif; direction: rtl;">
    <h2>مرحباً {{ $name }}،</h2>
    <p>تم تخزين تفاصيل تسجيلك بنجاح.</p>
    <p>الاسم: {{ $name }}</p>
    <p>البريد الإلكتروني: {{ $email }}</p>
    <p>اسم الدكتور: {{ $doctor_name }}</p>
    <p> اسم الخدمة: {{ $service_name }}</p>
    <p>اسم الفرع: {{ $branch_name }}</p>
    <p>تاريخ الحجز: {{ $day }}::{{ $time_from }}</p>
    <!-- يمكنك إضافة المزيد من تفاصيل التسجيل هنا -->
    <p>شكراً لك!</p>
</body>
</html>
