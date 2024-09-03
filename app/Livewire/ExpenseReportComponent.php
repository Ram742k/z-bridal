<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Expense;
use Carbon\Carbon;
use League\Csv\Writer;
use Illuminate\Support\Facades\Response;
use PDF;

class ExpenseReportComponent extends Component
{
    public $startDate;
    public $endDate;
    public $expenses = [];

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
        $this->fetchExpenses();
    }

    public function fetchExpenses()
    {
        $this->expenses = Expense::whereBetween('expense_date', [$this->startDate, $this->endDate])
            ->get();
    }

    public function updatedStartDate()
    {
        $this->fetchExpenses();
    }

    public function updatedEndDate()
    {
        $this->fetchExpenses();
    }

    public function printReport()
    {
        // Implement printing logic if needed
        // This might involve JavaScript or a dedicated printing library
        // For example, triggering a print dialog from the front-end
    }

    public function exportCsv()
    {
        $csv = Writer::createFromString('');
        $csv->insertOne(['Expense ID', 'Expense Date', 'Category', 'Amount']);

        foreach ($this->expenses as $expense) {
            $csv->insertOne([
                $expense->id,
                Carbon::parse($expense->expense_date)->format('d-m-Y'),
                $expense->category,
                number_format($expense->amount, 2),
            ]);
        }

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="expense-report.csv"',
        ];

        return Response::streamDownload(function () use ($csv) {
            echo "\xEF\xBB\xBF"; // UTF-8 BOM for Excel compatibility
            echo $csv->output();
        }, 'expense-report.csv', $headers);
    }

    public function downloadPdf()
    {
        $pdf = PDF::loadView('pdf.expense-report', ['expenses' => $this->expenses]);
        return $pdf->download("expense-report-{$this->startDate}-to-{$this->endDate}.pdf");
    }

    public function render()
    {
        return view('livewire.expense-report-component');
    }
}