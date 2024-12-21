<div>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Restore</th>
                    <th scope="col">Erase</th>
                </tr>
            </thead>
            @foreach ($admins as $admin)
                <tbody>
                    <tr class="">
                        <td wire:key="{{ $admin->id }}"> {{ $admin->id }}</td>
                        <td> {{ $admin->name }}</td>
                        <td> {{ $admin->email }}</td>
                        <td> {{ $admin->username }}</td>
                        <td><img src="{{ Storage::url($admin->picture) }}" class="table-img"
                                style="height: 100px;width:100px" alt="User Picture"></td>
                        <td> <button type="button" wire:click='restore_admin({{ $admin->id }})'
                                class="btn btn-success">Restore</button>
                        </td>
                        <td> <button type="button" wire:confirm='are you sure to ERASE this {{$admin->name}} for ever ?' wire:click='earse_admin({{ $admin->id }})'
                                class="btn btn-danger">Erase</button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
