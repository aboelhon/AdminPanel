<div class="container mt-5">
    @include('components.layouts.admin.admin-style.flash')

    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Update Name Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateName'>
                    <h4 class="mb-3 text-center">Name</h4>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ $member->name }}</label>
                        <input wire:model='name' name="name" type="text" class="form-control" id="name"
                            placeholder="Enter new name">
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Name</button>
                </form>

                <!-- Update Email Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateEmail'>
                    <h4 class="mb-3 text-center">Email</h4>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ $member->email }}</label>
                        <input wire:model='email' name="email" type="email" class="form-control" id="email"
                            placeholder="Enter new email">
                    </div>
                    <div class="mb-3">
                        <input wire:model='re_email' name="re_email" type="email" class="form-control" id="email"
                            placeholder="Enter new email">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    @error('re_email')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Email</button>
                </form>

                <!-- Update Password Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updatePassword'>
                    <h4 class="mb-3 text-center">Password</h4>
                    <div class="mb-3">
                        <label for="password" class="form-label">********</label>
                        <input wire:model='password' name="password" type="password" class="form-control" id="password"
                            placeholder="Type new password">
                    </div>
                    <div class="mb-3">
                        <label for="re_password" class="form-label">Retype Password</label>
                        <input wire:model='re_password' name="re_password" type="password" class="form-control"
                            id="re_password" placeholder="Retype new password">
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    @error('re_password')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>

                <!-- Update Username Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateUsername'>
                    <h4 class="mb-3 text-center">Username</h4>
                    <div class="mb-3">
                        <label for="username" class="form-label">{{ $member->username }}</label>
                        <input wire:model='username' name="username" type="text" class="form-control" id="username"
                            placeholder="Enter new username">
                    </div>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Username</button>
                </form>

                <!-- Update Picture Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updatePicture' enctype="multipart/form-data">
                    <h4 class="mb-3 text-center">Profile Picture</h4>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Profile Picture</label>
                        <input wire:model='picture' name="picture" type="file" class="form-control" id="picture">
                    </div>
                    @error('picture')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Picture</button>
                </form>

                <!-- Update Address Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateAddress'>
                    <h4 class="mb-3 text-center">Address</h4>
                    <div class="mb-3">
                        <label for="address" class="form-label">{{ $member->address }}</label>
                        <input wire:model='address' name="address" type="text" class="form-control"
                            id="address" placeholder="Enter new address">
                    </div>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Address</button>
                </form>

                <!-- Update Phone Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updatePhone'>
                    <h4 class="mb-3 text-center">Phone</h4>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ $member->phone }}</label>
                        <input wire:model='phone' name="phone" type="text" class="form-control" id="phone"
                            placeholder="Enter new phone">
                    </div>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Phone</button>
                </form>

                <!-- Update Birthdate Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateBirthdate'>
                    <h4 class="mb-3 text-center">Birthdate</h4>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">{{ $member->birthdate }}</label>
                        <input wire:model='birthdate' name="birthdate" type="date" class="form-control"
                            id="birthdate">
                    </div>
                    @error('birthdate')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Birthdate</button>
                </form>

                <!-- Update Status Form -->
                <form class="update-form p-4 mb-4" wire:submit.prevent='updateStatus'>
                    <h4 class="mb-3 text-center">Status</h4>
                    <div class="mb-3">
                        <label for="status" class="form-label">{{ $member->status }}</label>
                        <select class="form-select" wire:model='status' name="status" id="status">
                            <option value=""></option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div> <br>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
