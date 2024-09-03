<div class="row gx-3">
   <div class="col-12">
      <div class="card mb-3">
         <div class="card-body">
            <!-- Row start -->
            <div class="row g-4">
               <div class="px-0 border-end offset-9 col-xl-3 col-sm-6">
                  <div class="text-end m-2">
                     <a href="{{ route('employee.list') }}"><button class="btn btn-sm btn-primary">Employee List</button></a>
                  </div>
               </div>
            </div>
            <!-- Row end -->
         </div>
      </div>
   </div>
   <div class="col-xxl-12">
      <div class="card employee_reg mb-3">
         <div class="card-header">
            <h4 class="title ">Employee Register</h4>
         </div>
         <div class="card-body">
            @if (session()->has('message'))
            <div class="alert alert-success">
               {{ session('message') }}
            </div>
            @endif
            <form class="row g-3" wire:submit.prevent="submit">
               <div class="col-xxl-12">
                  <div class="bg-light bg-opacity-50 p-3 mb-3 fw-bold">
                     Basic Details
                  </div>
               </div>
               <div class="col-md-3">
                  <label for="first_name" class="form-label">
                  First Name
                  </label>
                  <input type="text" id="first_name" class="form-control" wire:model="first_name">
                  @error('first_name')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-3">
                  <label for="last_name" class="form-label">
                  Last Name
                  </label>
                  <input type="text" id="last_name" class="form-control" wire:model="last_name">
                  @error('last_name')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-3">
                  <label for="birthday" class="form-label">
                  Birthday
                  </label>
                  <input type="date" id="birthday" class="form-control" wire:model="birthday">
                  @error('birthday')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-3">
                  <label for="gender" class="form-label">
                  Gender
                  </label>
                  <input type="text" id="gender" class="form-control" wire:model="gender">
                  @error('gender')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <label for="email" class="form-label">
                     Email
                     </label>
                     <input type="email" id="email" class="form-control" wire:model="email">
                     @error('email')
                     <span>
                     {{ $message }}
                     </span>
                     @enderror
                  </div>
                  <div class=" col-md-4 ">
                     <label for="phone" class="form-label">
                     Phone
                     </label>
                     <input type="text" id="phone" class="form-control" wire:model="phone">
                     @error('phone')
                     <span>
                     {{ $message }}
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-12">
                  <div class="bg-light bg-opacity-50 p-3 mb-3 fw-bold">
                     Address Details
                  </div>
               </div>
               <div class="col-md-4">
                  <label for="address" class="form-label">
                  Address
                  </label>
                  <input type="text" id="address" class="form-control" wire:model="address">
                  @error('address')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="address_number" class="form-label">
                  House Number
                  </label>
                  <input type="text" id="address_number" class="form-control" wire:model="address_number">
                  @error('address_number')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="city" class="form-label">
                  City
                  </label>
                  <input type="text" id="city" class="form-control" wire:model="city">
                  @error('city')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="state" class="form-label">
                  State
                  </label>
                  <input type="text" id="state" class="form-control" wire:model="state">
                  @error('state')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="zip" class="form-label">
                  Zip
                  </label>
                  <input type="text" id="zip" class="form-control" wire:model="zip">
                  @error('zip')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="emergency_contact_name" class="form-label">
                  Emergency Contact Name
                  </label>
                  <input type="text" id="emergency_contact_name" class="form-control" wire:model="emergency_contact_name">
                  @error('emergency_contact_name')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="emergency_contact_number" class="form-label">
                  Emergency Contact Number
                  </label>
                  <input type="text" id="emergency_contact_number" class="form-control"
                     wire:model="emergency_contact_number">
                  @error('emergency_contact_number')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="years_of_experience" class="form-label">
                  Years of Experience
                  </label>
                  <input type="number" id="years_of_experience" class="form-control" wire:model="years_of_experience">
                  @error('years_of_experience')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="position" class="form-label">
                  Position
                  </label>
                  <input type="text" id="position" class="form-control" wire:model="position">
                  @error('position')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="date_of_joining" class="form-label">
                  Date of Joining
                  </label>
                  <input type="date" id="date_of_joining" class="form-control" wire:model="date_of_joining">
                  @error('date_of_joining')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="profile_image" class="form-label">
                  Profile image
                  </label>
                  <input type="file" id="profile_image" class="form-control" wire:model="profile_image">
                  @error('profile_image')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-md-4">
                  <label for="profile_image" class="form-label">
                  Id Proof
                  </label>
                  <input type="file" id="id_proof" class="form-control" wire:model="id_proof">
                  @error('id_proof')
                  <span>
                  {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="col-12">
                  <button class="btn btn-primary" type="submit">
                  Submit
                  </button>
                  <button class="btn btn-danger" type="reset">
                  Clear
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>