<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PDF; // Assuming you have barryvdh/laravel-dompdf installed
use League\Csv\Writer; // Import the Writer class

class SalesReportComponent extends Component
{
    public $startDate;
    public $endDate;
    public $salesReports = [];

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
        $this->fetchSalesReport();
    }

    public function fetchSalesReport()
    {
        $this->salesReports = Invoice::whereBetween('invoice_date', [$this->startDate, $this->endDate])
            ->get();
    }

    public function updatedStartDate()
    {
        $this->fetchSalesReport();
    }

    public function updatedEndDate()
    {
        $this->fetchSalesReport();
    }

    public function printReport()
    {
        // Dispatch browser event to trigger JavaScript print functionality
        $this->redirect('printReport');
    }

    public function downloadPdf()
    {
        $pdf = PDF::loadView('pdf.sales-report', ['salesReports' => $this->salesReports]);
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "sales-report-{$this->startDate}-to-{$this->endDate}.pdf"
        );
    }

    public function exportCsv()
    {
        $csv = Writer::createFromString('');
        $csv->insertOne(['Invoice Number', 'Invoice Date', 'Customer Name', 'Sales Person', 'Total Amount']);
    
        foreach ($this->salesReports as $report) {
            $csv->insertOne([
                $report->invoice_number,
                Carbon::parse($report->invoice_date)->format('d-m-Y'),
                $report->customer_name,
                $report->sales_person_name,
                number_format($report->total, 2)
            ]);
        }
        
        // dd($csv);
        $csv->output('sales-report.csv');

        return response()->streamDownload(function () use ($csv) {
            echo $csv;
        }, 'sales-report.csv');
    }
    
    public function render()
    {
        return view('livewire.sales-report-component');
    }
}