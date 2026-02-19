<header class="header fixed-top bg-white shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset($logo ?? 'assets/Logo_Resmi_PCR.png') }}" alt="Logo {{ $nama ?? 'PCR' }}" height="40">
            <h1 class="ms-2 mb-0">{{ $nama ?? 'Politeknik Caltex Riau' }}</h1>
        </a>

        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kunjungan') ? 'active' : '' }}" href="{{ route('kunjungan') }}">Kunjungan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<style>
.header {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.95) !important;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.header.scrolled {
    padding-block: 0.5rem !important;
    background-color: rgba(255, 255, 255, 0.98) !important;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
}

.nav-link {
    position: relative;
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-link:not(.active):hover {
    color: var(--bs-primary) !important;
    transform: translateY(-2px);
}

.nav-link.active {
    color: var(--bs-primary) !important;
    font-weight: 600;
}

.nav-link.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: var(--bs-primary);
    border-radius: 2px;
}
</style>

<script>
// Add scrolled class to header on scroll
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>