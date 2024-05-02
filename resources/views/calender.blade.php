<!doctype html>
<html lang="ar" dir="rtl">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta -->
<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
<meta name="author" content="ParkerThemes">
<link rel="shortcut icon" href="img/fav.png" />

<title>Bitrix - Calendar</title>

<!-- Preconnect for Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Google Fonts - Cairo -->
<link href="{{ asset('web_assets/fonts/Cairo.css') }}" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('web_assets/css/bootstrap.min.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('web_assets/css/main.css') }}">

<!-- Custom Fonts (if applicable) -->
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/fonts/style.css') }}">

<!-- Daterange CSS -->
<link rel="stylesheet" href="{{ asset('web_assets/vendor/daterange/daterange.css') }}">

<!-- Fullcalendar CSS -->
<link rel="stylesheet" href="{{ asset('web_assets/vendor/calendar/css/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('web_assets/vendor/calendar/css/custom-calendar.css') }}">
<style>
    .form-group {
        text-align: right;
    }

    input,
    label,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    a,
    button,
    select,
    option,
    td,
    th,
    tr {
        font-family: "Cairo", sans-serif;
    }

    .text-info {
        background: black;
    }
</style>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class="spinner-border text-apex-green" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Loading ends -->

    <div class="container">
        <!-- *************
    ************ Main container start *************
    ************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-title">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<<<<<<< HEAD
                        <form method="GET" action="{{ route('export.appointments') }}">
=======
                        <form method="GET" action="{{ route('appointments.show') }}">
>>>>>>> origin/main
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputFrom">الفتره من</label>
<<<<<<< HEAD
                                                <input type="date" class="form-control" id="inputFrom" name="from_date" value="{{ old('from_date') }}">
=======
                                                <input type="date" class="form-control" id="inputFrom"
                                                    name="from_date">
>>>>>>> origin/main
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputTo">الفتره الي</label>
<<<<<<< HEAD
                                                <input type="date" class="form-control" id="inputTo" name="to_date" value="{{ old('to_date') }}">
                                            </div>
                                        </div>
                                        <div style="text-align: right;" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الفرع</label>
                                            <select class="form-control selectpicker" name="branch_id">
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الطبيب</label>
                                            <select class="form-control selectpicker" name="doctor_id">
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الخدمة</label>
                                            <select class="form-control selectpicker" name="service_id">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الدفع</label>
                                            <select class="form-control selectpicker" name="confirmation">
                                                <option value="نعم" {{ old('confirmation') == 'نعم' ? 'selected' : '' }}>نعم</option>
                                                <option value="لا" {{ old('confirmation') == 'لا' ? 'selected' : '' }}>لا</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                            <button style="width: 100%" type="submit" class="btn btn-primary mb-2">ابحث</button>
                                            <button type="submit" style="width: 100%" class="btn btn-primary" name="action" value="export">اصدار ملف الاكسل</button>
=======
                                                <input type="date" class="form-control" id="inputTo"
                                                    name="to_date">
                                            </div>
                                        </div>
                                        <div style="text-align: right;"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الفرع</label>
                                            <select class="form-control selectpicker" name="branch_id">
                                                @foreach ($branches as $branch )
                                                <option value={{ $branch->id}}>{{  $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الطبيب</label>
                                            <select class="form-control selectpicker" name="doctor_id">
                                                @foreach ($doctors as $doctor )
                                                <option value={{  $doctor->id }}>{{  $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الخدمة</label>
                                            <select class="form-control selectpicker" name="service_id">
                                                @foreach ($services as $service )
                                                <option value={{ $service->id }}>{{  $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label>الدفع</label>
                                            <select class="form-control selectpicker" name="confirmation">
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                            <button style="width: 100%" type="submit"
                                                class="btn btn-primary mb-2">ابحث</button>
>>>>>>> origin/main
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

<<<<<<< HEAD

=======
>>>>>>> origin/main
                    </div>
                </div>
            </div>
            <!-- Page header end -->


            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>اليوم</th>
                                                <th>التاريخ</th>
                                                @php
<<<<<<< HEAD
                                                  $matchesExpectedInterval = false;
                                                $appointmentId = null;
=======
                                                    // Gather all unique 'from' and 'to' times
>>>>>>> origin/main
                                                    $uniqueTimes = [];
                                                    foreach ($daysWithData as $dayData) {
                                                        foreach ($dayData['appointments'] as $appointment) {
                                                            if (isset($appointment['time_data'])) {
                                                                foreach ($appointment['time_data'] as $interval) {
                                                                    $uniqueTimes[$interval['from']] = $interval['from'];
                                                                    $uniqueTimes[$interval['to']] = $interval['to'];
                                                                    $foundAppointmentId = $appointment['id'];
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // Sort the unique times in ascending order
                                                    asort($uniqueTimes);
                                                @endphp
                                                @foreach ($uniqueTimes as $time)
                                                    <th>{{ $time }}</th>
                                                @endforeach
<<<<<<< HEAD
                                                <th>قائمة الانتظار</th>
=======
>>>>>>> origin/main
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($daysWithData as $dayData)
                                                <tr>
                                                    <td>{{ Carbon\Carbon::parse($dayData['dayOfWeek'])->locale('ar')->isoFormat('dddd') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($dayData['date'])->locale('ar')->isoFormat('dddd D MMMM YYYY') }}</td>
                                                    @foreach ($uniqueTimes as $time)
                                                        @php
                                                            $matchesExpectedInterval = false;
<<<<<<< HEAD
                                                            $registration = null;
=======
>>>>>>> origin/main
                                                            foreach ($dayData['appointments'] as $appointment) {
                                                                if (isset($appointment['time_data'])) {
                                                                    foreach ($appointment['time_data'] as $interval) {
                                                                        if ($interval['from'] == $time) {
                                                                            $matchesExpectedInterval = true;
<<<<<<< HEAD
                                                                            $registration = $appointment;
=======
>>>>>>> origin/main
                                                                            break 2; // Break both inner and outer loop
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        @endphp
<td style="background-color: {{ $matchesExpectedInterval ? 'h1' : 'لايوجد موعد' }};">
    @if ($matchesExpectedInterval)
                                                                <!-- Display available time slot -->
                                                                @php
<<<<<<< HEAD
                                                                $registration = \App\Models\Registration::where('day', $dayData['date'])
                                                                    ->where('time_from', $time)
                                                                    ->first(); // Retrieve the first matching registration
                                                            @endphp

                                                            @if ($registration)
                                                                <!-- Display registered user's name for available time -->
                                                                <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal" data-target="#registrationModal"
                                                                onclick="populateRegistrationModal('{{ json_encode($registration) }}')">
                                                            {{ $registration->name }}/{{ $registration->doctor_name }}/{{ $registration->service_name }}
                                                        </button>

                                                            @else
                                                                    <!-- Display "حجز ميعاد" for unavailable time -->
                                                                    <button style="background: transparent; color: black" type="button"
                                                                        class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-3"
=======
                                                                    $hasRegistrations = \App\Models\Registration::where('day', $dayData['date'])
                                                                        ->where('time_from', $time)
                                                                        ->exists();
                                                                @endphp
                                                                @if ($hasRegistrations)
                                                                    <!-- Display registered user's name for available time -->
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        data-toggle="modal" data-target=".bd-example-modal-xl"
                                                                        onclick="bookAppointment('{{ $dayData['date'] }}', '{{ $time }}', '{{ $time }}')">
                                                                        {{ substr($registration->name ?? '', 0, 10) }}
                                                                    </button>
                                                                @else
                                                                    <!-- Display "حجز ميعاد" for unavailable time -->
                                                                    <button style="background: transparent; color: black" type="button"
                                                                        class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-2"
>>>>>>> origin/main
                                                                        onclick="bookAppointment('{{ $dayData['date'] }}', '{{ $time }}', '{{ $time }}')">
                                                                        حجز ميعاد
                                                                    </button>
                                                                @endif
<<<<<<< HEAD
                                                                @else
                                                                <!-- Display "لايوجد موعد" for unavailable time -->
                                                                <span style="color: red; font-weight: bold;">لايوجد موعد</span>
                                                            @endif
                                                        </td>

                                                    @endforeach
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Button to view waiting list (عرض قائمة الانتظار) -->
                                                            <button type="button" class="btn btn-outline-info btn-sm mr-2" data-toggle="modal" data-target="#waitingListModal" onclick="bookAppointment('{{ $dayData['date'] }}', '{{ $time }}', '{{ $time }}')">
                                                                عرض قائمة الانتظار
                                                            </button>

                                                            <!-- Button to book an appointment (حجز ميعاد) -->
                                                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#waitingModal" onclick="bookAppointment('{{ $dayData['date'] }}', '{{ $time }}', '{{ $time }}')">
                                                                حجز ميعاد
                                                            </button>
                                                        </div>
                                                    </td>

=======
                                                            @endif
                                                        </td>
                                                    @endforeach
>>>>>>> origin/main
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<<<<<<< HEAD
                                </div>
=======
                        </div>
>>>>>>> origin/main
                    </div>
                </div>

                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->


        <!-- *************
    ************ Main container end *************
    ************* -->


    </div>
<<<<<<< HEAD
<!-- Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrationModalLabel">تفاصيل التسجيل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="registrationDetails">
                    <!-- Registration details will be dynamically populated here -->
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Reservation Data -->
   <!-- Modal for Registered User Details -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">تفاصيل المستخدم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="text-align: right;" class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>البيانات</th>
                                            <th>القيم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($registration))
                                            <tr>
                                                <td>تم التأكيد</td>
                                                <td>{{ $registration->confirmation ? 'نعم' : 'لا' }}</td>
                                            </tr>
                                            <tr>
                                                <td>رقم الهاتف</td>
                                                <td>{{ $registration->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>الاسم</td>
                                                <td>{{ $registration->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>تاريخ الميلاد</td>
                                                <td>{{ $registration->birth_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>النوع</td>
                                                <td>{{ $registration->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td>التأمين الطبي</td>
                                                <td>{{ $registration->medical_insurance ? 'يوجد' : 'لا يوجد' }}</td>
                                            </tr>
                                            <tr>
                                                <td>رقم التأمين</td>
                                                <td>{{ $registration->n_insurance }}</td>
                                            </tr>
                                            <tr>
                                                <td>رقم الهوية</td>
                                                <td>{{ $registration->n_id }}</td>
                                            </tr>
                                            <tr>
                                                <td>المبلغ</td>
                                                <td>{{ $registration->price }} ريال</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="2">لا توجد بيانات متاحة حالياً.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
=======

    <!-- Reservation Data -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">{{ isset($registration->name) }}</h5>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table style="text-align: right;" class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>البيانات</th>
                                                <th>القيم</th>
                                            </tr>
                                        </thead>
                                        @if(isset($registration))
                                        <tbody>
                                                <tr>
                                                    <td>تم التآكيد</td>
                                                    <td>{{ $registration->confirmation && $registration->confirmation ? 'نعم' : 'لا' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهاتف</td>
                                                    <td>{{ $registration->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>الاسم</td>
                                                    <td>{{ $registration->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الميلاد</td>
                                                    <td>{{ $registration->birth_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>النوع</td>
                                                    <td>{{ $registration->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <td>التآمين الطبي</td>
                                                    <td>{{ $registration->medical_insurance ? 'يوجد' : 'لا يوجد' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم التآمين</td>
                                                    <td>{{$registration->n_insurance }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهوية</td>
                                                    <td>{{ $registration->n_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ</td>
                                                    <td>{{ $registration->price }} ريال</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td colspan="2">لا توجد بيانات متاحة حالياً.</td>
                                                </tr>
                                                @endif
                                        </tbody>
                                    </table>
                                </div>
>>>>>>> origin/main
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lighten" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl-3" tabindex="-1" role="dialog"
aria-labelledby="myExtraLargeModalLabel-2" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel-2">حجز جديد</h5>
        </div>
        <div class="modal-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('registrations.store') }}">
                                @csrf <!-- Add CSRF token for security -->
                                <table style="text-align: right;" class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>البيانات</th>
                                            <th>القيم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="day" id="bookingDay" value="">
                                        <input type="hidden" name="time_from" id="bookingTimeFrom"
                                            value="">
                                        <input type="hidden" name="time_to" id="bookingTimeTo"
                                            value="">
                                            <input type="hidden" name="doctor_name" value="">
                                            <input type="hidden" name="service_name" value="">
                                            <input type="hidden" name="branch_name" value="">
                                        <tr>
                                            <td>تم التآكيد</td>
                                            <td>
                                                <select name="confirmation" class="form-control selectpicker">
                                                    <option value="نعم">نعم</option>
                                                    <option value="لا">لا</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهاتف</td>
                                            <td>
                                                <input type="text" name="phone" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الاسم</td>
                                            <td>
                                                <input type="text" name="name" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>البريد الالكتروني</td>
                                            <td>
                                                <input type="email" name="email" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>تاريخ الميلاد</td>
                                            <td>
                                                <input type="date" name="birth_date" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>النوع</td>
                                            <td>
                                                <select name="gender" class="form-control selectpicker">
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="أنثى">أنثى</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>التآمين الطبي</td>
                                            <td>
                                                <select name="medical_insurance"
                                                    class="form-control selectpicker">
                                                    <option value="نعم">نعم</option>
                                                    <option value="لا">لا</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>رقم التآمين</td>
                                            <td>
                                                <input type="text" name="n_insurance"
                                                    class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهوية</td>
                                            <td>
                                                <input type="text" name="n_id" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>المبلغ</td>
                                            <td>
                                                <input type="number" name="price" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="active" value="1" class="form-control">
                                <input type="submit" class="btn btn-info btn-sm" onclick="updateHiddenFields();" value="Submit">
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-lighten" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</div>
</div>
<div class="modal fade bd-example-modal-xl-2" id="waitingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel">حجز ميعاد</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('registrations.storeWaitlist') }}">
                        @csrf <!-- Add CSRF token for security -->
                        <table style="text-align: right;" class="table m-0">
                            <thead>
                                <tr>
                                    <th>البيانات</th>
                                    <th>القيم</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="day" id="bookingDay" value="">
                                <input type="hidden" name="time_from" id="bookingTimeFrom"
                                    value="">
                                <input type="hidden" name="time_to" id="bookingTimeTo"
                                    value="">
                                    <input type="hidden" name="doctor_name" value="">
                                    <input type="hidden" name="service_name" value="">
                                    <input type="hidden" name="branch_name" value="">
                                <tr>
                                    <td>تم التآكيد</td>
                                    <td>
                                        <select name="confirmation" class="form-control selectpicker">
                                            <option value="نعم">نعم</option>
                                            <option value="لا">لا</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم الهاتف</td>
                                    <td>
                                        <input type="text" name="phone" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>الاسم</td>
                                    <td>
                                        <input type="text" name="name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>البريد الالكتروني</td>
                                    <td>
                                        <input type="email" name="email" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاريخ الميلاد</td>
                                    <td>
                                        <input type="date" name="birth_date" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>النوع</td>
                                    <td>
                                        <select name="gender" class="form-control selectpicker">
                                            <option value="ذكر">ذكر</option>
                                            <option value="أنثى">أنثى</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>التآمين الطبي</td>
                                    <td>
                                        <select name="medical_insurance"
                                            class="form-control selectpicker">
                                            <option value="نعم">نعم</option>
                                            <option value="لا">لا</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم التآمين</td>
                                    <td>
                                        <input type="text" name="n_insurance"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم الهوية</td>
                                    <td>
                                        <input type="text" name="n_id" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>المبلغ</td>
                                    <td>
                                        <input type="number" name="price" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>الوقت</td>
                                    <td>
                                        <input type="time" name="from_time" class="form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="active" value="1" class="form-control">
                        <input type="submit" class="btn btn-info btn-sm" onclick="updateHiddenFields();" value="Submit">
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

    <!-- Reservation Inputs -->


    <!-- Waiting List Modal -->
<div class="modal fade bd-example-modal-xl-2" id="waitingListModal" tabindex="-1" role="dialog" aria-labelledby="waitingListModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="waitingListModalLabel">عرض قائمة الانتظار</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="waitingListModalContent">
            @if (isset($registraionwait))
            @foreach ($registraionwait as $index=>$registration )

            <table style="text-align: right;" class="table m-0">
                <thead>
                    <tr>

                        <th>البيانات</th>
                        <th>القيم</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($registration))
                    <tr>
                        <td> رقم العميل</td>
                        <td>{{ $index+1 }}</td>
                    </tr>
                        <tr>

                            <td>تم التأكيد</td>
                            <td>{{ $registration->confirmation ? 'نعم' : 'لا' }}</td>
                        </tr>
                        <tr>
                            <td>رقم الهاتف</td>
                            <td>{{ $registration->phone }}</td>
                        </tr>
                        <tr>
                            <td>الاسم</td>
                            <td>{{ $registration->name }}</td>
                        </tr>
                        <tr>
                            <td>تاريخ الميلاد</td>
                            <td>{{ $registration->birth_date }}</td>
                        </tr>
                        <tr>
                            <td>النوع</td>
                            <td>{{ $registration->gender }}</td>
                        </tr>
                        <tr>
                            <td>التأمين الطبي</td>
                            <td>{{ $registration->medical_insurance ? 'يوجد' : 'لا يوجد' }}</td>
                        </tr>
                        <tr>
                            <td>رقم التأمين</td>
                            <td>{{ $registration->n_insurance }}</td>
                        </tr>
                        <tr>
                            <td>رقم الهوية</td>
                            <td>{{ $registration->n_id }}</td>
                        </tr>
                        <tr>
                            <td>المبلغ</td>
                            <td>{{ $registration->price }} ريال</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2">لا توجد بيانات متاحة حالياً.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            @endforeach
                        @endif
        </div>
    </div>
</div>
</div>

<!-- Booking Modal -->


=======
                <div class="modal-footer">
                    <button type="button" class="btn btn-lighten" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Inputs -->
    <div class="modal fade bd-example-modal-xl-2" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel-2">حجز جديد</h5>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST" action="{{ route('registrations.store') }}">
                                        @csrf <!-- Add CSRF token for security -->
                                        <table style="text-align: right;" class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>البيانات</th>
                                                    <th>القيم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" name="day" id="bookingDay" value="">
                                                <input type="hidden" name="time_from" id="bookingTimeFrom"
                                                    value="">
                                                <input type="hidden" name="time_to" id="bookingTimeTo"
                                                    value="">
                                                    <input type="hidden" name="doctor_name" value="">
                                                    <input type="hidden" name="service_name" value="">
                                                    <input type="hidden" name="branch_name" value="">
                                                <tr>
                                                    <td>تم التآكيد</td>
                                                    <td>
                                                        <select name="confirmation" class="form-control selectpicker">
                                                            <option value="نعم">نعم</option>
                                                            <option value="لا">لا</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهاتف</td>
                                                    <td>
                                                        <input type="text" name="phone" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>الاسم</td>
                                                    <td>
                                                        <input type="text" name="name" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>البريد الالكتروني</td>
                                                    <td>
                                                        <input type="email" name="email" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الميلاد</td>
                                                    <td>
                                                        <input type="date" name="birth_date" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>النوع</td>
                                                    <td>
                                                        <select name="gender" class="form-control selectpicker">
                                                            <option value="ذكر">ذكر</option>
                                                            <option value="أنثى">أنثى</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>التآمين الطبي</td>
                                                    <td>
                                                        <select name="medical_insurance"
                                                            class="form-control selectpicker">
                                                            <option value="نعم">نعم</option>
                                                            <option value="لا">لا</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>رقم التآمين</td>
                                                    <td>
                                                        <input type="text" name="n_insurance"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهوية</td>
                                                    <td>
                                                        <input type="text" name="n_id" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ</td>
                                                    <td>
                                                        <input type="number" name="price" class="form-control">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn btn-info btn-sm" onclick="updateHiddenFields();" value="Submit">
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lighten" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
>>>>>>> origin/main


    <!-- *************
    ************ Required JavaScript Files *************
   ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('web_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/nav.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/moment.js') }}"></script>

    <!-- Daterange -->
    <script src="{{ asset('web_assets/vendor/daterange/daterange.js') }}"></script>

    <!-- Fullcalendar -->
    <script src="{{ asset('web_assets/vendor/calendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('web_assets/vendor/calendar/js/custom-calendar.js') }}"></script>

    <!-- Main Js Required -->
    <script src="{{ asset('web_assets/js/main.js') }}"></script>
    <script>
<<<<<<< HEAD
        function bookAppointment(day, timeFrom) {
            // Update hidden input values with selected appointment details
            document.getElementById('bookingDay').value = day;
            document.getElementById('bookingTimeFrom').value = timeFrom;

=======
        function bookAppointment(day, timeFrom, timeTo) {
            // Update hidden input values with selected appointment details
            document.getElementById('bookingDay').value = day;
            document.getElementById('bookingTimeFrom').value = timeFrom;
            document.getElementById('bookingTimeTo').value = timeTo;
>>>>>>> origin/main
            // Submit the form automatically
            document.getElementById('bookingForm').submit();
        }
    </script>
<<<<<<< HEAD

=======
>>>>>>> origin/main
    <script>
        // Function to update hidden input fields with selected values
        function updateHiddenFields() {
            var selectedDoctor = document.querySelector('[name="doctor_id"]').selectedOptions[0].textContent;
            var selectedService = document.querySelector('[name="service_id"]').selectedOptions[0].textContent;
            var selectedBranch = document.querySelector('[name="branch_id"]').selectedOptions[0].textContent;
<<<<<<< HEAD
            var selectedDay = document.getElementById('bookingDay').value; // Get selected day
=======
>>>>>>> origin/main

            document.querySelector('[name="doctor_name"]').value = selectedDoctor;
            document.querySelector('[name="service_name"]').value = selectedService;
            document.querySelector('[name="branch_name"]').value = selectedBranch;
<<<<<<< HEAD
            document.querySelector('[name="day"]').value = selectedDay; // Update day value
        }

        // Add event listener to update hidden fields when dropdown selections change
=======
        }

        // Add event listeners to update hidden fields when dropdown selections change
>>>>>>> origin/main
        document.addEventListener('DOMContentLoaded', function () {
            var selectDoctor = document.querySelector('[name="doctor_id"]');
            var selectService = document.querySelector('[name="service_id"]');
            var selectBranch = document.querySelector('[name="branch_id"]');

            selectDoctor.addEventListener('change', updateHiddenFields);
            selectService.addEventListener('change', updateHiddenFields);
            selectBranch.addEventListener('change', updateHiddenFields);
        });
    </script>
<<<<<<< HEAD
<script>
    function populateRegistrationModal(registrationJson) {
        var registration = JSON.parse(registrationJson); // Parse JSON string to object

        // Get modal body and update its content with the registration details
        var modalBody = document.getElementById('registrationDetails');
        modalBody.innerHTML = `
            <div class="card-body">
                <div class="table-responsive">
                    <table style="text-align: right;" class="table m-0">
                        <thead>
                            <tr>
                                <th>البيانات</th>
                                <th>القيم</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>تم التأكيد</td>
                                <td>${registration.confirmation ? 'نعم' : 'لا'}</td>
                            </tr>
                            <tr>
                                <td>رقم الهاتف</td>
                                <td>${registration.phone}</td>
                            </tr>
                            <tr>
                                <td>الاسم</td>
                                <td>${registration.name}</td>
                            </tr>
                            <tr>
                                <td>اسم الدكتور</td>
                                <td>${registration.doctor_name}</td>
                            </tr>
                            <tr>
                                <td>اسم الخدمة</td>
                                <td>${registration.service_name}</td>
                            </tr>
                            <tr>
                                <td>اسم الفرع</td>
                                <td>${registration.branch_name}</td>
                            </tr>
                            <tr>
                                <td>تاريخ الميلاد</td>
                                <td>${registration.birth_date}</td>
                            </tr>
                            <tr>
                                <td>النوع</td>
                                <td>${registration.gender}</td>
                            </tr>
                            <tr>
                                <td>التأمين الطبي</td>
                                <td>${registration.medical_insurance ? 'يوجد' : 'لا يوجد'}</td>
                            </tr>
                            <tr>
                                <td>رقم التأمين</td>
                                <td>${registration.n_insurance}</td>
                            </tr>
                            <tr>
                                <td>رقم الهوية</td>
                                <td>${registration.n_id}</td>
                            </tr>
                            <tr>
                                <td>المبلغ</td>
                                <td>${registration.price} ريال</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;
    }
</script>

=======
>>>>>>> origin/main


</body>

</html>
