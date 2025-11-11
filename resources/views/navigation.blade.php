<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #f8f1e4;">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">MojaStranica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active text-primary' : 'text-dark' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('shop') ? 'active text-primary' : 'text-dark' }}" href="/shop">Shop</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active text-primary' : 'text-dark' }}" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active text-primary' : 'text-dark' }}" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar-nav .nav-link:hover {
    color: #c79b34 !important; /* zlatna nijansa */
    transition: color 0.35s ease;
}
</style>

