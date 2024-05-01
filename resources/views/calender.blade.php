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
                        <form method="GET" action="{{ route('appointments.show') }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputFrom">الفتره من</label>
                                                <input type="date" class="form-control" id="inputFrom"
                                                    name="from_date">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputTo">الفتره الي</label>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                                                    // Gather all unique 'from' and 'to' times
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
                                                            foreach ($dayData['appointments'] as $appointment) {
                                                                if (isset($appointment['time_data'])) {
                                                                    foreach ($appointment['time_data'] as $interval) {
                                                                        if ($interval['from'] == $time) {
                                                                            $matchesExpectedInterval = true;
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
                                                                        onclick="bookAppointment('{{ $dayData['date'] }}', '{{ $time }}', '{{ $time }}')">
                                                                        حجز ميعاد
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->


        <!-- *************
    ************ Main container end *************
    ************* -->


    </div>

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
        function bookAppointment(day, timeFrom, timeTo) {
            // Update hidden input values with selected appointment details
            document.getElementById('bookingDay').value = day;
            document.getElementById('bookingTimeFrom').value = timeFrom;
            document.getElementById('bookingTimeTo').value = timeTo;
            // Submit the form automatically
            document.getElementById('bookingForm').submit();
        }
    </script>
    <script>
        // Function to update hidden input fields with selected values
        function updateHiddenFields() {
            var selectedDoctor = document.querySelector('[name="doctor_id"]').selectedOptions[0].textContent;
            var selectedService = document.querySelector('[name="service_id"]').selectedOptions[0].textContent;
            var selectedBranch = document.querySelector('[name="branch_id"]').selectedOptions[0].textContent;

            document.querySelector('[name="doctor_name"]').value = selectedDoctor;
            document.querySelector('[name="service_name"]').value = selectedService;
            document.querySelector('[name="branch_name"]').value = selectedBranch;
        }

        // Add event listeners to update hidden fields when dropdown selections change
        document.addEventListener('DOMContentLoaded', function () {
            var selectDoctor = document.querySelector('[name="doctor_id"]');
            var selectService = document.querySelector('[name="service_id"]');
            var selectBranch = document.querySelector('[name="branch_id"]');

            selectDoctor.addEventListener('change', updateHiddenFields);
            selectService.addEventListener('change', updateHiddenFields);
            selectBranch.addEventListener('change', updateHiddenFields);
        });
    </script>


</body>

</html>
