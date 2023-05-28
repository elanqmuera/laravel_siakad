<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
        <span class="avatar avatar-sm"
            style="background-image: url({{ asset('tabler/demo') }}/static/avatars/000m.jpg)"></span>
        <div class="d-none d-xl-block ps-2">
            <div>Paweł Kuna</div>
            <div class="mt-1 small text-muted">{{'nama_dosen'}}</div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <a href="#" class="dropdown-item">Status</a>
        <a href="{{ asset('tabler/demo') }}/profile.html" class="dropdown-item">Profile</a>
        <a href="#" class="dropdown-item">Feedback</a>
        <div class="dropdown-divider"></div>
        <a href="{{ asset('tabler/demo') }}/settings.html" class="dropdown-item">Settings</a>
        <a href="{{ asset('tabler/demo') }}/sign-in.html" class="dropdown-item">Logout</a>
    </div>
</div>
