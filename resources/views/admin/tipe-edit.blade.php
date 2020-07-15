@extends('layouts.admin')

{{-- @push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush --}}

@section('title')
    <a href="{{route('tipe.index')}}">Tipe Rumah</a><li class="breadcrumb-item"></li>Edit
@endsection

@section('content')

<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="col-md-7 col-12 align-self-center d-none d-md-block">
    <div class="d-flex mt-2 justify-content-end">
    </div>
</div>
</div>

<div class="container-fluid">
    @if ($statusFasilitas)
        <div class="row"id="status" role="alert">       
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0 text-white">Peringatan</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Form Fasilitas Perumahan</h3>
                        <p class="card-text">Kolom <code>jumlah</code> dari failitas perumahan yang baru dimasukkan belum di berikan data. Jadi isikan data jumlah fasilitas sesuai dengan kebutuhan!</p>                  
                        <a href="javascript:void(0)" class="btn btn-inverse" id="close1">Close</a>
                    </div>
                </div>
            </div>
        </div>        
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header bg-info">
                    <h4 class="card-title text-white">Edit Data Tipe Rumah</h4>
                </div>
                    <div class="form-body">
                        <div class="card-body">
                            <h6 class="card-subtitle">Tanda * merupakan form yang tidak boleh kosong</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="tipe-name" class="form-group row">
                                        <label class="control-label text-left col-md-2">Nama Tipe*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="tipe_name" class="form-control" placeholder="Masukkan nama tipe" name="tipe_name" value="{{$type->tipe_name}}"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="jenis-property" class="form-group row">
                                        <label class="control-label text-left col-md-2">Jenis Tipe</label>
                                        <div class="col-md-9">
                                            <select  id="jenis_property" class="form-control custom-select" name="jenis_property">
                                                <option value="">Pilih Jenis Tipe</option>
                                                <option value="tanah" @if ("tanah" == $type->jenis_property)
                                                    selected
                                                @endif>Tanah</option>
                                                <option value="rumah" @if ("rumah" == $type->jenis_property)
                                                    selected
                                                @endif>Rumah</option>
                                            </select>
                                            <small id="pesan-property" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="prices" class="form-group row">
                                        <label class="control-label text-left col-md-2">Price (Rp)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="price" class="form-control" placeholder="Masukkan harga Tipe" name="price" value="{{$type->price}}"><small id="pesan-price" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="descriptions" class="form-group row">
                                        <label class="control-label text-left col-md-2">Deskription*</label>
                                        <div class="col-md-9">
                                        <textarea id="description" class="form-control" rows="5" placeholder="Masukkan deskripsi" name="description">{{$type->description}}</textarea><small id="pesan-description" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="land-size" class="form-group row">
                                        <label class="control-label text-left col-md-2">Luas Tanah (m<sup>2</sup>)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="land_size" class="form-control" placeholder="Masukkan luas tanah" name="land_size" value="{{$type->land_size}}"><small id="pesan-land" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="home-size" class="form-group row">
                                        <label class="control-label text-left col-md-2">Luas Rumah (m<sup>2</sup>)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="home_size" class="form-control" placeholder="Masukkan luas rumah" name="home_size" value="{{$type->home_size}}"><small id="pesan-home" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            
                            </form>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="text-right">
                                        <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                        <a href="{{route('tipe.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <hr>
                        <div class="card-body">
                            <h4 class="card-title">Fasilitas Tipe Rumah</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addFasilitases">+ Tambah Fasilitas Perumahan</button>
                            <br><br>

                            <div class="table-responsive">
                                <table id="tabel-fasilitas" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fasilitas</th>
                                            <th>Jumlah</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($type->fasilitas)
                                            @foreach ($type->fasilitas as $fasilitas)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="fasilitas{{$fasilitas->pivot->id}}">{{$fasilitas->fasilitas}}</td>
                                                <td class="jumlah{{$fasilitas->pivot->id}}">{{$fasilitas->pivot->jumlah}}</td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#editFasilitas" data-placement="top" title="Edit" onclick="editFasilitas({{$fasilitas->pivot->id}})"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="hapusFasilitas({{$fasilitas->pivot->id}}, {{$loop->iteration}})"><i class="fa fa-trash"></i></button>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                                <tr>
                                                    <td>Belum ada data fasilitas</td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
                        <hr>
                        <div id="view-gambar" class="card-body">
                            <h4 class="card-title">Gambar Tipe Rumah</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addFasilitas">+ Tambah Gambar Fasilitas</button>
                            <br><br>

                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($type->images)
                                            @foreach ($type->images as $image)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset($image->image)}}" alt="gambar Tipe Rumah" style="width: 300px; height: 150px"></td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <button class="hapus btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" onclick="hapus({{$image->id}},{{$loop->iteration}})"></i></button>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                                <tr>
                                                    <td>Belum ada data fasilitas</td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
        
                        
                    </div>
            </div>
            
        </div> 
    </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="addFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Gambar Fasilitas Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('tipe.edit.addGambar')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="id" value="{{$type->id}}">
                        <input type="file" class="form-control" required name="file" multiple accept="image/*"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success">
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="addFasilitases" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddFasilitas" action="{{route('tipe.edit.addFasilitas')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="tipe_rumah_id" value="{{$type->id}}">
                        <label class="control-label text-left">Fasilitas Perumahan*</label>
                        <select  id="fasilitas_val" class="form-control" name="fasilitas_id">
                            <optgroup label="Fasilitas Perumahan">
                                @foreach ($fasilitases as $fasilitas)
                                    <option value="{{$fasilitas->id}}">{{$fasilitas->fasilitas}}</option>
                                @endforeach
                            </optgroup>
                        </select>                    
                    </div>
                    <div id="addFasilitasDanger" class="form-group">
                        <label class="control-label text-left">Jumlah Fasilitas*</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlahAddFasilitas">
                        <small id="pesan-addFasilitas" class="pesan form-control-feedback">Masukan salah</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success">
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="editFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Edit Fasilitas Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditFasilitas" action="{{route('tipe.edit.fasilitas')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <input id="idEditFasilitas" type="hidden" name="id" value="">
                        <input id="fasilitasEditFasilitas" type="input" class="form-control" readonly>
                    </div>
                    <div id="editFasilitasDanger" class="form-group has-success">
                        <label>jumlah</label>
                        <input id="jumlahEditFasilitas" type="input" class="form-control" name="jumlah">
                        <small id="pesan-editFasilitas" class="pesan form-control-feedback">Masukan salah</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <input id="tombolEditKelebihan" type="submit" class="btn btn-success">
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
@endsection
<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>

{{-- @push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
@endpush --}}

<script>
    function showValidation(idDiv,idPesan,pesan){
        $('#'+idDiv).attr('class', 'form-group has-danger row');
        $('#'+idPesan).show();
        $('#'+idPesan).html(pesan);
        window.scrollTo(0, document.querySelector(".container-fluid").offsetTop);
    }

    function correctValidation(idDiv,idPesan){
        $('#'+idDiv).attr('class', 'form-group row');
        $('#'+idPesan).hide();
    }

    function validasi(){
        var status = 1;
        var test;
        var tipe_name = $('#tipe_name').val();
        var jenis_property = $('#jenis_property').val();
        var price = $('#price').val();
        var description = $('#description').val();
        var land_size = $('#land_size').val();
        var home_size = $('#home_size').val();


        if(tipe_name == null || tipe_name == ""){
            showValidation('tipe-name','pesan-name','Masukan nama tipe tidak boleh kosong');
            status = 0;
        }else if(tipe_name.length < 3){
            showValidation('tipe-name','pesan-name','Tolonng masukkan nama Tipe Rumah yang benar');
            status = 0;
        }else{
            correctValidation('tipe-name', 'pesan-name');
        }

        if(jenis_property == null || jenis_property == ''){
            showValidation('jenis-property','pesan-property','Tolonng pilih jenis property');
            status = 0;
        }else{
            correctValidation('jenis-property', 'pesan-property');
        }

        if(price == null || price == ''){
            showValidation('prices','pesan-price','Masukan price tidak boleh kosong');
            status = 0;
        }else if(isNaN(price)){
            showValidation('prices','pesan-price','Masukan format price yang benar');
            status = 0;
        }else if(price < 0){
            showValidation('prices','pesan-price','price tidak boleh kurang dari 0');
            status = 0;
        }else{
            correctValidation('prices', 'pesan-price');
        }

        if(description == null || description == ""){
            showValidation('descriptions','pesan-description','Masukan description tidak boleh kosong');
            status = 0;
        }else if(description.length < 3){
            showValidation('descriptions','pesan-description','Tolonng masukkan description perumahan yang benar');
            status = 0;
        }else{
            correctValidation('descriptions', 'pesan-description');
        }

        if(land_size == null || land_size == ''){
            showValidation('land-size','pesan-land','Masukan Luas Tanah tidak boleh kosong');
            status = 0;
        }else if(isNaN(land_size)){
            showValidation('land-size','pesan-land','Masukan format Luas Tanah yang benar');
            status = 0;
        }else if(land_size < 1){
            showValidation('land-size','pesan-land','Luas Tanah tibak boleh kurang dari sama dengan 0');
            status = 0;
        }else{
            correctValidation('land-size', 'pesan-land');
        }

        if(home_size == null || home_size == ''){
            showValidation('home-size','pesan-home','Masukan Luas Rumah tidak boleh kosong');
            status = 0;
        }else if(isNaN(home_size)){
            showValidation('home-size','pesan-home','Masukan format Luas Rumah yang benar');
            status = 0;
        }else if(home_size < 1 && jenis_property == 'rumah'){
            showValidation('home-size','pesan-home','Luas Rumah tibak boleh kurang dari sama dengan 0');
            status = 0;
        }else if(parseInt(land_size) < parseInt(home_size)){
            showValidation('home-size','pesan-home','Luas Rumah tibak boleh melebihi luas tanah');
            status = 0;
            console.log('home size: '+home_size+' land size: '+land_size);
        }else{
            correctValidation('home-size', 'pesan-home');
        }

        return status;
    }

    function editFasilitas(id){
        // console.log('Fasilitas: '+$('.Fasilitas'+id).text()+' Satuan: '+$('.satuan'+id).text()+' Nilai: '+$('.nilai'+id).text());
        $('#idEditFasilitas').val(id);
        $('#fasilitasEditFasilitas').val($('.fasilitas'+id).text());
        $('#jumlahEditFasilitas').val($('.jumlah'+id).text());
    }

    function hapus(id_gambar, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus gambar?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "{{route('tipe.edit.deleteGambar')}}",
                    method: 'POST',
                    data: {
                        _token: $('#signup-token').val(),
                        id: id_gambar,
                    },
                    success: function(result){
                        $("#zero_config").find('tbody tr:eq('+String(numRow-1)+')').hide();
                        alert(result.success);
                    }
            });
        }
    }

    function hapusFasilitas(idFasilitas, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus Fasilitas ini?");
        if(konfirmasi == true){
            jQuery.ajax({
                url: "{{route('tipe.delete.fasilitas')}}",
                method:'POST',
                data: {
                    _token: $('#signup-token').val(),
                    id: idFasilitas,
                },
                success: function(result){
                    $("#tabel-fasilitas").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    alert(result.success);
                }
            });
        }
    }

    $(document).ready(function(){
        $('.pesan').hide();

        $('#jenis_property').change(function(){
            if($('#jenis_property').val() == 'tanah'){
                $('#home_size').attr('readonly','');
                $('#home_size').val(0);
            }else{
                $('#home_size').removeAttr('readonly');
            }
        });

        $('#formAddFasilitas').submit(function(e){
            var jumlah = $('#jumlahAddFasilitas').val();
            var  fasilitas = $('#fasilitas_val').val();
            if(isNaN(jumlah)){
                e.preventDefault();
                showValidation('addFasilitasDanger','pesan-addFasilitas', 'jumlah tidak boleh selain angka');
            }else if(jumlah <= 0){
                e.preventDefault();
                showValidation('addFasilitasDanger','pesan-addFasilitas', 'jumlah tidak boleh kurang dari sama dengan 0');
            }else if(fasilitas == null || fasilitas == ''){
                e.preventDefault();
                showValidation('addFasilitasDanger','pesan-addFasilitas', 'Seluruh Fasilitas telah ada pada perumahan');
            }
        });

        $('#formEditFasilitas').submit(function(e){
            var jumlah = $('#jumlahEditFasilitas').val();
            if(isNaN(jumlah)){
                e.preventDefault();
                showValidation('editFasilitasDanger','pesan-editFasilitas', 'jumlah tidak boleh selain angka');
            }else if(jumlah <= 0){
                e.preventDefault();
                showValidation('editFasilitasDanger','pesan-editFasilitas', 'jumlah tidak boleh kurang dari sama dengan 0');
            }
        });

        $('#tombol').click(function(){
            var qty = 0;
            var id = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('tipe.find') }}",
                data: {_token: $('#signup-token').val(),tipe_name: $('#tipe_name').val(),},
                success: function (data){
                    qty = data.qty;
                    id = data.id;
                    
                        var status = validasi();
                        if(status){
                            if(qty < 1 || (qty >= 1 && data.id == {{$type->id}})){
                                jQuery.ajax({
                                    url: "/admin/tipe/{{$type->id}}",
                                    method: 'put',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        tipe_name: $('#tipe_name').val(),
                                        jenis_property: $('#jenis_property').val(),
                                        price: $('#price').val(),
                                        description: $('#description').val(),
                                        land_size: $('#land_size').val(),
                                        home_size: $('#home_size').val(),
                                    },
                                    success: function(result){
                                        alert("Tipe Rumah baru telah berhasil diupdate")
                                        // window.location.href = "{{route('tipe.index')}}";
                                        // console.log(result.success);
                                    }
                                });
                                console.log('ifnya keajax');
                            }else if(qty >= 1 && data.id != {{$type->id}}){
                                showValidation('tipe-name','pesan-name','Tipe Rumah sudah ada dalam database');
                            }
                        }else{
                            console.log('ifnya ke else terakhir. status: '+status);
                        }
                    
                    console.log('id: '+id+' id2: {{$type->id}}');
                },
                error: function(e) {
                    console.log(e);
            }});

            
        });
    
    });

</script>