@extends('buku.layout')

@section('content')
@section('header')
<h2 class="font-semibold text-xl leading-tight">
    {{ __('Daftar Buku Keseluruhan') }}
</h2>
@endsection

<div class="row">
    <div class="col-lg-12 margin-tb py-12">

        <!-- Search Data -->

        <div class="pull-left">
            <form action="{{ url()->current() }}" method="get">
                <div class="relative mx-auto">
                    <input type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Cari Judul atau ISBN ..." class="block w-full pl-4 pr-10 text-sm leading-5 transition rounded-full shadow-sm border-secondary-300 bg-secondary-50 focus:bg-white focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <button type="submit" class="absolute top-0 right-0 inline-flex items-center py-2 text-sm focus:outline-none">
                        <svg class="w-5 h-5 text-gray-500 transition dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 disabled:opacity-25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Button Tambah Data -->

        <div class="pull-right">
            <br><br>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>ISBN</th>
        <th>Cover Buku</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Tingkatan</th>
        <th>Author</th>
        <th>Deskripsi</th>
        <th width="280px">Aksi</th>
    </tr>
    @php
        $i = 1;
    @endphp
    @foreach ($listdata as $dataBuku)
    <tr>
        <td>{{ $dataBuku->isbn }}</td>
        <td><img src="/img/{{ $dataBuku->gambar }}" width="100px"></td>
        <td>{{ $dataBuku->judul }}</td>
        <td>{{ $dataBuku->kategori }}</td>
        <td>{{ $dataBuku->tingkatan }}</td>
        <td>{{ $dataBuku->author }}</td>
        <td>{{ $dataBuku->deskripsi }}</td>
        <td>
            <div class="text-center">
            <a class="btn btn-primary" href="{{ route('listdata.show',$dataBuku->isbn) }}">Lihat Buku</a>
            </a>

            </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>

{!! $listdata->links() !!}
@endsection
