<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;

class InvoiceList extends Component
{
    public $perPage = 10;
    public $currentPage = 1;
    public $data = [];
    public $storeData = [];
    public $searchQuery = '';

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        $query = Invoice::query();

        if ($this->searchQuery) {
            $query->where('invoice_number', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('customer_mobile', 'like', '%' . $this->searchQuery . '%');
        }

        if (isset($this->storeData[$this->currentPage])) {
            $this->data = $this->storeData[$this->currentPage];
        } else {
            $this->data = $query->skip($offset)->take($this->perPage)->get()->toArray();
            $this->storeData[$this->currentPage] = $this->data;
        }
    }

    public function loadNext()
    {
        $this->currentPage++;
        $this->loadData();
    }

    public function loadPrevious()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->loadData();
        }
    }

    public function search()
    {
        $this->currentPage = 1;
        $this->storeData = [];
        $this->loadData();
    }

    public function clearSearch()
    {
        $this->searchQuery = '';
        $this->currentPage = 1;
        $this->storeData = [];
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.invoice-list');
    }
}