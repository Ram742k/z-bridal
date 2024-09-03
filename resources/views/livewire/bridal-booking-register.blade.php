<div class="col-xxl-12">
      <div class="card employee_reg mb-3">
         <div class="card-header">
            <h4 class="title ">Bridal Booking Register</h4>
         </div>
         <div class="card-body">
            @if (session()->has('message'))
            <div class="alert alert-success">
               {{ session('message') }}
            </div>
            @endif
    <form class="row g-3" wire:submit.prevent="submit">
        @csrf
        <div class="col-md-3">
            <label for="bridal_name" class="form-label">Bridal Name</label>
            <input type="text" id="bridal_name" class="form-control" wire:model="bridal_name">
            @error('bridal_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="cell_no1" class="form-label">Cell No 1</label>
            <input type="text" id="cell_no1" class="form-control" wire:model="cell_no1">
            @error('cell_no1') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="cell_no2" class="form-label">Cell No 2</label>
            <input type="text" id="cell_no2" class="form-control" wire:model="cell_no2">
            @error('cell_no2') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" class="form-control" wire:model="address"></textarea>
            @error('address') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="function" class="form-label">Function</label>
            <select id="function" class="form-control" wire:model="function">
                <option value="engagement">Engagement</option>
                <option value="marriage">Marriage</option>
                <option value="others">Others</option>
            </select>
            @error('function') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="function_date" class="form-label">Function Date</label>
            <input type="date" id="function_date" class="form-control" wire:model="function_date">
            @error('function_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" id="time" class="form-control" wire:model="time">
            @error('time') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" id="place" class="form-control" wire:model="place">
            @error('place') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="makeup" class="form-label">Makeup</label>
            <select id="makeup" class="form-control" wire:model="makeup">
                <option value="hd">HD</option>
                <option value="hdpro">HD Pro</option>
                <option value="air_brush">Air Brush</option>
                <option value="other">Other</option>
            </select>
            @error('makeup') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <div class="form-check mt-4">
				<input class="form-check-input" type="checkbox" value="" id="side_makeup"  wire:model="side_makeup" />
				<label class="form-check-label" for="side_makeup">Side Makeup</label>
			</div>
            @error('side_makeup') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" id="jewalls"  wire:model="jewalls" />
				<label class="form-check-label" for="jewalls">Jewalls</label>
        </div>
            @error('jewalls') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" id="flowers"  wire:model="flowers" />
				<label class="form-check-label" for="flowers">Flowers</label>
        </div>
            @error('flowers') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" step="0.01" id="total_amount" class="form-control" wire:model="total_amount">
            @error('total_amount') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="advance_amount" class="form-label">Advance Amount</label>
            <input type="number" step="0.01" id="advance_amount" class="form-control" wire:model="advance_amount">
            @error('advance_amount') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label for="balance" class="form-label">Balance</label>
            <input type="number" step="0.01" id="balance" class="form-control" wire:model="balance">
            @error('balance') <span class="error">{{ $message }}</span> @enderror
        </div>
 
        <div class="col-12">
                  <button class="btn btn-primary" type="submit">
                  Submit
                  </button>
                  <button class="btn btn-danger" type="reset">
                  Clear
                  </button>
               </div>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
</div>
      </div>
</div>

