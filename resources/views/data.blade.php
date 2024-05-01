<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
        <meta name="author" content="ParkerThemes">
        <link rel="shortcut icon" href="{{ asset('web_assets/img/fav.png') }}" />

        <title>Bitrix - Calendar</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('web_assets/css/bootstrap.min.css') }}">

        <!-- Custom Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/fonts/Cairo.css') }}">

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('web_assets/css/main.css') }}">

        <!-- Daterange CSS -->
        <link rel="stylesheet" href="{{ asset('web_assets/vendor/daterange/daterange.css') }}">

        <!-- Fullcalendar CSS -->
        <link rel="stylesheet" href="{{ asset('web_assets/vendor/calendar/css/fullcalendar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web_assets/vendor/calendar/css/custom-calendar.css') }}">

        <!-- Google Fonts Preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

        <style>
            .form-group {
                text-align: right;
            }
            input,label,h1,h2,h3,h4,h5,h6,a,button,select,option,td,th,tr {
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

			<div class="main-container">

				<div class="content-wrapper">
					<!-- Branches -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="card">
							<div class="card-body">

								<div style="display: flex;justify-content: space-between">
									<h2>الفروع</h2>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-branch">اضافه فرع</button>
									<div class="modal fade bd-example-modal-xl-branch" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-branch" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-branch">Create Branch</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

    <form method="POST" action="{{ route('branches.store') }}">
        @csrf <!-- CSRF protection -->

        <div class="form-group">
            <label for="name">اسم الفرع:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الفرع">
        </div>

        <button type="submit" class="btn btn-info btn-sm mt-4">إضافة الفرع</button>
    </form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">

    <table class="table m-0">
        <thead>
            <tr>
                <th>اسم الفرع</th>
                <th>تحديثات</th>
            </tr>
        </thead>
        <tbody>
            @if ($branches->isEmpty())
            <p>لا توجد فروع متاحة حالياً.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم الفرع</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $branch->name }}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-branch-edit">تعديل فرع</button>
                                    <a href="{{ route('branches.destroy', $branch->id) }}" class="btn btn-danger">حذف</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        </tbody>
    </table>
									<!-- Edit Branches -->
									<div class="modal fade bd-example-modal-xl-branch-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-branch-edit" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-branch-edit">تعديل فرع</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                    @if(isset($branch))
                                                    <form method="POST" action="{{ route('branches.update', $branch->id) }}">
                                                        @csrf
                                                        @method('PUT') <!-- Use PUT method for update -->

                                                        <div class="form-group">
                                                            <label for="name">اسم الفرع:</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $branch->name }}" placeholder="اسم الفرع">
                                                        </div>

                                                        <button type="submit" class="btn btn-danger btn-sm mt-4">حفظ التغييرات</button>
                                                    </form>
                                                @else
                                                    <p>الفرع غير موجود.</p>
                                                @endif

												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div class="content-wrapper mt-5">
					<!-- Doctors -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="card">
							<div class="card-body">

								<div style="display: flex;justify-content: space-between">
									<h2>الاطباء</h2>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-doctor">اضافه طبيب</button>
									<div class="modal fade bd-example-modal-xl-doctor" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-doctor" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-doctor">Create doctor</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                    <form method="POST" action="{{ route('doctors.store') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="branch_id">الفرع:</label>
                                                            <select class="form-control selectpicker" name="branch_id">
                                                                <option selected disabled>اختر الفرع</option>
                                                                @foreach($branches as $branch)
                                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">اسم الطبيب:</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الطبيب">
                                                        </div>
                                                        <button type="submit" class="btn btn-info btn-sm mt-4">إضافة الطبيب</button>
                                                    </form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>اسم الفرع</th>
                                                <th>اسم الطبيب</th>
                                                <th>تحديثات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->branch->name }}</td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>
                                                    <div>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-doctor-edit">تعديل طبيب</button>
                                                        <a href="{{ route('doctors.destroy', $doctor->id) }}" class="btn btn-danger">حذف</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
									<!-- Edit doctores -->
									<div class="modal fade bd-example-modal-xl-doctor-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-doctor-edit" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-doctor-edit">تعديل طبيب</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                    <form method="POST" action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : '' }}">
                                                        @csrf
                                                        @method('PUT') <!-- Use PUT method for update -->

                                                        <div class="form-group">
                                                            <label for="branch_id">الفرع:</label>
                                                            <select class="form-control selectpicker" name="branch_id">
                                                                @foreach($branches as $branch)
                                                                    <option value="{{ $branch->id }}" {{ isset($doctor) && $doctor->branch_id == $branch->id ? 'selected' : '' }}>
                                                                        {{ $branch->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">اسم الطبيب:</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($doctor) ? $doctor->name : '' }}" placeholder="اسم الطبيب">
                                                        </div>

                                                        <button type="submit" class="btn btn-info btn-sm mt-4">{{ isset($doctor) ? 'حفظ التغييرات' : 'إنشاء' }}</button>
                                                    </form>

												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div class="content-wrapper mt-5">
					<!-- Services -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="card">
							<div class="card-body">

								<div style="display: flex;justify-content: space-between">
									<h2>الخـدمات</h2>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-service">اضافه خدمه</button>
									<div class="modal fade bd-example-modal-xl-service" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-service" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-service">Create service</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

<form method="POST" action="{{ route('services.store') }}">
    @csrf

    <div class="form-group">
        <label for="branch_id">اختر الفرع:</label>
        <select class="form-control" id="branch_id" name="branch_id">
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-4">
        <label for="doctor_id">اختر الطبيب:</label>
        <select class="form-control" id="doctor_id" name="doctor_id">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-4">
        <label for="name">اسم الخدمة:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="اسم الخدمة">
    </div>
    <div class="form-group mt-4">
        <label for="editBranch">المدة الزمنية:</label>
        <select class="form-control" id="editBranch" name="duration">
                <option value="30">30</option>
                <option value="45">45</option>
                <option value="60">60</option>
                <option value="75">75</option>
                <option value="90">90</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info btn-sm mt-4">حفظ الخدمة</button>
</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
<table class="table m-0">
    <thead>
        <tr>
            <th>اسم الفرع</th>
            <th>اسم الطبيب</th>
            <th>اسم الخدمة</th>
            <th>المعدل الزمني</th>
            <th>تحديثات</th>
        </tr>
    </thead>
    <tbody>
        @if($services->isEmpty())
            <tr>
                <td colspan="4">لا توجد خدمات لعرضها.</td>
            </tr>
        @else
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->branch->name }}</td>
                    <td>{{ $service->doctor->name }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->duration }} دقيقة</td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editServiceModal{{ $service->id }}">تعديل خدمة</button>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Edit Service Modal -->
                <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editServiceModalLabel">تعديل خدمة - {{ $service->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your edit form here -->
                                <form method="POST" action="{{ route('services.update', $service->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Editable fields (e.g., name) -->
                                    <div class="form-group">
                                        <label for="editName">اسم الخدمة:</label>
                                        <input type="text" class="form-control" id="editName" name="name" value="{{ $service->name }}">
                                    </div>

                                    <!-- Doctor selection -->
                                    <div class="form-group">
                                        <label for="editDoctor">الطبيب:</label>
                                        <select class="form-control" id="editDoctor" name="doctor_id">
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ $service->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Branch selection -->
                                    <div class="form-group">
                                        <label for="editBranch">الفرع:</label>
                                        <select class="form-control" id="editBranch" name="branch_id">
                                            @foreach($branches as $branch)
                                                <option value="{{ $branch->id }}" {{ $service->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editBranch">المدة الزمنية:</label>
                                        <select class="form-control" id="editBranch" name="duration">
                                                <option value="30">30</option>
                                                <option value="45">45</option>
                                                <option value="60">60</option>
                                                <option value="75">75</option>
                                                <option value="90">90</option>
                                        </select>
                                    </div>



                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-info">حفظ التغييرات</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </tbody>

</table>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div class="content-wrapper mt-5">

					<!-- Appointments -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="card">
							<div class="card-body">

								<div style="display: flex;justify-content: space-between">
									<h2>المواعيد</h2>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-appointment">اضافه موعد</button>
									<div class="modal fade bd-example-modal-xl-appointment" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-appointment" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-appointment">Create appointment</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                    <form method="POST" action="{{ route('appointments.store') }}">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="branch">اختر الفرع:</label>
                                                            <select class="form-control" id="branch" name="branch_id">
                                                                @foreach($branches as $branch)
                                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="doctor">اختر الطبيب:</label>
                                                            <select class="form-control" id="doctor" name="doctor_id">
                                                                @foreach($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="service">اختر الخدمة:</label>
                                                            <select class="form-control" id="service" name="service_id">
                                                                @foreach($services as $service)
                                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="date">تاريخ الحجز:</label>
                                                            <input type="date" class="form-control" id="date" name="date">
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="from_hour">من الساعة:</label>
                                                            <input type="time" class="form-control" id="from_hour" name="from_hour">
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="to_hour">إلى الساعة:</label>
                                                            <input type="time" class="form-control" id="to_hour" name="to_hour">
                                                        </div>

                                                        <button type="submit" class="btn btn-info btn-sm mt-4">حفظ الحجز</button>
                                                    </form>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>اسم الفرع</th>
                                                <th>اسم الطبيب</th>
                                                <th>اسم الخدمة</th>
                                                <th>التاريخ</th>
                                                <th>من</th>
                                                <th>الي</th>
                                                <th>تحديثات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->branch->name }}</td>
                                                <td>{{ $appointment->doctor->name }}</td>
                                                <td>{{ $appointment->service->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</td>
                                                <td>{{ $appointment->from_hour }}</td>
                                                <td>{{ $appointment->to_hour }}</td>
                                                <td>
                                                    <div>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl-appointment-edit">تعديل الموعد</button>
                                                        <a href="{{ route('appointments.destroy', $appointment->id) }}" class="btn btn-danger">حذف</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

									<!-- Edit appointmentes -->
									<div class="modal fade bd-example-modal-xl-appointment-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-appointment-edit" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="myExtraLargeModalLabel-appointment-edit">تعديل الموعد</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                    <form method="POST" action="{{ isset($appointment) ? route('appointments.update', $appointment->id) : '#' }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="form-group">
                                                            <label for="branch">اختر الفرع:</label>
                                                            <select class="form-control" id="branch" name="branch_id">
                                                                @foreach($branches as $branch)
                                                                    <option value="{{ $branch->id }}" {{ isset($appointment) && $branch->id == optional($appointment)->branch_id ? 'selected' : '' }}>
                                                                        {{ $branch->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="doctor">اختر الطبيب:</label>
                                                            <select class="form-control" id="doctor" name="doctor_id">
                                                                @foreach($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}" {{ isset($appointment) && $doctor->id == optional($appointment)->doctor_id ? 'selected' : '' }}>
                                                                        {{ $doctor->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="service">اختر الخدمة:</label>
                                                            <select class="form-control" id="service" name="service_id">
                                                                @foreach($services as $service)
                                                                    <option value="{{ $service->id }}" {{ isset($appointment) && $service->id == optional($appointment)->service_id ? 'selected' : '' }}>
                                                                        {{ $service->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="date">تاريخ الحجز:</label>
                                                            <input type="date" class="form-control" id="date" name="date" value="{{ isset($appointment) ? optional($appointment)->date : '' }}">
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="from_hour">من الساعة:</label>
                                                            <input type="time" class="form-control" id="from_hour" name="from_hour" value="{{ isset($appointment) ? optional($appointment)->from_hour : '' }}">
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label for="to_hour">إلى الساعة:</label>
                                                            <input type="time" class="form-control" id="to_hour" name="to_hour" value="{{ isset($appointment) ? optional($appointment)->to_hour : '' }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-info btn-sm mt-4">{{ isset($appointment) ? 'تحديث الحجز' : 'إنشاء' }}</button>
                                                    </form>



												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

        <script src="{{ asset('web_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/nav.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/moment.js') }}"></script>
        <script src="{{ asset('web_assets/vendor/daterange/daterange.js') }}"></script>

        <!-- Main Js Required -->
        <script src="{{ asset('web_assets/js/main.js') }}"></script>
	</body>
</html>
