<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root{--ink:#1f2a24;--muted:#6b7a71;--paper:#f6f3ec;--brand:#1f4d3a;--brand-2:#2e6b52;--accent:#c8873a;--line:#e7e1d4;}
        body{font-family:'DM Sans',sans-serif;background:var(--paper);color:var(--ink);min-height:100vh;}
        h1,h2,h3{font-family:'Fraunces',serif;}
        .side{background:var(--brand);color:#fff;position:relative;overflow:hidden;}
        .side::after{content:"";position:absolute;right:-120px;bottom:-120px;width:360px;height:360px;border-radius:50%;background:var(--accent);opacity:.9;}
        .side .shelf span{display:inline-block;width:22px;border-radius:3px 3px 0 0;margin-right:4px;background:rgba(255,255,255,.18);}
        .brand-mark{display:inline-grid;place-items:center;width:44px;height:44px;border-radius:12px;background:var(--accent);}
        .form-control,.input-group-text{border-color:var(--line);padding:.7rem .9rem;}
        .input-group-text{background:#faf8f3;color:var(--muted);}
        .form-control:focus{border-color:var(--brand-2);box-shadow:0 0 0 .2rem rgba(46,107,82,.15);}
        .btn-brand{background:var(--brand);color:#fff;border-radius:10px;padding:.75rem;font-weight:600;}
        .btn-brand:hover{background:var(--brand-2);color:#fff;}
        .demo{background:#faf8f3;border:1px dashed var(--line);border-radius:10px;}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row min-vh-100">
        <div class="col-lg-6 side d-none d-lg-flex flex-column justify-content-between p-5">
            <div class="d-flex align-items-center gap-2 position-relative" style="z-index:1">
                <span class="brand-mark"><i class="bi bi-book-half fs-5"></i></span>
                <span class="fs-4" style="font-family:'Fraunces',serif">Perpustakaan</span>
            </div>
            <div class="position-relative" style="z-index:1;max-width:440px">
                <div class="shelf mb-4">
                    <span style="height:70px"></span><span style="height:90px"></span><span style="height:60px"></span><span style="height:100px"></span><span style="height:80px"></span><span style="height:95px"></span>
                </div>
                <h1 class="display-5 fw-bold mb-3">Kelola koleksi buku dengan rapi.</h1>
                <p class="opacity-75 mb-0">Catat, cari, dan pantau stok buku perpustakaan dalam satu tempat.</p>
            </div>
            <small class="opacity-50 position-relative" style="z-index:1">&copy; {{ date('Y') }} Sistem Perpustakaan</small>
        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center p-4">
            <div class="w-100" style="max-width:400px">
                <div class="d-lg-none mb-4 text-center">
                    <span class="brand-mark text-white"><i class="bi bi-book-half fs-5"></i></span>
                </div>
                <h2 class="fw-bold mb-1">Selamat datang</h2>
                <p class="text-muted mb-4">Silakan login untuk melanjutkan.</p>

                @if($errors->any())
                    <div class="alert alert-danger rounded-3">
                        @foreach($errors->all() as $error)
                            <div><i class="bi bi-exclamation-circle me-1"></i>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Masukkan password" required>
                            <button type="button" class="input-group-text" onclick="const p=document.getElementById('password');p.type=p.type==='password'?'text':'password';this.firstElementChild.classList.toggle('bi-eye');this.firstElementChild.classList.toggle('bi-eye-slash')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-brand w-100">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </button>
                </form>

                <div class="demo mt-4 p-3 small text-muted text-center">
                    Demo: <strong>admin@perpustakaan.com</strong> / <strong>password</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
