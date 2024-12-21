<div>
    @include('components.layouts.admin.admin-style.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3">
                <input type="text" class="form-control w-25 search-input" wire:click='resetQuerystring'
                    wire:model.live='search' placeholder="Search by email or phone" />
            </div>
            <h2 class="text-center mb-4">Search Supervisors</h2>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        @foreach ($all_supervisors as $supervisor)
                            <tr>
                                <td wire:key="{{ $supervisor->id }}"> {{ $supervisor->id }} </td>
                                <td> {{ $supervisor->name }} </td>
                                <td> {{ $supervisor->email }} </td>
                                <td>*******</td>
                                <td> {{ $supervisor->username }} </td>
                                <td><img src="{{ Storage::url($supervisor->picture) }}" style="height:160px;width:160px" class="img-thumbnail"
                                        alt="User Picture">
                                </td>
                                <td> {{ $supervisor->address }} </td>
                                <td> {{ $supervisor->phone }} </td>
                                <td> {{ $supervisor->birthdate }} </td>
                                <td> {{ $supervisor->role }} </td>
                                <td>
                                    @if ($supervisor->status == 'active')
                                        <div class="alert alert-success">Active</div>
                                    @else
                                        <div class="alert alert-danger">In-Active</div>
                                    @endif
                                </td>
                                <td> {{ $supervisor->by }} </td>
                                <td> {{ $supervisor->ip_address }} </td>
                                <td><a class="btn btn-success"
                                        href="{{ route('admin.get-supervisor-info', $supervisor->id) }}"
                                        target="_blank">Edit</a></td>
                                <td>
                                    <button type="button" wire:confirm='are you sure to move {{ $supervisor->name }}?'
                                        wire:click="deleteSupervisor({{ $supervisor->id }})"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $all_supervisors->links() }}
        </div>
    </div>
</div>
