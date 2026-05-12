@extends('template')

@section('title', 'Daftar Produk')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-10">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Daftar Produk</h4>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Variant</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>

                        <td>
                            @if($product->variants->count() > 0)
                                <ul>
                                    @foreach($product->variants as $variant)
                                        <li>
                                            <strong>{{ $variant->name }}</strong><br>
                                            Desc: {{ $variant->description }} <br>
                                            Proc: {{ $variant->processor }} <br>
                                            RAM: {{ $variant->memory }} <br>
                                            Strg: {{ $variant->storage }} <br>
                                            Product: {{ $variant->product->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <em>Belum ada variant</em>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="btn btn-sm btn-primary">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('products.destroy', $product->id) }}"
                                  style="display:inline"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
