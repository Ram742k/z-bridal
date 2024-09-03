<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>zbridalstudio</title>
        @livewireStyles
		<link rel="shortcut icon" href="assets/images/favicon.svg" />
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="assets/css/main.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
		<link rel="stylesheet" href="assets/vendor/toastify/toastify.css" />
		<link rel="stylesheet" href="assets/vendor/calendar/css/main.min.css" />
		<link rel="stylesheet" href="assets/vendor/calendar/css/custom.css" />

	</head>

	<body>
	@auth
    <script>
        // Assuming you have a user object with 'name' attribute
        const currentUser = {
            name: '{{ auth()->user()->name }}'
        };
    </script>
@endauth

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App header starts -->
			<div class="app-header d-flex align-items-center">

				<!-- Toggle buttons start -->
				<div class="d-flex">
					<button class="toggle-sidebar" id="toggle-sidebar">
						<i class="bi bi-list lh-1"></i>
					</button>
					<button class="pin-sidebar" id="pin-sidebar">
						<i class="bi bi-list lh-1"></i>
					</button>
				</div>
				<!-- Toggle buttons end -->

				<!-- App brand starts -->
				<div class="app-brand py-2 ms-3">
					<a href="index.html" class="d-sm-block d-none">
						<img src="assets/images/logo.png" class="logo" alt="Bootstrap Gallery" />
						
					</a>
					<a href="index.html" class="d-sm-none d-block">
						<img src="assets/images/logo.png" class="logo" alt="Bootstrap Gallery" />
					</a>
				</div>
				<!-- App brand ends -->

				<!-- App header actions start -->
				<div class="header-actions col">
					<div class="d-lg-flex d-none">
						<div class="dropdown">
							<a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-grid fs-4 lh-1 text-secondary"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<!-- Row start -->
								<div class="d-flex gap-2 m-2">
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="assets/images/brand-behance.svg" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="assets/images/brand-gatsby.svg" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="assets/images/brand-google.svg" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="assets/images/brand-bitcoin.svg" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="assets/images/brand-dribbble.svg" class="img-3x" alt="Admin Themes" />
									</a>
								</div>
								<!-- Row end -->
							</div>
						</div>
						<div class="dropdown border-start">
							<a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-exclamation-triangle fs-4 lh-1 text-secondary"></i>
								<span class="count-label warning"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">
									Notifications
								</h5>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md bg-success rounded-circle me-3">
											<i class="bi bi-exclamation-triangle text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Rosalie Deleon</h6>
											<p class="mb-1">You have new order.</p>
											<p class="small m-0 text-secondary">30 mins ago</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md bg-danger rounded-circle me-3">
											<i class="bi bi-exclamation-octagon text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Donovan Stuart</h6>
											<p class="mb-1">Membership has been expired.</p>
											<p class="small m-0 text-secondary">2 days ago</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<div class="icon-box md bg-warning rounded-circle me-3">
											<i class="bi bi-exclamation-square text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Roscoe Richards</h6>
											<p class="mb-1">Payment pending. Pay now.</p>
											<p class="small m-0 text-secondary">3 days ago</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-primary">View all</a>
								</div>
							</div>
						</div>
						<div class="dropdown border-start">
							<a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-bell fs-4 lh-1 text-secondary"></i>
								<span class="count-label info"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">Upcoming Events</h5>
								<div id="upcomingBookingsContainer"></div>

							@php
    // Initialize an empty array to hold JSON-converted bookings
    $bookingsJson = [];

    // Iterate through each booking in the $bookings array
    foreach ($bookings as $booking) {
        // Push each booking data into the $bookingsJson array
        $bookingsJson[] = [
            'bridal_name' => $booking->bridal_name,
            'function' => $booking->function,
            'function_date' => $booking->function_date->format('Y-m-d'), // Format date as needed
            'place' => $booking->place,
			'address'=> $booking->address,
        ];
    }

    // Convert the $bookingsJson array to JSON format
    $bookingsJson = json_encode($bookingsJson);
@endphp


@push('scripts')
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var bookingsJson = @json($bookingsJson);

        // Parse JSON string into JavaScript array
        var bookings = JSON.parse(bookingsJson);
	// console.log('dsads',bookings);
    var today = new Date();
    var fiveDaysLater = new Date(today.getTime() + 5 * 24 * 60 * 60 * 1000); // 5 days later

	if (!Array.isArray(bookings)) {
    console.error('Bookings data is not an array or is empty.');
    return;
}

var upcomingBookings = bookings.filter(function(booking) {
    var bookingDate = new Date(booking.function_date.replace(/-/g, '/'));

    if (isNaN(bookingDate.getTime())) {
        console.error('Invalid date format for booking:', booking.function_date);
        return false;
    }

    return bookingDate >= today && bookingDate <= fiveDaysLater;
});

console.log('upcomingBookings',upcomingBookings);
    var fragment = document.createDocumentFragment();

    upcomingBookings.forEach(function(booking) {
        var div = document.createElement('div');
        div.classList.add('dropdown-item');
        div.innerHTML = `
            <div class="d-flex py-2 border-bottom">
                <div class="icon-box md bg-primary rounded-circle me-3">
                    <span class="fw-bold text-white">${booking.bridal_name.slice(0, 2)}</span>
                </div>
                <div class="m-0">
                    <h6 class="mb-1 fw-semibold">${booking.bridal_name}</h6>
                    <p class="mb-1">${booking.function}</p>
                    <p class="small m-0 fw-semibold">${booking.function_date}</p>
					<p class="small m-0 fw-semibold">${booking.place}</p>
					<p class="small m-0 fw-semibold">${booking.address}</p>
					
                </div>
            </div>
        `;
        fragment.appendChild(div);
    });
	
    // Append all elements at once
    // ...
    var upcomingBookingsContainer = document.getElementById('upcomingBookingsContainer');
    if (upcomingBookingsContainer) {
        upcomingBookingsContainer.textContent = ''; // Clear existing content
        upcomingBookingsContainer.appendChild(fragment); // Append all elements at once
    } else {
        console.error("Element with ID 'upcomingBookingsContainer' not found in the DOM.");
    }
});


</script>
@endpush
							</div>
						</div>
						<div class="dropdown border-start">
							<a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-envelope-open fs-4 lh-1 text-secondary"></i>
								<span class="count-label"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user3.png" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Angelia Payne</h6>
											<p class="mb-1">
												Membership has been ended.
											</p>
											<p class="small m-0 text-secondary">Today, 07:30pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user1.png" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
											<p class="mb-1">
												Congratulate, James for new job.
											</p>
											<p class="small m-0 text-secondary">Today, 08:00pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<img src="assets/images/user4.png" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
											<p class="mb-1">
												Lewis added new schedule release.
											</p>
											<p class="small m-0 text-secondary">Today, 09:30pm</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-primary">View all</a>
								</div>
							</div>
						</div>
					</div>
					<div class="dropdown ms-2">
						<a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/user.png" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
							<span class="ms-2 text-truncate d-lg-block d-none">{{ auth()->user()->name }}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end shadow-lg">
							<div class="header-action-links mx-3 gap-2">
								<a class="dropdown-item" href="profile.html"><i class="bi bi-person text-primary"></i>Profile</a>
								<a class="dropdown-item" href="settings.html"><i class="bi bi-gear text-danger"></i>Settings</a>
								<a class="dropdown-item" href="widgets.html"><i class="bi bi-box text-success"></i>Widgets</a>
							</div>
							<div class="mx-3 mt-2 d-grid">
								<a href="login.html" class="btn btn-primary btn-sm">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!-- App header actions end -->

			</div>
			<!-- App header ends -->

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">

					<!-- Sidebar profile starts -->
					<div class="shop-profile">
						<p class="mb-1 fw-bold text-primary">z bridal</p>
						<p class="m-0">Praiyur Road, Usilai</p>
					</div>
					<!-- Sidebar profile ends -->

					<!-- Sidebar menu starts -->
					<div class="sidebarMenuScroll">
						<ul class="sidebar-menu">
							<li class="active current-page">
								<a href="index.html">
									<i class="bi bi-pie-chart"></i>
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#!">
								<i class="bi bi-person-square"></i>
									<span class="menu-text">Employee</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{url('employee')}}">Employee Add</a>
									</li>
									<li>
										<a href="{{route('employee.list')}}">Employee Manage</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{url('attendance')}}">
									<i class="bi bi-person-square"></i>
									<span class="menu-text">Attendance</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bi bi-person-square"></i>
									<span class="menu-text">Customer</span>
								</a>
							</li>
							<li>
								<a href="{{route('bridal_booking')}}">
									<i><svg xmlns="http://www.w3.org/2000/svg" height="25" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.87"><path fill-rule="nonzero" d="M154.2 169.38h96.72L306.4 48.2c-25.43-20.11-60.13-30.54-96.35-31.61v81.74c0 4.61-3.66 8.35-8.18 8.35s-8.19-3.74-8.19-8.35V16.74c-35.88 1.69-71.92 12.39-100.84 31.79l61.36 120.85zm1.92 260.25h91.78V232.88h-91.78v196.75zm91.78 16.49h-91.78v27.09h91.78v-27.09zm16.49-157.61 71.96-63.69c3.39-3.01 8.58-2.69 11.59.71 3.01 3.39 2.69 8.59-.71 11.59l-82.84 73.34v32.65c.84.23 1.65.61 2.39 1.16a88.901 88.901 0 0 0 24.79 12.7 89.027 89.027 0 0 0 27.55 4.34c24.52 0 46.71-9.93 62.77-26 16.06-16.06 25.99-38.25 25.99-62.76 0-24.51-9.93-46.71-25.99-62.77-16.06-16.06-38.26-26-62.77-26-9.87 0-19.34 1.6-28.12 4.53a88.83 88.83 0 0 0-25.23 13.26c-.44.33-.9.6-1.38.82v33.35l29.97-26.87c3.38-3.03 8.58-2.74 11.6.64 3.02 3.38 2.74 8.57-.64 11.59l-38.91 34.89c-.62.55-1.3 1-2.02 1.33v31.19zm0-103.65c6.84-4.28 14.21-7.78 21.98-10.38 10.34-3.44 21.36-5.32 32.75-5.32 28.55 0 54.4 11.58 73.1 30.29 18.71 18.7 30.29 44.55 30.29 73.1 0 28.55-11.58 54.39-30.29 73.1-18.7 18.71-44.55 30.28-73.1 30.28-11.16 0-21.94-1.79-32.06-5.08-8.02-2.62-15.63-6.2-22.67-10.6v37.9c.49.1.98.25 1.46.45 8.3 3.51 17.01 6.23 26.03 8.05 8.7 1.76 17.82 2.68 27.24 2.68 37.77 0 71.98-15.31 96.73-40.06s40.06-58.95 40.06-96.72c0-37.78-15.31-71.98-40.06-96.73-24.75-24.74-58.95-40.06-96.73-40.06-6.43 0-12.67.43-18.69 1.25-6.23.85-12.33 2.12-18.26 3.78l-.1.03-17.68 38.61v5.43zm25.37-60.85c2.88-.56 5.79-1.05 8.73-1.45 6.83-.93 13.73-1.42 20.63-1.42 41.81 0 79.67 16.95 107.06 44.35 27.4 27.4 44.35 65.25 44.35 107.06 0 41.8-16.95 79.66-44.35 107.06a151.738 151.738 0 0 1-43.88 30.57h122.39c4.04 0 7.31 3.27 7.31 7.31v6.33c0 17.87-7.31 34.11-19.07 45.88-11.8 11.76-28.03 19.07-45.88 19.07H253.36c-1.71.6-3.55.93-5.46.93h-91.78c-4.53 0-8.67-1.85-11.65-4.84-2.98-2.97-4.84-7.1-4.84-11.65V177.63l.02-.58L74.93 49.59c-1.84-3.64-.71-8 2.48-10.33C112.74 13.26 158.98 0 203.79 0c44.5 0 87.85 13.07 118.15 39.71 2.96 2.6 3.6 6.86 1.76 10.17l-33.94 74.13zm-25.4 350.14h182.69c13.85 0 26.43-5.66 35.56-14.78 8.89-8.92 14.5-21.13 14.76-34.57H264.39v48.41l-.03.94zM5.67 289.73h8.6v-72.39c0-2.96 2.4-5.36 5.36-5.36h10.25V104.45c19.1 3.04 37.17 13.46 53.38 36.63v70.9h8.31c2.95 0 5.36 2.4 5.36 5.36v72.39h9.75c3.13 0 5.68 2.55 5.68 5.67v188.8c0 3.13-2.55 5.67-5.68 5.67H5.67c-3.12-.03-5.67-2.57-5.67-5.7V295.4c0-3.12 2.55-5.67 5.67-5.67zm19.28 0h61.26v-67.07H24.95v67.07zm131.17-73.35h91.78v-27.09l-91.78.02v27.07z"/></svg></i>
									<span class="menu-text">Bridal Booking</span>
								</a>
							</li>
							<li>
								<a href="{{url('bridal_booking_calendar')}}">
									<i class="bi bi-box"></i>
									<span class="menu-text">Booking Calander</span>
								</a>
							</li>
							<li>
								<a href="{{url('expense')}}">
									<i class="bi bi-calendar2"></i>
									<span class="menu-text">Expense</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#!">
									<i class="bi bi-stickies"></i>
									<span class="menu-text">Reports</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('sales_report')}}">Services Report</a>
									</li>
									<li>
										<a href="{{route('expense_report')}}">Expense Report</a>
									</li>
									<li>
										<a href="buttons.html">Buttons</a>
									</li>
									<li>
										<a href="badges.html">Badges</a>
									</li>
									<li>
										<a href="carousel.html">Carousel</a>
									</li>
									<li>
										<a href="list-items.html">List Items</a>
									</li>
									<li>
										<a href="progress.html">Progress Bars</a>
									</li>
									<li>
										<a href="popovers.html">Popovers</a>
									</li>
									<li>
										<a href="tooltips.html">Tooltips</a>
									</li>
								</ul>
							</li>
							
							<li class="treeview">
								<a href="#!">
									<i class="bi bi-window-sidebar"></i>
									<span class="menu-text">Invoices</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{url('invoice')}}">Create Invoice</a>
									</li>
									<li>
										<a href="view-invoice.html">View Invoice</a>
									</li>
									<li>
										<a href="{{url('invoice_list')}}">Invoice List</a>
									</li>
								</ul>
							</li>
							
						</ul>
					</div>
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->

				<!-- App container starts -->
				<div class="app-container">
					<!-- App hero header starts -->
					<div class="app-hero-header d-flex align-items-center">
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.html" class="text-decoration-none">Home</a>
							</li>
							<li class="breadcrumb-item text-secondary" aria-current="page">
								Dashboard
							</li>
						</ol>
						<!-- Breadcrumb end -->

						<!-- Sales stats start -->
						<!-- <div class="ms-auto d-lg-flex d-none flex-row">
							<div class="d-flex flex-row gap-2">
								<button class="btn btn-sm btn-primary">Today</button>
								<button class="btn btn-sm btn-white">7d</button>
								<button class="btn btn-sm btn-white">2w</button>
								<button class="btn btn-sm btn-white">1m</button>
								<button class="btn btn-sm btn-white">3m</button>
								<button class="btn btn-sm btn-white">6m</button>
								<button class="btn btn-sm btn-white">1y</button>
							</div>
						</div> -->
						<!-- Sales stats end -->

					</div>
					<!-- App Hero header ends -->