<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card mb-3">
            <div class="card-body">
            @if($editing)
                    {{-- Edit Form --}}
                    <form class="row g-3" wire:submit.prevent="update">
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
                        <div>
                            <button type="submit">Update</button>
                            <button type="button" wire:click="cancel">Cancel</button>
                        </div>
                    </form>
                @elseif ($viewing)
                {{-- View Employee Details --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Employee Details</h4>
                            <img height="100" src="{{ asset('storage/' . $employees->find($employeeId)->profile_image) }}" alt="Profile Image" >
                            <ul class="list-group">
                                <li class="list-group-item">First Name: {{ $employees->find($employeeId)->first_name }}</li>
                                <li class="list-group-item">Last Name: {{ $employees->find($employeeId)->last_name }}</li>
                                <li class="list-group-item">Birthday: {{ $employees->find($employeeId)->birthday }}</li>
                                <li class="list-group-item">Gender: {{ $employees->find($employeeId)->gender }}</li>
                                <li class="list-group-item">Email: {{ $employees->find($employeeId)->email }}</li>
                                <li class="list-group-item">Phone: {{ $employees->find($employeeId)->phone }}</li>
                                <li class="list-group-item">Address: {{ $employees->find($employeeId)->address }}</li>
                                <li class="list-group-item">Address Number: {{ $employees->find($employeeId)->address_number }}</li>
                               
                                {{-- You can add more details here --}}
                            </ul>
                        </div>
                        <div class="col-md-6">
                        <ul class="list-group">
                        <li class="list-group-item">City: {{ $employees->find($employeeId)->city }}</li>
                                <li class="list-group-item">State: {{ $employees->find($employeeId)->state }}</li>
                                <li class="list-group-item">Zip: {{ $employees->find($employeeId)->zip }}</li>
                                <li class="list-group-item">Emergency Contact Name: {{ $employees->find($employeeId)->emergency_contact_name }}</li>
                                <li class="list-group-item">Emergency Contact Number: {{ $employees->find($employeeId)->emergency_contact_number }}</li>
                                <li class="list-group-item">Years of Experience: {{ $employees->find($employeeId)->years_of_experience }}</li>
                                <li class="list-group-item">Position: {{ $employees->find($employeeId)->position }}</li>
                                <li class="list-group-item">Date of Joining: {{ $employees->find($employeeId)->date_of_joining }}</li>
                                {{-- You can add more details here --}}
                            </ul>
                        </div>
                        <button type="button" wire:click="cancel">Cancel</button>
                    </div>
                @else
                <div class="table-responsive">
                    <table class="table align-middle table-hover m-0">
                        <thead>
                            <tr>
                                <th>Profile Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Position</th>
                                <th>Date of Joining</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        @if($employee->profile_image)
                                            <img src="{{ asset('storage/' . $employee->profile_image) }}" class="rounded-circle img-3x me-2" alt="Profile Image" width="50" height="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->birthday }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->city }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ $employee->date_of_joining }}</td>
                                   
                                    <td>
                                    <a href="#" wire:click="edit({{ $employee->id }})" class="btn btn-info btn-sm m-1"><i class="bi bi-pencil"></i></a>
                                            <a href="#" wire:click="view({{ $employee->id }})" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                            <button wire:click="delete({{ $employee->id }})" class="btn btn-danger btn-sm m-1"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
