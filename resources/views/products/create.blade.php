@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Tambah Produk Baru</h2>

        <!-- Tampilkan error jika ada -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf <!-- Token CSRF wajib -->

            <!-- Nama Produk -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" 
                    value="{{ old('name') }}" required>
            </div>

            <!-- Deskripsi Produk -->
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- Harga Produk -->
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" 
                    value="{{ old('price') }}" required>
            </div>

            <!-- Pilih Kategori (multi-select) -->
            <div class="mb-3">
                <label for="categories" class="form-label">Kategori</label>
                <select class="form-select" id="categories" name="categories[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (collect(old('categories'))->contains($category->id)) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted"></small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Produk</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection