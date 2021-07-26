@extends('layouts.app')

@section('title','Jadwal Kegiatan')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row input-daterange">
                    <div class="col-sm-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                            readonly />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                            readonly />
                    </div>
                    <div class="col-sm-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-info">Refresh</button>
                        <!-- <button type="button" name="today" id="today" class="btn btn-success">Hari ini</button> -->
                    </div>
                    <div class="col-sm-auto">
                        <a href="{{ route('schedules.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded float-right">
                            + Agenda
                        </a>
                    </div>
                </div>
            </div>
            <!-- AKHIR DATE RANGE PICKER -->
                <div class="card-body table-responsive" style="overflow-x:auto;">
                    <table id="schedule" class="table-auto table-striped table-bordered w-full">
                        <thead>
                            <tr>
                                <th>Hari, Tanggal</th>
                                <th>Waktu</th>
                                <th>Agenda</th>
                                <th>Lokasi</th>
                                <th>Penyelenggara</th>
                                <th>Peserta</th>
                                <th>Lampiran</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('after-script')
<!-- menu schedule -->
<script>
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //jalankan function load_data diawal agar data ter-load
        load_data();
        //Iniliasi datepicker pada class input
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $('#schedule').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });
        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#schedule').DataTable().destroy();
            load_data();
        });
        $('#bersih').click(function () {
            $('#date').val('');
            $('#time').val('');
            $('#date_end').val('');
            $('#time_end').val('');
            $('#agenda').val('');
            $('#organizer').val('');
            $('#location').val('');
            $('#link').val('');
            $('#note').val('');
            $('#attachment').val('');
            $('#participant').val('');
            $('#participant').val('');
        });

        //LOAD DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        //load data menggunakan parameter tanggal dari dan tanggal hingga

        function load_data(from_date = '', to_date = '') {
            $('#schedule').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('schedules.index') }}",
                    // url: "{{ url('/dashboard/schedules') }}",
                    // url: "https://office.balok.id/dashboard/schedules", 
                    type: 'GET',
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    } //jangan lupa kirim parameter tanggal 
                },
                columns: [{
                        data: 'date_start',
                        name: 'date_start'
                    },
                    {
                        data: 'time_start',
                        name: 'time_start'
                    },
                    {
                        data: 'agenda',
                        name: 'agenda'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'organizer',
                        name: 'organizer'
                    },
                    {
                        data: 'participant',
                        name: 'participant'
                    },
                    {
                        data: 'attachment',
                        name: 'attachment',
                        render: function (data, type, row, meta) {
                            if (data == null) {
                                return '';
                            } else {
                                return '<a href=' + data +
                                '><i class="fa fa-download"></i></a>';
                            }
                        }
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });
        }
    });

    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
    });

    //jika tombol hapus pada modal konfirmasi di klik maka
    $('#tombol-hapus').click(function () {
        $.ajax({
            url: "books/" + dataId, //eksekusi ajax ke url ini
            type: 'DELETE',
            beforeSend: function () {
                $('#tombol-hapus').text('Hapus'); //set text untuk tombol hapus
            },
            success: function (data) { //jika sukses
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#booking').dataTable();
                    oTable.fnDraw(false); //reset datatable
                });
                iziToast.warning({ //tampilkan izitoast warning
                    title: 'Data Berhasil Dihapus',
                    message: '{{ Session('
                    delete ')}}',
                    position: 'bottomRight'
                });
            }
        })
    });

</script>
@endpush
