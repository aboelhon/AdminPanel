<div>
    @include('components.layouts.admin.admin-style.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3">
                <input type="text" class="form-control w-25 search-input" wire:click='resetQuerystring'
                    wire:model.live='search' placeholder="Search by email or phone" />
            </div>
            <h2 class="text-center mb-4">Search Members</h2>
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
                        @foreach ($all_members as $member)
                            <tr>
                                <td wire:key="{{ $member->id }}"> {{ $member->id }} </td>
                                <td> {{ $member->name }} </td>
                                <td> {{ $member->email }} </td>
                                <td>*******</td>
                                <td> {{ $member->username }} </td>
                                <td><img src="{{ Storage::url($member->picture) }}" style="height:160px;width:160px" class="img-thumbnail"
                                        alt="User Picture">
                                </td>
                                <td> {{ $member->address }} </td>
                                <td> {{ $member->phone }} </td>
                                <td> {{ $member->birthdate }} </td>
                                <td> {{ $member->role }} </td>
                                <td>
                                    @if ($member->status == 'active')
                                        <div class="alert alert-success">Active</div>
                                    @else
                                        <div class="alert alert-danger">In-Active</div>
                                    @endif
                                </td>
                                <td> {{ $member->by }} </td>
                                <td> {{ $member->ip_address }} </td>
                                <td><a class="btn btn-success"
                                        href="{{ route('admin.get-member-info', $member->id) }}"
                                        target="_blank">Edit</a></td>
                                <td>
                                    <button type="button" wire:confirm='are you sure to move {{ $member->name }}?'
                                        wire:click="deleteMember({{ $member->id }})"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $all_members->links() }}
        </div>
    </div>
</div>
