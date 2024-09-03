<div class="col-xxl-12">
    <div class="card employee_reg mb-3">
        <div class="card-header">
            <h4 class="title">Invoice List</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="left">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search by invoice no or customer mobile" wire:model="searchQuery">
                        <button class="btn btn-primary" type="button" wire:click="search">Search</button>
                        <button class="btn btn-secondary" type="button" wire:click="clearSearch">Clear</button>

                    </div>
                </div>
                <div class="right">
                    <a href="{{ url('invoice.create') }}" class="btn btn-primary">Add Invoice</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Invoice No</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Customer Name</th>
                        <th class="text-center">Customer Mobile</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Action</th>
                    </tr>

                    @foreach($data as $item)
                        <tr>
                            <td align="center">{{ $item['invoice_number'] }}</td>
                            <td align="center">{{ $item['invoice_date'] }}</td>
                            <td align="center">{{ $item['customer_name'] }}</td>
                            <td align="center">{{ $item['customer_mobile'] }}</td>
                            <td align="center">{{ $item['total'] }}</td>
                            @if($item['payment_method'] === 'cash')
                                <td align="center">
                                    <span class="badge border border-success text-success">{{ $item['payment_method'] }}</span>
                                </td>
                            @else
                                <td align="center">
                                    <span class="badge border border-warning text-warning">{{ $item['payment_method'] }}</span>
                                </td>
                            @endif
                            <td>
                                <a href="{{ url('invoice.show', $item['id']) }}" class="">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <button class="btn btn-sm btn-primary" wire:click="loadPrevious" {{ $currentPage == 1 ? 'disabled' : '' }}>Previous</button>
                <button class="btn btn-sm btn-primary" wire:click="loadNext">Next</button>
            </div>
        </div>
    </div>
</div>
