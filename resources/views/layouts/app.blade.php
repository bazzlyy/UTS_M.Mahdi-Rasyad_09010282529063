<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan') - Sistem Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root{
            --ink:#1f2a24; --muted:#6b7a71; --paper:#f6f3ec; --card:#ffffff;
            --brand:#1f4d3a; --brand-2:#2e6b52; --accent:#c8873a; --line:#e7e1d4;
            --bs-primary:#1f4d3a; --bs-primary-rgb:31,77,58;
        }
        body{background:var(--paper);color:var(--ink);font-family:'DM Sans',sans-serif;}
        h1,h2,h3,h4,.brand-font{font-family:'Fraunces',serif;letter-spacing:-.01em;}
        .app-nav{background:var(--brand);padding:.9rem 0;}
        .app-nav .navbar-brand{font-family:'Fraunces',serif;font-size:1.35rem;color:#fff;}
        .app-nav .brand-mark{display:inline-grid;place-items:center;width:36px;height:36px;border-radius:10px;background:var(--accent);color:#fff;margin-right:.5rem;}
        .app-nav .nav-link{color:rgba(255,255,255,.75);border-radius:999px;padding:.45rem 1rem!important;font-weight:500;}
        .app-nav .nav-link:hover,.app-nav .nav-link.active{color:#fff;background:rgba(255,255,255,.12);}
        .avatar{width:32px;height:32px;border-radius:50%;background:var(--accent);color:#fff;display:inline-grid;place-items:center;font-weight:600;margin-right:.4rem;}
        .card{border:1px solid var(--line);border-radius:16px;box-shadow:0 1px 2px rgba(31,42,36,.04),0 8px 24px -12px rgba(31,42,36,.12);background:var(--card);}
        .card-footer{background:transparent;border-top:1px solid var(--line);}
        .page-head{display:flex;justify-content:space-between;align-items:end;gap:1rem;flex-wrap:wrap;margin-bottom:1.75rem;}
        .page-head .eyebrow{color:var(--accent);font-weight:600;font-size:.8rem;text-transform:uppercase;letter-spacing:.12em;}
        .page-head h2{margin:0;font-size:2rem;}
        .btn{border-radius:10px;font-weight:500;padding:.55rem 1.1rem;}
        .btn-primary{background:var(--brand);border-color:var(--brand);}
        .btn-primary:hover,.btn-primary:focus{background:var(--brand-2);border-color:var(--brand-2);}
        .btn-outline-primary{color:var(--brand);border-color:var(--brand);}
        .btn-outline-primary:hover{background:var(--brand);border-color:var(--brand);}
        .btn-accent{background:var(--accent);border-color:var(--accent);color:#fff;}
        .btn-accent:hover{background:#b07430;color:#fff;}
        .btn-icon{width:34px;height:34px;padding:0;display:inline-grid;place-items:center;border-radius:9px;}
        .btn-soft{background:#f1ede3;color:var(--ink);border:0;}
        .btn-soft:hover{background:#e7e1d4;}
        .btn-soft-danger{background:#fbe9e7;color:#b3261e;border:0;}
        .btn-soft-danger:hover{background:#f6d3cf;color:#b3261e;}
        .form-control,.form-select,.input-group-text{border-color:var(--line);border-radius:10px;padding:.6rem .9rem;}
        .input-group-text{background:#faf8f3;color:var(--muted);}
        .form-control:focus,.form-select:focus{border-color:var(--brand-2);box-shadow:0 0 0 .2rem rgba(46,107,82,.15);}
        .form-label{font-weight:600;font-size:.9rem;}
        .table{--bs-table-hover-bg:#faf8f3;}
        .table thead th{background:#faf8f3;color:var(--muted);font-size:.75rem;text-transform:uppercase;letter-spacing:.08em;font-weight:600;border-bottom:1px solid var(--line);padding:1rem;}
        .table td{padding:1rem;vertical-align:middle;border-color:var(--line);}
        .chip{display:inline-flex;align-items:center;gap:.35rem;padding:.3rem .7rem;border-radius:999px;font-size:.8rem;font-weight:600;}
        .chip-cat{background:#e8f0ec;color:var(--brand);}
        .chip-ok{background:#e6f4ea;color:#1e7a3c;}
        .chip-out{background:#fbe9e7;color:#b3261e;}
        .alert-success{background:#e6f4ea;border:1px solid #c7e6d0;color:#1e5c33;border-radius:12px;}
        .pagination{margin:0;}
        .page-link{color:var(--brand);border-color:var(--line);}
        .active>.page-link,.page-link.active{background:var(--brand);border-color:var(--brand);}
        footer{color:var(--muted);font-size:.9rem;}
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark app-nav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('books.index') }}">
                <span class="brand-mark"><i class="bi bi-book-half"></i></span>Perpustakaan
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                            <i class="bi bi-journal-bookmark me-1"></i> Daftar Buku
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5 flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-top py-4" style="border-color:var(--line)!important;">
        <div class="container d-flex justify-content-between flex-wrap gap-2">
            <span>&copy; {{ date('Y') }} Sistem Perpustakaan</span>
            <span>UTS Pemrograman Web</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
