<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">Services Report</h3>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="form-group row mt-4 col-sm-6">
                    <label for="startDate" class="col-sm-2">Start Date:</label>
                    <div class="col-sm-10">
                        <input type="date" id="startDate" wire:model="startDate" class="form-control" wire:change="fetchSalesReport">
                        @error('startDate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mt-4 col-sm-6">
                    <label for="endDate" class="col-sm-2">End Date:</label>
                    <div class="col-sm-10">
                        <input type="date" id="endDate" wire:model="endDate" class="form-control" wire:change="fetchSalesReport">
                        @error('endDate') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-body">
         
            <div class="d-flex justify-content-end">
            <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                <button wire:click="downloadPdf" class="btn btn-outline-primary">Download PDF</button>
                <button wire:click="exportCsv" class="btn btn-outline-primary">Export CSV</button>
            </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Invoice Date</th>
                            <th>Customer Name</th>
                            <th>Sales Person</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salesReports as $report)
                            <tr>
                                <td>{{ $report->invoice_number }}</td>
                                <td>{{ Carbon\Carbon::parse($report->invoice_date)->format('d-m-Y') }}</td>
                                <td>{{ $report->customer_name }}</td>
                                <td>{{ $report->sales_person_name }}</td>
                                <td>${{ number_format($report->total, 2) }}</td>
                                <!-- <td>{{ $report->payment_method }}</td> -->
                                @if( $report->payment_method === 'cash')
                                <td align="center">
                                    <span class="badge border border-success text-success"> {{$report->payment_method}}</span>
                                </td>
                            @else
                                <td align="center">
                                    <span class="badge border border-warning text-warning"> {{$report->payment_method}}</span>
                                </td>
                            @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No sales data available for the selected period.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
