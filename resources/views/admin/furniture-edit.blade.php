@extends('layouts.admin')

{{-- @push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush --}}

@section('title')
    <a href="{{route('tipe.index')}}">Furniture</a><li class="breadcrumb-item"></li>Edit
@endsection

@section('content')
{{-- @php
    dd($ftr)
@endphp --}}

<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="col-md-7 col-12 align-self-center d-none d-md-block">
    <div class="d-flex mt-2 justify-content-end">
    </div>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header bg-info">
                    <h4 class="card-title text-white">Edit Data Furniture</h4>
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
                                        <label class="control-label text-left col-md-2">Nama Furniture*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="tipe_name" class="form-control" placeholder="Masukkan nama tipe" name="furniture_name" value="{{$ftr->furniture_name}}"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="prices" class="form-group row">
                                        <label class="control-label text-left col-md-2">Price (Rp)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="price" class="form-control" placeholder="Masukkan harga Tipe" name="price" value="{{$ftr->price}}"><small id="pesan-price" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="descriptions" class="form-group row">
                                        <label class="control-label text-left col-md-2">Deskription*</label>
                                        <div class="col-md-9">
                                        <textarea id="description" class="form-control" rows="5" placeholder="Masukkan deskripsi" name="description">{{$ftr->description}}</textarea><small id="pesan-description" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>

                                                        <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="jenis-property" class="form-group row">
                                        <label class="control-label text-left col-md-2">Jenis Tipe</label>
                                        <div class="col-md-9">
                                            <select  id="jenis_property" class="form-control custom-select" name="category_id">
                                                <option value="">Pilih Kategori Furniture</option>
                                                @foreach ($kategoriFurnitures as $item)
                                                    <option value="{{$item->id}}" @if ($item->id == $ftr->category_id)
                                                        selected
                                                    @endif>{{$item->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="pesan-property" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            
                            
                            </form>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="text-right">
                                        <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                        <a href="{{route('furniture.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                        <hr>
                        <div id="view-gambar" class="card-body">
                            <h4 class="card-title">Gambar Furniture</h4>
                            
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
                                        @if ($ftr->image)
                                            @foreach ($ftr->image as $image)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset($image->furniture_image)}}" alt="gambar Furniture" style="width: 300px; height: 150px"></td>
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
            <form action="{{route('furniture.edit.addGambar')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="id" value="{{$ftr->id}}">
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


        if(tipe_name == null || tipe_name == ""){
            showValidation('tipe-name','pesan-name','Masukan nama tipe tidak boleh kosong');
            status = 0;
        }else if(tipe_name.length < 3){
            showValidation('tipe-name','pesan-name','Tolonng masukkan nama Furniture yang benar');
            status = 0;
        }else{
            correctValidation('tipe-name', 'pesan-name');
        }

        if(jenis_property == null || jenis_property == ''){
            showValidation('jenis-property','pesan-property','Tolonng pilih kategori furniture');
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

        return status;
    }

    function hapus(id_gambar, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus gambar?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "{{route('furniture.edit.deleteGambar')}}",
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

    $(document).ready(function(){
        $('.pesan').hide();

        $('#tombol').click(function(){
            var qty = 0;
            var id = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('furniture.find') }}",
                data: {_token: $('#signup-token').val(),tipe_name: $('#tipe_name').val(),},
                success: function (data){
                    qty = data.qty;
                    id = data.id;
                    
                        var status = validasi();
                        if(status){
                            if(qty < 1 || (qty >= 1 && data.id == {{$ftr->id}})){
                                jQuery.ajax({
                                    url: "/admin/furniture/{{$ftr->id}}",
                                    method: 'PUT',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        furniture_name: $('#tipe_name').val(),
                                        category_id: $('#jenis_property').val(),
                                        price: $('#price').val(),
                                        description: $('#description').val(),
                                    },
                                    success: function(result){
                                        alert("Furniture telah berhasil diupdate")
                                        // window.location.href = "{{route('tipe.index')}}";
                                        // console.log(result.success);
                                    }
                                });
                                console.log('ifnya keajax');
                            }else if(qty >= 1 && data.id != {{$ftr->id}}){
                                showValidation('tipe-name','pesan-name','Furniture sudah ada dalam database');
                            }
                        }else{
                            console.log('ifnya ke else terakhir. status: '+status);
                        }
                    
                    console.log('id: '+id+' id2: {{$ftr->id}}');
                },
                error: function(e) {
                    console.log(e);
            }});

            
        });
    
    });

</script>