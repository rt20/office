@extends('layouts.app')

@section('title','Booking Ruangan')

@section('content')   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
      <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">
        <div class="mb-10">
        <a href="{{ route('books.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Booking Ruangan
                </a>
                </div>
            <div class="bg-white">
                <table id="data_table" class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="nosort">Mulai</th>
                        <th scope="col" class="nosort">Selesai</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Waktu Selesai</th>
                        <th scope="col">PIC</th>
                        <th scope="col" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($book as $item)
                            <tr>
                                <td >{{ ($book->currentPage()-1) * $book->perPage()+$loop->index+1 }}</td>
                                <td >{{ date('d F Y', $item->start)}}</td>
                                <td >{{ date('d F Y', $item->end) }}</td>
                                <td >{{ $item->agenda }}</td>
                                <td >{{ $item->room }}</td>
                                <td >{{ date('H:i', $item->start) }}</td>
                                <td >{{ date('H:i', $item->end) }}</td>
                                <td >{{ $item->pic }}</td>
                                <td align=right>
                                    <a href="{{ route('books.edit', $item->id) }}"class="btn btn-success btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i></a>
                                    <form action="{{ route('books.destroy', $item->id) }}" method="POST" class="d-inline" title="Hapus">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin ?')">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="9" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $book->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!-- push external js -->

@endsection