@extends('layouts.app')

@section('title','Peminjaman Barang')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('borrows.index') }}">Peminjaman Barang</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>
                    @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                    @endif
                    <form class="w-full" action="{{ route('borrows.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-2">
                                Nama Peminjam*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('borrower') }}" name="borrower"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Nama Peminjam">
                            </div><br>
                        </div>
                        </br>

                        <div class="row">
                            <div class="col-sm-2">
                                Nama Barang*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('item') }}" name="item"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Nama Barang">
                            </div><br>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-2">
                                Merk
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('merk') }}" name="merk"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Merk">
                            </div></br>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Kode BMN
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('code') }}" name="code"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Kode BMN">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Tanggal Mulai*
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="start"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 100%;" value="{{old('start')}}">
                            </div>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Tanggal Selesai
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="end"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 100%;" value="{{old('end')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Agenda*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('agenda') }}" name="agenda"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Agenda">
                            </div></br>
                        </div>
                        <div class="row">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 text-right">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection