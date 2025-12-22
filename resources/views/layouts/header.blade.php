<!-- Begin Header -->
<header class="app-header border-bottom bg-white" id="appHeader">
    <div class="container-fluid px-3">
        <div class="d-flex align-items-center justify-content-between">

            <!-- Left: Logo -->
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}"
                   style="
                        display:flex;
                        align-items:center;
                        gap:10px;
                        font-weight:700;
                        font-size:16px;
                        letter-spacing:0.6px;
                        text-transform:uppercase;
                        color:#1f2937;
                        text-decoration:none;
                        white-space:nowrap;
                   ">
                    <span style="
                            font-size:18px;
                            background:#2563eb;
                            color:#fff;
                            padding:6px 10px;
                            border-radius:6px;
                            box-shadow:0 2px 6px rgba(0,0,0,0.15);
                        ">
                        🔐
                    </span>
                    Delivery Assignment Management System
                </a>


            </div>

            <!-- Right: Profile -->
            <div class="dropdown">
                <button class="btn d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                    <div class="position-relative">
                        <img src="{{ asset('backend/assets/images/avatar/avatar-10.jpg') }}"
                             class="rounded-circle"
                             height="36" width="36" alt="User">
                        <span class="position-absolute top-0 start-100 translate-middle
                                     badge border border-white rounded-circle bg-success p-1">
                        </span>
                    </div>

                    <div class="d-none d-md-block text-start">
                        <div class="fs-13 fw-semibold">{{ Auth::user()->name }}</div>
                        <div class="fs-12 text-muted">Founder</div>
                    </div>
                </button>

                <!-- Dropdown -->
                <div class="dropdown-menu dropdown-menu-end p-3 shadow-sm" style="min-width: 240px;">
                    <div class="d-flex align-items-center gap-2 border-bottom pb-2 mb-2">
                        <img src="{{ asset('backend/assets/images/avatar/avatar-10.jpg') }}"
                             class="rounded-circle" height="42" width="42">
                        <div>
                            <div class="fw-semibold">{{ Auth::user()->name }}</div>
                            <div class="fs-13 text-muted">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- END Header -->
