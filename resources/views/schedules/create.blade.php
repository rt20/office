@extends('layouts.app')

@section('title','Jadwal Kegiatan')

@section('content')
@include ('shared.errors')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}">Jadwal</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <!-- <form action="{{ asset("/stugas") }}" method="POST"> -->
                <form action="{{ route('schedules.store')}}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-2">
                                Tanggal Kegiatan*
                            </div>
                            <div class="col-sm-auto">
                                <input type="date" name="date" class="form-control form-control-sm"
                                    value="{{old('date')}} " required>
                            </div>
                            <div class="col-sm-auto">
                                Waktu*
                            </div>
                            <div class="col-sm-auto">
                                <input type="time" name="time" class="form-control form-control-sm"
                                    value="{{old('time')}}" required>
                            </div>
                            WIB
                        </div>


                        <br>

                        <div class="row">
                            <div class="col-sm-2">
                                Agenda*
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="agenda" placeholder="Nama Kegiatan/ Acara"
                                    class="form-control form-control-sm" value="{{old('agenda')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-2">
                                Lokasi
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="location" placeholder="Lokasi Kegiatan/ Acara"
                                    class="form-control form-control-sm" value="{{old('location')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Penyelenggara
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="organizer" placeholder="Penyelenggara Kegiatan/ Acara"
                                    class="form-control form-control-sm" value="{{old('organizer')}}">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-2">
                                Peserta
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="participant" placeholder="Peserta Kegiatan/ Acara"
                                    class="form-control form-control-sm" value="{{old('participant')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Nomor HP
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="phone" placeholder="Nomor HP Whatsapp"
                                    class="form-control form-control-sm" value="{{old('phone')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2"> Keterangan
                            </div>
                            <div class="col-sm-5">

                                <input type="text" name="note" class="form-control form-control-sm"
                                    placeholder="Keterangan" value="{{old('note')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2"> Lampiran
                            </div>
                            <div class="col-sm-5">
                                <!-- <div class="input-group input-group-sm">
                  <input type="file" class="form-control" name="attachment" placeholder="Lampiran" value="{{old('attachment')}}">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div> -->
                                <input type="file" name="attachment" class="form-control form-control-sm"
                                    placeholder="Lampiran" value="{{old('attachment')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div id="googleMap" style="width:100%;height:380px;"></div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-sm-2">
                            </div>

                           

                            <div class="col-sm-4">

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection