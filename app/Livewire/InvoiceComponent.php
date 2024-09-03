<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class InvoiceComponent extends Component
{
    public $invoice_number;
    public $invoice_date;
    public $customer_name;
    public $customer_mobile;
    public $cutomer_email;
    public $customer_city;
    public $sales_person_id;
    public $sales_person_name;
    public $service_person_id;
    public $service_person_name;
    public $payment_method;
    public $items = []; // Array to hold items (service_name, price, tax, total)
    public $sub_total;
    public $tax_percentage;
    public $total_tax;
    public $total;

    public function mount()
    {
        $this->invoice_number = $this->generateInvoiceNumber();
        $this->invoice_date = Carbon::today()->format('d-m-Y');
        $this->items = [
            ['service_name' => '', 'price' => 0.00, 'tax' => 18, 'total' => 0.00]
        ];
        $this->calculateTotals();
    }

    public function generateInvoiceNumber()
    {
        return 'ZBS-' . str_pad(Invoice::max('id') + 1, 8, '0', STR_PAD_LEFT);
    }

    public function addItem()
    {
        $this->items[] = ['service_name' => '', 'price' => 0.00, 'tax' => 18, 'total' => 0.00];
        $this->calculateTotals();
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // reindex array
        $this->calculateTotals();
    }

    public function updatedItems()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->sub_total = 0.00;
        $this->total_tax = 0.00;
        $this->total = 0.00;
        $this->tax_percentage = 0.00;

        foreach ($this->items as $index => $item) {
            if (!$item['tax']) {
                $item['tax'] = 18;
            }
            $item_total = $item['price'] + ($item['price'] * $item['tax'] / 100);
            $this->items[$index]['total'] = number_format($item_total, 2, '.', '');
            $this->sub_total += $item['price'];
            $this->total_tax += $item['price'] * $item['tax'] / 100;

            $this->tax_percentage += $item['tax'];
            $this->total += $item_total;
        }

            $this->sub_total = number_format($this->sub_total, 2, '.', '');
    $this->total_tax = number_format($this->total_tax, 2, '.', '');
    $this->total = number_format($this->sub_total + $this->total_tax, 2, '.', '');
    }

    public function saveInvoice()
    {
        // Validation rules
        $validatedData = $this->validate([
            'invoice_number' => 'required|string',
            'invoice_date' => 'required|date',
            'customer_name' => 'required|string',
            'customer_mobile' => 'required|string',
            'cutomer_email' => 'required|string|email',
            'customer_city' => 'required|string',
            'sales_person_id' => 'required|string',
            'sales_person_name' => 'required|string',
            'service_person_id' => 'required|string',
            'service_person_name' => 'required|string',
            'payment_method' => 'required|string|in:cash,online',
            'items.*.service_name' => 'required|string',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.tax' => 'required|numeric|min:0|max:100',
            'items.*.total' => 'required|numeric|min:0',
            'sub_total' => 'required|numeric|min:0',
            'tax_percentage' => 'required|numeric|min:0|max:100',
            'total_tax' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Save invoice to database
        $invoice = new Invoice();
        $invoice->invoice_number = $this->invoice_number;
        $invoice->invoice_date = Carbon::createFromFormat('d-m-Y', $this->invoice_date)->toDateString();
        $invoice->customer_name = $this->customer_name;
        $invoice->customer_mobile = $this->customer_mobile;
        $invoice->cutomer_email = $this->cutomer_email;
        $invoice->customer_city = $this->customer_city;
        $invoice->sales_person_id = $this->sales_person_id;
        $invoice->sales_person_name = $this->sales_person_name;
        $invoice->service_person_id = $this->service_person_id;
        $invoice->service_person_name = $this->service_person_name;
        $invoice->payment_method = $this->payment_method;
        $invoice->sub_total = $this->sub_total;
        $invoice->tax_percentage = $this->tax_percentage;
        $invoice->total_tax = $this->total_tax;
        $invoice->total = $this->total;
        $invoice->save();

        // Save items
        foreach ($this->items as $item) {
            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->service_name = $item['service_name'];
            $invoiceItem->price = $item['price'];
            $invoiceItem->tax = $item['tax'];
            $invoiceItem->total = $item['total'];
            $invoiceItem->save();
        }

        $customerEmail = $this->cutomer_email; 
        Mail::to($customerEmail)->send(new InvoiceMail($invoice));
        // Optionally, emit an event or set a success message
        session()->flash('message', 'Invoice created successfully.');
        
        $this->reset();
        $this->mount();
        return redirect()->route('invoice.show', ['invoice_id' => $invoice->id]);
    }

    public function fetchCustomerDetails()
    {
        // Fetch customer details based on customer_mobile
        $invoice = Invoice::where('customer_mobile', $this->customer_mobile)->first();

        if ($invoice) {
            $this->customer_name = $invoice->customer_name;
            $this->cutomer_email = $invoice->cutomer_email;
            $this->customer_city = $invoice->customer_city;
        } else {
            // Reset fields if invoice not found
            $this->customer_name = '';
            $this->cutomer_email = '';
            $this->customer_city = '';
        }
    }

    public function render()
    {
        return view('livewire.invoice-component', [
            'sales_people' => User::all(),
        ]);
    }
}
