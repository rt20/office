<div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
</div>
<div class="card-header">
    <form method="POST" id="mutasi" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-sm-4"> 
                Nama Barang*
            </div>
            <div class="col-sm-7">
            <select name="item_id" id="selectbarang"
                                class="form-control form-control-sm" required>
                                    <option value=""></option>
                                    @foreach($items ?? '' as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('item_id') == $item->id ? 'selected' : null }}>
                                        {{ $item->code }}.{{ $item->nup }} | {{ $item->item }} | {{ $item->tahun_perolehan }} | {{ $item->merk }}
                                    </option>
                                    @endforeach
            </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                Nama Pengguna Sebelum
            </div>
            <div class="col-sm-4">
                <input type="text" name="user_before" placeholder="Nama Pengguna Sebelumnya" id='user_before'
                    class="form-control form-control-sm" value="{{old('user_before')}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                Lokasi Sebelumnya*
            </div>
            <div class="col-sm-4">
                <input type="text" name="location_before" placeholder="Lokasi Sebelumnya" id='location_before'
                    class="form-control form-control-sm" value="{{old('location_before')}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                Tanggal Mutasi*
            </div>
            <div class="col-sm-auto">
                <input type="date" name="tgl_mutasi" class="form-control form-control-sm" id='tgl_mutasi'
                    value="{{old('tgl_mutasi')}} " required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                Nama Pengguna Sekarang
            </div>
            <div class="col-sm-4">
                <input type="text" name="user_after" placeholder="Nama Pengguna Sekarang" id='user_after'
                    class="form-control form-control-sm" value="{{old('user_after')}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                Lokasi Sekarang*
            </div>
            <div class="col-sm-4">
                <input type="text" name="location_after" placeholder="Lokasi Sekarang" id='location_after'
                    class="form-control form-control-sm" value="{{old('location_after')}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
               Keterangan
            </div>
            <div class="col-sm-4">
                <input type="text" name="keterangan" placeholder="Keterangan" id='keterangan'
                    class="form-control form-control-sm" value="{{old('keterangan')}}">
            </div>
        </div>
        <br>
        <div class="modal-footer">
            <button type="submit" id="addmutasi" class="btn btn-primary">Simpan</button>
            <button type="button" name="tutupmutasi" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </form>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#addmutasi").on('submit', function (e) {
            e.preventDefault();
            var formData = $('form').serializeArray();
            // console.log(formData);
            // AJAX Functionality
            $.ajax({
                url: "{{ route('mutasi.storeAddMutasi' ) }}",
                type: 'post',
                data: formData,
                dataType: 'json',
                beforeSend: function () {
                    $(".save-data").addClass('disabled').text('Loading...');
                },
                success: function (res) {
                    console.log('res', res);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Data mutasi telah ditambahkan.");
                    $('#user_before').val('');
                    $('#item_id').val('');
                    $('#location_before').val('');
                    $('#tgl_mutasi').val('');
                    $('#user_after').val('');
                    $('#location_after').val('');
                    $('#keterangan').val('');
                    $(".save-data").removeClass('disabled').text('Simpan');
                }
            });
        });
        
    });
   
</script>

