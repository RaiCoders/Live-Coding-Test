@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>
<a href="{{ route('products.create') }}" style="font-size:12px; background:black;" class="btn btn-success mb-3">Tambah Produk</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @foreach($product->categories as $category)
                    <span class="badge bg-primary">{{ $category->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" style="color:white;  font-size:12px; background:black;" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" style="font-size:12px; background:red;"
                        onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection