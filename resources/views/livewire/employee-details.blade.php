<!-- employee-details.blade.php -->

<div>
    <h2>Employee Details</h2>

    <div>
        <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
        <p><strong>Birthday:</strong> {{ $employee->birthday }}</p>
        <p><strong>Gender:</strong> {{ $employee->gender }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
        <p><strong>Address:</strong> {{ $employee->address }}</p>
        <p><strong>Address Number:</strong> {{ $employee->address_number }}</p>
        <p><strong>City:</strong> {{ $employee->city }}</p>
        <p><strong>State:</strong> {{ $employee->state }}</p>
        <p><strong>Zip:</strong> {{ $employee->zip }}</p>
        <p><strong>Emergency Contact Name:</strong> {{ $employee->emergency_contact_name }}</p>
        <p><strong>Emergency Contact Number:</strong> {{ $employee->emergency_contact_number }}</p>
        <p><strong>Years of Experience:</strong> {{ $employee->years_of_experience }}</p>
        <p><strong>Position:</strong> {{ $employee->position }}</p>
        <p><strong>Date of Joining:</strong> {{ $employee->date_of_joining }}</p>
    </div>
</div>
