<div class="row gx-3">
<div class="row gx-3">

    <div class="col-xxl-12">
        <div class="card mb-3">
        <div class="card-header">
            <h4 class="title ">Expense Register</h4>
         </div>
            <div class="card-body">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form class="row g-3" wire:submit.prevent="submit">
        <div class="col-md-6">
            <label for="expense_date" class="form-label">Current Date</label>
            <input type="date" id="expense_date" wire:model="expense_date" class="form-control">
            @error('expense_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6">
            <label for="expense_time" class="form-label">Current Time</label>
             <input type="text" id="expense_time" wire:model="expense_time" class="form-control" placeholder="HH:MM AM/PM">
            @error('expense_time') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" id="amount" wire:model="amount" class="form-control">
            @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="party" class="form-label">Party (Customer or Supplier)</label>
            <input type="text" id="party" wire:model="party" class="form-control">
            @error('party') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" wire:model="remarks" class="form-control"></textarea>
            @error('remarks') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="attachment" class="form-label">Attached Image or PDF</label>
            <input type="file" id="attachment" wire:model="attachment" class="form-control">
            @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" wire:model="category" class="form-control">
                <option value="">Select Category</option>
                <option value="sale">Sale</option>
                <option value="food">Food</option>
                <option value="grocery">Grocery</option>
                <option value="health">Health</option>
                <option value="petrol">Petrol</option>
                <option value="staff salary">Staff Salary</option>
                <option value="labour charges">Labour Charges</option>
                <option value="maintenance">Maintenance</option>
                <option value="rent">Rent</option>
            </select>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="payment_mode" class="form-label">Payment Mode</label>
            <select id="payment_mode" wire:model="payment_mode" class="form-control">
                <option value="">Select Payment Mode</option>
                <option value="online">Online</option>
                <option value="cash">Cash</option>
                <option value="upi">UPI (Phone, GPay, CRED)</option>
            </select>
            @error('payment_mode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
        </div>
    </div>
</div>
