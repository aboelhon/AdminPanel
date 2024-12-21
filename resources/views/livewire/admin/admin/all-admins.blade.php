<div>


    @include('components.layouts.admin.admin-style.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3">
                <input type="text" class="form-control w-25 search-input" wire:click='resetQuerystring'
                    wire:model.live='search' placeholder="Search by email or phone" />
            </div>
            <h2 class="text-center mb-4">Search Admins</h2>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Username</th>
                            <th>Picture</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Birthdate</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>By</th>
                            <th>IP Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_admins as $admin)
                            <tr>
                                <td wire:key="{{ $admin->id }}"> {{ $admin->id }} </td>
                                <td> {{ $admin->name }} </td>
                                <td> {{ $admin->email }} </td>
                                <td>*******</td>
                                <td> {{ $admin->username }} </td>
                                <td><img src="{{ Storage::url($admin->picture) }}" class="img-thumbnail"
                                        alt="User Picture">
                                </td>
                                <td> {{ $admin->address }} </td>
                                <td> {{ $admin->phone }} </td>
                                <td> {{ $admin->birthdate }} </td>
                                <td> {{ $admin->role }} </td>
                                <td>
                                    @if ($admin->status == 'active')
                                        <div class="alert alert-success">Active</div>
                                    @else
                                        <div class="alert alert-danger">In-Active</div>
                                    @endif
                                </td>
                                <td> {{ $admin->by }} </td>
                                <td> {{ $admin->ip_address }} </td>
                                <td><a class="btn btn-success" href="{{ route('admin.get-admin-info', $admin->id) }}"
                                        target="_blank">Edit</a></td>
                                <td>
                                    @if (Auth::guard('admin')->user()->id == $admin->id)
                                        <button type="button" disabled class="btn btn-danger">Delete</button>
                                    @else
                                        <button type="button" wire:confirm='are you sure to move {{ $admin->name }}?'
                                            wire:click="deleteAdmin({{ $admin->id }})"
                                            class="btn btn-danger">Delete</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> {{-- End div for table --}}
            {{ $all_admins->links() }}
        </div>{{-- End Row --}}
    </div> {{-- End Contrainer --}}
</div> {{--   ENd Livewire --}}
