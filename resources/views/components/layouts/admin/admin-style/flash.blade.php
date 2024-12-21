@if (Session::has('updated_name'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_name') }}</strong>
    </div>
@endif
@if (Session::has('updated_email'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_email') }}</strong>
    </div>
@endif
@if (Session::has('updated_password'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_password') }}</strong>
    </div>
@endif
@if (Session::has('updated_username'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_username') }}</strong>
    </div>
@endif
@if (Session::has('updated_picture'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_picture') }}</strong>
    </div>
@endif
@if (Session::has('updated_address'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_address') }}</strong>
    </div>
@endif
@if (Session::has('updated_phone'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_phone') }}</strong>
    </div>
@endif
@if (Session::has('updated_birthdate'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_birthdate') }}</strong>
    </div>
@endif
@if (Session::has('updated_status'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('updated_status') }}</strong>
    </div>
@endif

{{-- End flash messages for information updating for admins & supervisor cruds --}}


{{-- start flash messages for admin cruds --}}

@if (Session::has('admin_added'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('admin_added') }}</strong>
    </div>
@endif

@if (Session::has('deleted_admin'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('deleted_admin') }}</strong>
    </div>
@endif


{{-- End flash messages for admin cruds --}}



{{-- start flash messages for suprvisor cruds --}}


@if (Session::has('supervisor_added'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('supervisor_added') }}</strong>
    </div>
@endif
@if (Session::has('deleted_supervisor'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('deleted_supervisor') }}</strong>
    </div>
@endif

{{-- end flash messages for suprvisor cruds --}}

{{-- start flash messages for members cruds --}}


@if (Session::has('member_added'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('member_added') }}</strong>
    </div>
@endif
@if (Session::has('deleted_member'))
    <div class="alert alert-success alert-dismissible fade w-25 show" role="alert">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('deleted_member') }}</strong>
    </div>
@endif

{{-- end flash messages for members cruds --}}
