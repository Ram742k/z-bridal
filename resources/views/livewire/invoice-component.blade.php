<!-- resources/views/livewire/invoice-component.blade.php -->

<div class="col-xxl-12">
    <div class="card employee_reg mb-3">
        <div class="card-header">
            <h4 class="title">Employee Register</h4>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit.prevent="saveInvoice">
                <div class="row gx-3">
                    <div class="col-sm-6 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="invoice_number" class="form-label">Invoice Number</label>
                                <input type="text" id="invoice_number" wire:model="invoice_number" class="form-control" readonly tabindex="1">

                            </div>
                            <div class="col-6">
                                <label for="invoice_date" class="form-label">Invoice Date</label>
                                <input type="text" id="invoice_date" wire:model="invoice_date" class="form-control" readonly tabindex="2">
                            </div>
                            <div class="col-6">
                                <label for="customer_mobile" class="form-label">Customer Mobile</label>
                                <input type="text" id="customer_mobile" wire:model="customer_mobile" class="form-control" wire:keyup="fetchCustomerDetails" autofocus tabindex="3">
                                @error('customer_mobile') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <!-- Add other customer related fields here (email, name, city) -->
                            <div class="col-6">
                                <label for="cutomer_email" class="form-label">Email</label>
                                <input type="text" id="cutomer_email" wire:model="cutomer_email" class="form-control" tabindex="4">
                                @error('cutomer_email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input type="text" id="customer_name" wire:model="customer_name" class="form-control" tabindex="5">
                                @error('customer_name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label for="customer_city" class="form-label">City</label>
                                <input type="text" id="customer_city" wire:model="customer_city" class="form-control" tabindex="6">
                                @error('customer_city') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="sales_person_id" class="form-label">Sales Person ID</label>
                                <input type="text" id="sales_person_id" wire:model="sales_person_id" class="form-control" tabindex="7">
                                @error('sales_person_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label for="sales_person_name" class="form-label">Sales Person Name</label>
                                <input type="text" id="sales_person_name" wire:model="sales_person_name" class="form-control" tabindex="8">
                            </div>
                            <div class="col-6">
                                <label for="service_person_id" class="form-label">Service Person ID</label>
                                <input type="text" id="service_person_id" wire:model="service_person_id" class="form-control" tabindex="9">
                                @error('service_person_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label for="service_person_name" class="form-label">Service Person Name</label>
                                <input type="text" id="service_person_name" wire:model="service_person_name" class="form-control" tabindex="10">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Payment Method</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash" wire:model="payment_method" tabindex="11">
                                    <label class="form-check-label" for="cash">Cash</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="online" value="online" wire:model="payment_method" tabindex="12">
                                    <label class="form-check-label" for="online">Online</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <h2>Total: <span id="total_amt">{{ $total }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <h5>Items</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Price</th>
                            <th>Tax (%)</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td>
                                    <input type="text" wire:model="items.{{ $index }}.service_name" class="form-control" tabindex="{{ 13 + ($index * 4) }}">
                                </td>
                                <td>
                                    <input type="number" wire:model="items.{{ $index }}.price" class="form-control" wire:change="calculateTotals" tabindex="{{ 14 + ($index * 4) }}">
                                </td>
                                <td>
                                    <input type="number" wire:model="items.{{ $index }}.tax" class="form-control" tabindex="{{ 15 + ($index * 4) }}">
                                </td>
                                <td>
                                    <input type="number" wire:model="items.{{ $index }}.total" class="form-control" readonly tabindex="{{ 16 + ($index * 4) }}">
                                </td>
                                <td>
                                    <button type="button" wire:click="removeItem({{ $index }})" class="btn btn-danger" tabindex="-1">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="button" wire:click="addItem" class="btn btn-secondary" tabindex="-1">Add Item</button>

                <h5>Summary</h5>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-3">
                        <div class="input-group mt-2">
                            <label for="sub_total" class="col-4 form-label">Sub Total</label>
                            <input type="number" id="sub_total" wire:model="sub_total" class="form-control" readonly tabindex="-1">
                        </div>
                        <div class="input-group mt-2">
                            <label for="tax_percentage" class="col-4 form-label">Tax (%)</label>
                            <input type="number" id="tax_percentage" wire:model="tax_percentage" class="form-control" tabindex="-1">
                        </div>
                        <div class="input-group mt-2">
                            <label for="total_tax" class="col-4 form-label">Total Tax</label>
                            <input type="number" id="total_tax" wire:model="total_tax" class="form-control" readonly tabindex="-1">
                        </div>
                        <div class="input-group mt-2 mb-2">
                            <label for="total" class="col-4 form-label">Total</label>
                            <input type="number" id="total" wire:model="total" class="form-control" readonly tabindex="-1">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" tabindex="-1">Save Invoice</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('input, select, button');

        inputs.forEach((input, index) => {
            input.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                    }
                }
            });
        });
    });
</script>
