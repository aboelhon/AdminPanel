<div>
    @include('components.layouts.admin.admin-style.flash')
    <form wire:submit.prevent="add_admin" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" id="name"
                            wire:model="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email"
                            wire:model="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password"
                            wire:model="password">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="username"
                            wire:model="username">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Your Full Address" id="address"
                            wire:model="address">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel"
                            title="Phone number must be 11 digits and start with 010, 012, 011, or 015"
                            class="form-control" placeholder="Example: 0123456789" id="phone" wire:model="phone">
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" wire:model="birthdate">
                    </div>

                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" wire:model="picture">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="status" class="form-label">Active Status</label>
                        <select class="form-select" name="status" wire:model="status">
                            <option value=""></option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Add Supervisor</button>
                </div>
            </div>{{-- End Row --}}
        </div> {{-- End Container --}}
    </form>
</div>{{-- End Livewire --}}
