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
            <h1>Data Peminjaman Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Peminjaman Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('borrows.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Pinjam Barang
                </a>
            </div>
            <div class="bg-white" style="overflow-x:auto;">
                <table class="table-auto w-full" >
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">No</th>
                        <th class="border px-6 py-4">Peminjam</th>
                        <th class="border px-6 py-4">Nama Barang</th>
                        <th class="border px-6 py-4">Merk</th>
                        <th class="border px-6 py-4">Mulai</th>
                        <th class="border px-6 py-4">Selesai</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($borrow as $a)
                            <tr>
                                <td class="border px-6 py-4">{{ ($borrow->currentPage()-1) * $borrow->perPage()+$loop->index+1 }}</td>
                                <td class="border px-6 py-4 ">{{ $a->borrower }}</td>
                                <td class="border px-6 py-4">{{ $a->item->item }}</td>
                                <td class="border px-6 py-4">{{ $a->item->merk }}</td>
                                <td class="border px-6 py-4">{{ date('d F y', strtotime($a->start)) }}</td>
                                <td class="border px-6 py-4">{{ date('d F y', strtotime($a->end)) }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('borrows.edit', $a->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('borrows.destroy', $a->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block" onclick="return confirm('Apakah anda yakin ?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="7" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $borrow->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection