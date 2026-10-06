@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2 class="fw-bold mb-0"><i class="bi bi-book"></i> Detail Buku</h2>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <table class="table table-borderless">
                    <tr>
                        <th width="200" class="text-muted">Judul</th>
                        <td class="fw-semibold">{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Penulis</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Penerbit</th>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Tahun Terbit</th>
                        <td>{{ $book->year }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Kategori</th>
                        <td><span class="badge bg-info text-dark">{{ $book->category->name }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Stok</th>
                        <td>
                            <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }} fs-6">
                                {{ $book->stock }} eksemplar
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Ditambahkan</th>
                        <td>{{ $book->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Terakhir Diperbarui</th>
                        <td>{{ $book->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>

                <hr>

                <div class="d-flex gap-2">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning text-white">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
