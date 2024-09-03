<?php

namespace App\Http\Controllers;

use App\Models\BridalBooking;
use App\Models\Invoice;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Customers;

// use Mike42\Escpos\Printer;
// use Mike42\Escpos\PrintConnectors\FilePrintConnector;
// use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;



class AdminController extends Controller
{

    protected $bookings;

    public function __construct()
    {   $fiveDaysLater = now()->addDays(5)->format('Y-m-d');
        $this->bookings = BridalBooking::whereDate('function_date', '<=', $fiveDaysLater)
            ->get(['bridal_name', 'function', 'function_date', 'place','address']);
        // $this->bookings = BridalBooking::all(); // Or fetch bookings as per your requirement
    }

    public function employee()
    {
        return view('admin.employee_add', ['bookings' => $this->bookings]);
    }

    // public function printReceipt()
    // {
    //     try {
    //         // Replace 'your-printer-name' with your actual printer name or IP address
    //         $connector = new WindowsPrintConnector("pos");
    //         $printer = new Printer($connector);

    //         $printer->text("Hello, World!\n");
    //         $printer->cut();
            
    //         $printer->close();

    //         return "Printed successfully!";
    //     } catch (\Exception $e) {
    //         return "Error: " . $e->getMessage();
    //     }
    // }

    public function index()
{
    $online = Invoice::where('payment_method', 'online')->sum('total');
    $cash = Invoice::where('payment_method', 'cash')->sum('total');
    $sales = Invoice::sum('total');
    $startOfWeek = now()->startOfWeek();
    $endOfWeek = now()->endOfWeek();
    $weeklySales = [];
    for ($date = $startOfWeek; $date <= $endOfWeek; $date->addDay()) {
        $dailySales = Invoice::whereDate('invoice_date', $date)->sum('total');
        $weeklySales[$date->format('l')] = $dailySales; // Use the day name (e.g., 'Monday')
    }

    //mothly average
    $monthlySales = Invoice::whereMonth('invoice_date', now()->month)->sum('total');
       $monthlyAverage = $monthlySales / now()->daysInMonth;
       //decimal tow point
       $monthlyAverage = number_format($monthlyAverage, 2);


    //total employees
       $totalEmployees = Employee::count();

    //total expense
      $totalExpense = Expense::sum('amount');
       //previous month compare increase or decrese total expenses with '+' or '-'
       $previousMonthExpense = Expense::whereMonth('expense_date', now()->subMonth()->month)->sum('amount');
       //cuurent month expense
       $currentMonthExpense = Expense::whereMonth('expense_date', now()->month)->sum('amount');
        //previous month expense
       $previousMonthExpense = Expense::whereMonth('expense_date', now()->subMonth()->month)->sum('amount');
       //percentage change
       //compare with cuurent month and previous month amount is increase r decrtease
       $percentageChange = (($currentMonthExpense - $previousMonthExpense) / $previousMonthExpense) * 100;
          //decimal tow point
       $percentageChange = number_format($percentageChange, 2);
       //if percentage is negative change to positive
       if ($percentageChange < 0) {
        $percentageChange = abs($percentageChange);
    }
    else {
        $percentageChange = '+' . $percentageChange;
    }
     

    //customer
      $totalCustomers = Customers::count();


    return view('admin.dashboard', [
        'bookings' => $this->bookings,
        'online' => $online,
        'cash' => $cash,
        'sales' => $sales,
        'weeklySales' => $weeklySales,
        'monthlyAverage' => $monthlyAverage,
           'totalEmployees' => $totalEmployees,
           'totalExpense' => $totalExpense,
           'totalCustomers' => $totalCustomers,
           'percentageChange' => $percentageChange
    ]);

    
}


    public function employeeList()
    {
        return view('admin.employee_list', ['bookings' => $this->bookings]);
    }

    public function bridal_booking()
    {
        return view('admin.bridal_booking', ['bookings' => $this->bookings]);
    }

    public function expense()
    {
        return view('admin.expense', ['bookings' => $this->bookings]);
    }

    public function attendance()
    {
        return view('admin.attendance', ['bookings' => $this->bookings]);
    }

    public function invoice()
    {
        return view('admin.invoice', ['bookings' => $this->bookings]);
    }

    public function bridal_booking_calendar()
    {
        

        return view('admin.bridal_booking_calendar', ['bookings' => $this->bookings]);
    }

    public function upcomming()
    {
        return view('layouts.header', ['bookings' => $this->bookings]);
    }

    public function invoice_list(){

        return view('admin.invoice_list', ['bookings' => $this->bookings]);
    }

    public function invoice_print($invoice_id){

        $invoice = Invoice::findOrFail($invoice_id);

        return view('invoice', ['bookings' => $this->bookings,'invoice'=>$invoice]);
    }

    public function sales_report()
    {
        return view('admin.reports.sales_report', ['bookings' => $this->bookings]);
    }

    public function expense_report(){

        return view('admin.reports.expense_report', ['bookings' => $this->bookings]);
    }
}

