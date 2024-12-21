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
            @foreach ($supervisors as $supervisor)
                <tbody>
                    <tr class="">
                        <td wire:key="{{ $supervisor->id }}"> {{ $supervisor->id }}</td>
                        <td> {{ $supervisor->name }}</td>
                        <td> {{ $supervisor->email }}</td>
                        <td> {{ $supervisor->username }}</td>
                        <td><img src="{{ Storage::url($supervisor->picture) }}" class="table-img"
                                style="height: 100px;width:100px" alt="User Picture"></td>
                        <td> <button type="button" wire:click='restore_admin({{ $supervisor->id }})'
                                class="btn btn-success">Restore</button>
                        </td>
                        <td> <button type="button"
                                wire:confirm='are you sure to ERASE this {{ $supervisor->name }} for ever ?'
                                wire:click='earse_admin({{ $supervisor->id }})' class="btn btn-danger">Erase</button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
