<header class="header fixed-top bg-white shadow-sm py-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <!-- Logo dan Nama Kampus -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="logo-wrapper bg-primary bg-opacity-10 p-2 rounded-3 me-2">
                    <img src="{{ asset($logo ?? 'assets/Logo_Resmi_PCR.png') }}" 
                         alt="Logo {{ $nama ?? 'PCR' }}" 
                         height="40"
                         class="logo-img">
                </div>
                <div class="brand-text">
                    <span class="fw-bold text-primary d-block lh-1">{{ $nama ?? 'Politeknik Caltex Riau' }}</span>
                    <small class="text-muted fst-italic" style="font-size: 0.7rem;">{{ $slogan ?? 'Empowers You to Global Competition' }}</small>
                </div>
            </a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" 
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded-pill {{ request()->routeIs('home') ? 'active bg-primary text-white' : 'text-dark' }}" 
                           href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded-pill {{ request()->routeIs('kunjungan') ? 'active bg-primary text-white' : 'text-dark' }}" 
                           href="{{ route('kunjungan') }}">
                            <i class="bi bi-people me-1"></i> Kunjungan
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded-pill {{ request()->routeIs('kontak') ? 'active bg-primary text-white' : 'text-dark' }}" 
   href="{{ route('kontak') }}">
    <i class="bi bi-envelope me-1"></i> Kontak
</a>

                    </li>
                    
                    <!-- Search Button -->
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <button class="btn btn-outline-primary rounded-pill px-3" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="searchModalLabel">Cari Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kunjungan') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg rounded-start-4" 
                               name="search"
                               placeholder="Cari nama atau institusi..." 
                               aria-label="Search">
                        <button class="btn btn-primary rounded-end-4 px-4" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.header {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.95) !important;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    z-index: 1030;
}

.header.scrolled {
    padding-block: 0.5rem !important;
    background-color: rgba(255, 255, 255, 0.98) !important;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
}

.navbar-brand {
    transition: transform 0.3s ease;
}

.navbar-brand:hover {
    transform: translateY(-2px);
}

.logo-wrapper {
    transition: all 0.3s ease;
}

.navbar-brand:hover .logo-wrapper {
    transform: rotate(5deg) scale(1.05);
    background-color: var(--bs-primary) !important;
}

.navbar-brand:hover .logo-img {
    filter: brightness(0) invert(1);
}

.nav-link {
    position: relative;
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-link:not(.active):hover {
    background-color: rgba(13, 110, 253, 0.1);
    transform: translateY(-2px);
}

.nav-link.active {
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
}

.nav-link i {
    font-size: 1.1rem;
}

/* Mobile Responsive */
@media (max-width: 991.98px) {
    .navbar-collapse {
        background: white;
        padding: 1rem;
        border-radius: 1rem;
        margin-top: 1rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .nav-link {
        text-align: center;
        margin: 0.25rem 0;
    }
    
    .brand-text span {
        font-size: 0.9rem;
    }
    
    .brand-text small {
        font-size: 0.6rem !important;
    }
}

@media (min-width: 992px) {
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: white;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add scrolled class to header on scroll
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Close mobile menu on link click
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const navbarCollapse = document.getElementById('navbarMain');
            if (navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
            }
        });
    });
});
</script>