    {{-- Start Sidebar --}}
    <div class="container-fluid">
        <div class="row ">

            @include('components.layouts.admin.admin-style.breadcrumb')
            {{-- Start Column for sidebar & Accordion --}}
            <div class="col">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#Id1"
                    aria-controls="Id1">
                    SideBar
                </button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="Id1"
                    aria-labelledby="Enable both scrolling & backdrop">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="Enable both scrolling & backdrop">
                            Administration panel
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        {{-- Start the Accordion  --}}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Admins & Supservisors & Members
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="nav justify-content-center flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.all-admins') }}">All Admin</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.all-supervisors') }}">All Supervisors</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.all-members') }}">All Members</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by
                                        default, until the collapse plugin adds the appropriate classes that we use
                                        to
                                        style each element. These classes control the overall appearance, as well as
                                        the
                                        showing and hiding via CSS transitions. You can modify any of this with
                                        custom
                                        CSS or overriding our default variables. It's also worth noting that just
                                        about
                                        any HTML can go within the <code>.accordion-body</code>, though the
                                        transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by
                                        default, until the collapse plugin adds the appropriate classes that we use
                                        to
                                        style each element. These classes control the overall appearance, as well as
                                        the
                                        showing and hiding via CSS transitions. You can modify any of this with
                                        custom
                                        CSS or overriding our default variables. It's also worth noting that just
                                        about
                                        any HTML can go within the <code>.accordion-body</code>, though the
                                        transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End the Accordion  --}}
                    </div>
                </div>
            </div>
            {{-- End Column for sidebar & Accordion --}}
        </div>
    </div>
    {{-- End Sidebar --}}
