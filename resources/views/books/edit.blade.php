@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <a href="{{ route('books.index') }}" class="text-decoration-none text-muted d-inline-block mb-3">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke daftar
        </a>
        <div class="page-head">
            <div>
                <div class="eyebrow">Koleksi</div>
                <h2><i class="bi bi-pencil-square me-2" style="color:var(--accent)"></i>Edit Buku</h2>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4 p-lg-5">
                <form method="POST" action="{{ route('books.update', $book) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $book->title) }}" placeholder="Contoh: Laskar Pelangi" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                   id="author" name="author" value="{{ old('author', $book->author) }}" required>
                            @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="publisher" class="form-label">Penerbit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                   id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                            @error('publisher')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="year" class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror"
                                   id="year" name="year" value="{{ old('year', $book->year) }}" min="1900" max="{{ date('Y') }}" required>
                            @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                   id="stock" name="stock" value="{{ old('stock', $book->stock) }}" min="0" required>
                            @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('books.index') }}" class="btn btn-soft">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
