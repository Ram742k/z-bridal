<div class="row gx-3">
							<div class="col-xxl-12">
								<!-- Card start -->
								<div class="card">
									<div class="card-body">
										<div id="dayGrid"></div>
									</div>
								</div>
								<!-- Card end -->
							</div>
						</div>
                        @push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("dayGrid");

        // Assuming $bookings is an array of booking objects passed from the controller
        var bookings = @json($bookings);

        console.log('Bookings:', bookings); // Debug: Log the bookings data to verify it

        var today = new Date().toISOString().slice(0, 10); // Today's date in YYYY-MM-DD format

        function daysBetween(date1, date2) {
            // Get the time difference in milliseconds
            var difference = new Date(date2) - new Date(date1);
            // Convert to days
            return Math.ceil(difference / (1000 * 60 * 60 * 24));
        }

        var events = bookings.map(function(booking) {
            var daysDiff = daysBetween(today, booking.function_date);
            var eventColor = (daysDiff >= 0 && daysDiff <= 7) ? 'red' : booking.color;

            return {
                title: booking.bridal_name + " - " + booking.makeup+ " - "+booking.place,
                start: booking.function_date,
                color: eventColor
            };
        });

        console.log('Events:', events); // Debug: Log the events data to verify it

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: "prevYear,prev,next,nextYear today",
                center: "title",
                right: "listDay,listWeek,listMonth",
            },
            initialView: 'listMonth', // Set the initial view to listMonth
            initialDate: today, // Set initial date to today
            navLinks: true,
            editable: true,
            dayMaxEvents: true,
            events: events,
            views: {
                listDay: { buttonText: 'Day' },
                listWeek: { buttonText: 'Week' },
                listMonth: { buttonText: 'Month' }
            }
        });

        calendar.render();
    });
</script>
@endpush


