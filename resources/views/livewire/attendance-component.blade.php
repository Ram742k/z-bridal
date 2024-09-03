<!-- resources/views/livewire/attendance-component.blade.php -->

<div>
    <h1>Employee Attendance for {{ $date }}</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveAttendance">
        <table class="table">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Status</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                        <td>
                            <select id="status-{{ $employee->id }}" onchange="toggleInputs('{{ $employee->id }}')" class="form-control">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="leave">Leave</option>
                            </select>
                        </td>
                        <td>
                            <input type="time" id="check-in-{{ $employee->id }}" wire:model="attendance.{{ $employee->id }}.check_in" class="form-control" disabled />
                        </td>
                        <td>
                            <input type="time" id="check-out-{{ $employee->id }}" wire:model="attendance.{{ $employee->id }}.check_out" onkeyup="calculateTotalHours('{{ $employee->id }}')" class="form-control" disabled />
                        </td>
                        <td>
                            <input type="text" id="total-hours-{{ $employee->id }}" wire:model="attendance.{{ $employee->id }}.total_hours"  class="form-control" readonly />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>
</div>


    <script>
        function toggleInputs(employeeId) {
            var status = document.getElementById('status-' + employeeId).value;
            var checkInInput = document.getElementById('check-in-' + employeeId);
            var checkOutInput = document.getElementById('check-out-' + employeeId);

            if (status === 'present') {
                checkInInput.disabled = false;
                checkOutInput.disabled = false;
            } else {
                checkInInput.disabled = true;
                checkOutInput.disabled = true;
            }

            calculateTotalHours(employeeId);
        }

        function calculateTotalHours(employeeId) {
    var checkIn = document.getElementById('check-in-' + employeeId).value;
    var checkOut = document.getElementById('check-out-' + employeeId).value;
    var totalHoursInput = document.getElementById('total-hours-' + employeeId);

    console.log("Check In:", checkIn);
    console.log("Check Out:", checkOut);

    if (checkIn && checkOut) {
        var checkInTime = new Date('2000-01-01T' + checkIn + ':00Z');
        var checkOutTime = new Date('2000-01-01T' + checkOut + ':00Z');

        console.log("Check In Time:", checkInTime);
        console.log("Check Out Time:", checkOutTime);

        if (isNaN(checkInTime.getTime()) || isNaN(checkOutTime.getTime())) {
            console.error("Invalid date format or parsing error.");
            return;
        }

        var diffMs = checkOutTime - checkInTime;
        var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // milliseconds per hour

        console.log("Difference in Hours:", diffHrs);

        totalHoursInput.value = diffHrs;
    } else {
        totalHoursInput.value = 0;
    }
}

    </script>

