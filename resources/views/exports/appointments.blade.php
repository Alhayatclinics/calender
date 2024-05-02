<!-- resources/views/exports/appointments.blade.php -->

<table class="table table-bordered">
    <thead>
        <tr>
            <th>اليوم</th>
            <th>التاريخ</th>
            @foreach ($uniqueTimes as $time)
                <th>{{ $time }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($daysWithData as $dayData)
            <tr>
                <td>{{ $dayData['dayOfWeek'] }}</td>
                <td>{{ $dayData['date'] }}</td>
                @foreach ($uniqueTimes as $time)
                    @php
                        $matchesExpectedInterval = false;
                        $bookingDetails = null;
                        foreach ($dayData['appointments'] as $appointment) {
                            if (isset($appointment['time_data'])) {
                                foreach ($appointment['time_data'] as $interval) {
                                    if ($interval['from'] == $time) {
                                        $matchesExpectedInterval = true;
                                        $hasRegistrations = \App\Models\Registration::where('day', $dayData['date'])
                                            ->where('time_from', $time)
                                            ->exists();
                                        if ($hasRegistrations) {
                                            // Get the first registration for the given day and time
                                            $bookingDetails = \App\Models\Registration::where('day', $dayData['date'])
                                                ->where('time_from', $time)
                                                ->first();
                                        }
                                        break 2; // Break both inner and outer loop
                                    }
                                }
                            }
                        }
                    @endphp
                    <td style="background-color: {{ $matchesExpectedInterval ? 'lightgreen' : 'red' }};">
                        @if ($matchesExpectedInterval)
                            @if ($hasRegistrations && $bookingDetails)
                                <!-- Display registered user's name and phone number -->
                                <span>اسم: {{ $bookingDetails->name }}</span><br>
                                <span>رقم الهاتف: {{ $bookingDetails->phone }}</span><br>
                                <span>اسم الدكتور: {{ $bookingDetails->doctor_name }}</span><br>
                                <span>اسم الخدمة: {{ $bookingDetails->service_name }}</span><br>
                                <span>اسم الفرع: {{ $bookingDetails->branch_name }}</span><br>
                                <span>رقم الهوية: {{ $bookingDetails->n_id }}</span><br>
                                <span>تاريخ الميلاد: {{ $bookingDetails->birth_date }}</span><br>
                                <span> السعر: {{ $bookingDetails->price }}</span><br>
                                <span>تم تاكيد الدفع: {{ $bookingDetails->confirmation }}</span>


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
