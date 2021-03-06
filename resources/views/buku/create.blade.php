@extends('buku.layout')

@section('content')
@section('header')
<h2 class="font-semibold text-xl leading-tight">
    {{ __('Tambah Buku') }}
</h2>
@endsection

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Waduh!</strong> Kayaknya ada masalah nih dengan inputannya, coba di cek!.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="Kategori">Kategori</label>
                            <select class="custom-select" id="Kategori" name="kategori">
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="tingkatan">Tingkatan</label>
                            <select class="custom-select" id="tingkatan" name="tingkatan">
                                <option value="SD">SD/MA</option>
                                <option value="SMP">SMP/MTS</option>
                                <option value="SMA">SMA/SMK</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="file">File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi">Deskripsi / Sipnosis</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="pustakawan_id" name="pustakawan_id" value="{{ Auth()->user()->id }}">
                    <br>
                    <button class="btn btn-primary" type="submit">Tambah Data</button>
                    <a class="btn btn-secondary" href="{{ route('buku.index') }}"> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
