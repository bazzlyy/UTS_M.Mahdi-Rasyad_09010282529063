@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="page-head">
    <div>
        <div class="eyebrow">Koleksi</div>
        <h2>Daftar Buku</h2>
        <p class="text-muted mb-0">Total {{ $books->total() }} judul buku tersimpan.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-accent">
        <i class="bi bi-plus-lg me-1"></i> Tambah Buku
    </a>
</div>

<div class="card mb-4">
    <div class="card-body p-3">
        <form method="GET" action="{{ route('books.index') }}" class="row g-2 align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control border-start-0" name="search"
                           value="{{ request('search') }}" placeholder="Cari judul atau penulis...">
                </div>
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bi bi-funnel me-1"></i> Filter
                </button>
                <a href="{{ route('books.index') }}" class="btn btn-soft" title="Reset">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $index => $book)
                    <tr>
                        <td class="text-muted">{{ $books->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-semibold">{{ $book->title }}</div>
                            <small class="text-muted"><i class="bi bi-person me-1"></i>{{ $book->author }}</small>
                        </td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->year }}</td>
                        <td><span class="chip chip-cat">{{ $book->category->name }}</span></td>
                        <td>
                            <span class="chip {{ $book->stock > 0 ? 'chip-ok' : 'chip-out' }}">
                                <i class="bi bi-circle-fill" style="font-size:.45rem"></i>
                                {{ $book->stock > 0 ? $book->stock . ' tersedia' : 'Habis' }}
                            </span>
                        </td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-icon btn-soft" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-icon btn-soft" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-soft-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-journal-x" style="font-size:2.5rem;color:var(--accent)"></i>
                            <p class="mt-2 mb-3">Belum ada data buku.</p>
                            <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">Tambah buku pertama</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($books->hasPages())
        <div class="card-footer py-3 d-flex justify-content-center">
            {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
