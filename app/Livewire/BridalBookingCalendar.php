<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BridalBooking;

class BridalBookingCalendar extends Component
{
    public $bookings = [];

    public function mount()
    {
        $this->bookings = BridalBooking::all();
    }

    public function showCalendar()
    {
        $bookings = BridalBooking::all()->map(function ($booking) {
            return [
                'bridal_name' => $booking->bridal_name,
                'function' => $booking->function,
                'function_date' => $booking->function_date,
                'place' => $booking->place,
            ];
        });
    
        return view('your-view-name', compact('bookings'));
    }
   
    

    public function render()
    {
        return view('livewire.bridal-booking-calendar');
    }
}
