@extends('layouts.app')

@section('title','Booking Ruangan')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Booking Ruangan Daring/Luring</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Booking Ruangan</li>
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
                    <!-- <div class="col-sm-3">
                        <select name="room" class="form-control" id="room-filter" type="text">
                            <option value="">Semua Ruangan</option>
                            <option value="Zoom Meeting 1 (ditwas.prrs)">Zoom Meeting 1 (ditwas.prrs)</option>
                            <option value="Zoom Meeting 2 (inspeksisedang.btp)">Zoom Meeting 2 (inspeksisedang.btp)
                            </option>
                            <option value="Zoom Meeting 3 (peredaranpangan)">Zoom Meeting 3 (peredaranpangan)</option>
                            <option value="Ruang Rapat Wasdar">Ruang Rapat Wasdar</option>
                        </select>
                    </div> -->
                    <div class="col-sm-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Tgl Awal"
                            readonly />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Tgl Akhir"
                            readonly />
                    </div>
                    <div class="col-sm-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-info"
                            title="Refresh Tabel Ke Semula">Refresh</button>
                        <!-- <button type="button" name="today" id="today" class="btn btn-success">Hari ini</button> -->
                    </div>
                    <!-- AKHIR DATE RANGE PICKER -->

                    <div class="col-sm-3">
                        <a href="{{ route('books.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded float-left"
                            title="Tambah Booking Ruangan">
                            + Tambah
                        </a>
                    </div>

                </div>
                <div class="card-body table-responsive" style="overflow-x:auto;">
                    <table id="booking" class="table table-bordered table-striped" style="width:100%">
                        <thead class="thead-light">
                            <tr>

                                <th>Tanggal Mulai</th>
                                <th>Waktu Mulai</th>
                                <th>Agenda</th>
                                <th>Tanggal Selesai</th>
                                <th>Waktu Selesai</th>
                                <th>Ruangan</th>
                                <th>Link</th>
                                <th>PIC</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- push external js -->
<!-- MULAI MODAL KONFIRMASI DELETE-->

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Data agenda kegiatan akan dihapus</b></p>
                <p>Apakah anda yakin?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR MODAL -->
@endsection
@push('after-script')

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
            // var room = $('#room').val();
            console.log=([from_date]);
            if (from_date != '' && to_date != '') {
                $('#booking').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Harap isi tanggal awal dan tanggal akhir');
            }
        });
        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#room').val('');
            $('#booking').DataTable().destroy();
            load_data();
        });
        $("#room-filter").on('change', function () {
            let room = $("#room-filter").val();
            console.log = ([room]);
            $('#booking').DataTable().destroy();
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
            $('#booking').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                ajax: {
                    url: "{{ route('books.index') }}",
                    // url: "{{ url('/dashboard/books') }}",
                    // url: "https://office.balok.id/dashboard/books",
                    type: 'GET',
                    data: {
                        from_date: from_date,
                        to_date: to_date
                        // room: room
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
                        data: 'date_end',
                        name: 'date_end'
                    },
                    {
                        data: 'time_end',
                        name: 'time_end'
                    },
                    {
                        data: 'room',
                        name: 'room'
                    },
                    {
                        data: 'link',
                        name: 'link',
                        render: function (data, type, row, meta) {
                            if (data == null) {
                                return '';
                            } else {
                                return '<a href=' + data + '><i class="fa fa-link"></i></a>';
                            }
                        }
                    },
                    {
                        data: 'pic',
                        name: 'pic'
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
            type: 'delete',
            beforeSend: function () { $('#tombol-hapus').text('Hapus..');}, //set text untuk tombol hapus
            success: function (data) { //jika sukses
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#booking').dataTable();
                    $('#booking').DataTable().ajax.reload(null, false);
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
