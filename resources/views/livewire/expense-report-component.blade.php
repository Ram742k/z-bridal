<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Expense Report</h5>
            <div class="d-flex justify-content-between">
                <div>
                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" wire:model="startDate" wire:change="fetchExpenses" class="form-control">
                    @error('startDate') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate" wire:model="endDate" wire:change="fetchExpenses" class="form-control">
                    @error('endDate') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <button wire:click="printReport" class="btn btn-primary">Print</button>
                <button wire:click="downloadPdf" class="btn btn-success">Download PDF</button>
                <button wire:click="exportCsv" class="btn btn-info">Export CSV</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Party</th>
                            <th>Remarks</th>
                            <!-- <th>Attachment</th> -->
                            <th>Category</th>
                            <th>Payment Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($expenses as $expense)
                            <tr>
                            <td>{{ $expense->expense_date }}</td>
                                <td>{{ $expense->expense_time }}</td>
                                <td>${{ number_format($expense->amount, 2) }}</td>
                                <td>{{ $expense->party }}</td>
                                <td>{{ $expense->remarks }}</td>
                                <!-- <td> <a href="{{ asset('storage/' . $expense->attachment) }}" target="_blank">View Attachment</a></td> -->
                                <td>{{ $expense->category }}</td>
                                <td>{{ $expense->payment_mode }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No expense data available for the selected period.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
