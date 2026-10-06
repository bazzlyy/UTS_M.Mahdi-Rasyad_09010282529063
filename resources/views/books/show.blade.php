@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <a href="{{ route('books.index') }}" class="text-decoration-none text-muted d-inline-block mb-3">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke daftar
        </a>

        <div class="card overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center p-4" style="background:var(--brand);">
                    <div class="text-center text-white">
                        <div class="rounded-3 mx-auto mb-3 d-grid" style="width:120px;height:160px;place-items:center;background:var(--accent);box-shadow:8px 8px 0 rgba(0,0,0,.2)">
                            <i class="bi bi-book" style="font-size:3rem"></i>
                        </div>
                        <span class="chip" style="background:rgba(255,255,255,.15);color:#fff">{{ $book->category->name }}</span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="mb-1">{{ $book->title }}</h2>
                        <p class="text-muted mb-4">oleh <strong>{{ $book->author }}</strong></p>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <small class="text-muted d-block">Penerbit</small>
                                <span class="fw-semibold">{{ $book->publisher }}</span>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-muted d-block">Tahun Terbit</small>
                                <span class="fw-semibold">{{ $book->year }}</span>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-muted d-block">Stok</small>
                                <span class="chip {{ $book->stock > 0 ? 'chip-ok' : 'chip-out' }}">{{ $book->stock }} eksemplar</span>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-muted d-block">Ditambahkan</small>
                                <span>{{ $book->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-muted d-block">Terakhir Diperbarui</small>
                                <span>{{ $book->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2 pt-3 border-top">
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-soft-danger">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
