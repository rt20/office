<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')

    <title>Home | e-Office</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">

    @stack('before-style')
    <!-- style -->
    @include('includes.style')
    @stack('after-style')

</head>

<body>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- </div> -->
        <!-- ./wrapper -->


        @include('home.sidebar')
        @section('title','Dashboard')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <h1>Jadwal Pemakaian Ruang Rapat Luring / Daring Hari Ini</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card-body">
                    <table id="data_table" class="table table-striped table-responsive">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="nosort">Mulai</th>
                                <th scope="col" class="nosort">Selesai</th>
                                <th scope="col">Agenda</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">PIC</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($book as $item)
                            <tr>
                                <td>{{ ($book->currentPage()-1) * $book->perPage()+$loop->index+1 }}</td>
                                <td>{{ date('d M y', strtotime($item->date_start))}} -
                                    {{date('H:i', strtotime($item->time_start))}}</td>
                                <td>{{ date('d M y', strtotime($item->date_end))}} -
                                    {{date('H:i', strtotime($item->time_end))}}</td>
                                <td>{{ $item->agenda }}</td>
                                <td>{{ $item->room }}</td>
                                <td>{{ $item->pic }}</td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="border text-center p-5">
                                    Agenda Hari Ini Kosong
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-5">
                    {{ $book->links() }}
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        @include('includes.footer')

        @stack('before-script')
        <!-- script -->
        @include('includes.script')
        @stack('after-script')

</body>

</html>
