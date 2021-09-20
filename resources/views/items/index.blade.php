@extends('layouts.app')

@section('title','Barang Milik Negara')

@section('content')   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang Milik Negara</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">BMN</li>
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
                <a href="{{ route('items.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Data BMN
                </a>
            </div>
            <div class="mb-10">
            <form action="{{ route('item.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-2">Upload Data BMN</div>
                    <div class="col-sm-3"><input type="file" name="item" required></div><br>
                    <button type="submit" class="btn bg-purple">Upload</button></br>
                </div>
            </form>
            </div>
            <!-- <div class="bg-white"> -->
            <div class="card-body table-responsive p-0" style="overflow-x:auto;">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">No</th>
                        <th class="border px-6 py-4">Kode BMN</th>
                        <th class="border px-6 py-4">Nama Barang</th>
                        <th class="border px-6 py-4">Tahun Perolehan</th>
                        <th class="border px-6 py-4">NUP</th>
                        <th class="border px-6 py-4">Merk/Type</th>
                        <th class="border px-6 py-4">Kondisi</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($item as $data)
                            <tr>
                                <td class="border px-6 py-4">{{ ($item->currentPage()-1) * $item->perPage()+$loop->index+1 }}</td>
                                <td class="border px-6 py-4 ">{{ $data->code }}</td>
                                <td class="border px-6 py-4">{{ $data->item }}</td>
                                <td class="border px-6 py-4">{{ $data->tahun_perolehan }}</td>
                                <td class="border px-6 py-4">{{ $data->nup }}</td>
                                <td class="border px-6 py-4">{{ $data->merk }}</td>
                                <td class="border px-6 py-4">{{ $data->kondisi }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('items.edit', $data->id) }}" class="btn btn-success btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('items.destroy', $data->id) }}" method="POST" class="d-inline" title="Hapus">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="7" class="border text-center p-8">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $item->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection