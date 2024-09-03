
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    @include('layouts.haeder')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.css" rel="stylesheet">

</head>
<body>
<div class="app-body">
<livewire:bridal-booking-calendar />
</div>
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>
