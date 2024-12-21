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
            @foreach ($members as $member)
                <tbody>
                    <tr class="">
                        <td wire:key="{{ $member->id }}"> {{ $member->id }}</td>
                        <td> {{ $member->name }}</td>
                        <td> {{ $member->email }}</td>
                        <td> {{ $member->username }}</td>
                        <td><img src="{{ Storage::url($member->picture) }}" class="table-img"
                                style="height: 100px;width:100px" alt="User Picture"></td>
                        <td> <button type="button" wire:click='restore_member({{ $member->id }})'
                                class="btn btn-success">Restore</button>
                        </td>
                        <td> <button type="button"
                                wire:confirm='are you sure to ERASE this {{ $member->name }} for ever ?'
                                wire:click='earse_member({{ $member->id }})' class="btn btn-danger">Erase</button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
