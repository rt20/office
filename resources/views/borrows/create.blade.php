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
                    <div class="mb-5" role="alert" id="error_container">
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
                    <form class="w-full" action="{{ route('borrows.store') }}" method="post" id="my_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-2">
                                Nama Peminjam*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('borrower') }}" name="borrower"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="borrower" type="text" placeholder="Nama Peminjam" required>
                            </div><br>
                        </div>
                        </br>

                        <div class="row">
                            <div class="col-sm-2">
                                Nama Barang*
                            </div>
                            <div class="col-sm-9">
                                <select name="item_id" id="select2"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    required>
                                    <option value=""></option>
                                    @foreach($items ?? '' as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('item_id') == $item->id ? 'selected' : null }}>
                                        {{ $item->code }}.{{ $item->nup }} | {{ $item->item }} | {{ $item->merk }}
                                    </option>
                                    @endforeach
                                </select>
                            </div><br>
                        </div>
                        </br>
                        <!-- <div class="row">
                            <div class="col-sm-2">
                                Merk
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('merk') }}" name="merk"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="merk" type="text" placeholder="Merk">
                            </div></br>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Kode BMN
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('code') }}" name="code"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="code" type="text" placeholder="Kode BMN">
                            </div>
                        </div>
                        <br> -->
                        <div class="row">
                            <div class="col-sm-2">
                                Tanggal Mulai*
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="start" id="start"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 100%;" value="{{old('start')}}" required>
                            </div>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Tanggal Selesai
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="end" id="end"
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
                                    id="agenda" type="text" placeholder="Agenda" required>
                            </div></br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                            </div>

                            <div class="col-sm-5">
                                <input type="checkbox" name="is_agree" value="1" required>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Syarat dan Ketentuan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Syarat dan Ketentuan
                                                    Peminjaman Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Peminjam yang menerima Barang Milik Negara tersebut <b> bertanggungjawab
                                                    atas kehilangan dan kerusakan </b> karena kelalaian pribadi Barang
                                                Milik Negara
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            </br>
                            <br></br>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
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
