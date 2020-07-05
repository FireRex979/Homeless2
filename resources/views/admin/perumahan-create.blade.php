@extends('layouts.admin')

@push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush

@section('title')
    <a href="{{route('perumahan.index')}}">Perumahan</a><li class="breadcrumb-item"></li>Create
@endsection

@section('content')
<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="col-md-7 col-12 align-self-center d-none d-md-block">
    <div class="d-flex mt-2 justify-content-end">
    </div>
</div>
</div>

<div class="container-fluid">
    <!-- Row -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="row"id="status" role="alert">       
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="mb-0 text-white">Sucess</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">{{session('status')}}</h3>
                        <p class="card-text"></p>                  
                        <a href="javascript:void(0)" class="btn btn-inverse" id="close1">Close</a>
                    </div>
                </div>
            </div>
        </div>        
    @endif

    <div class="row"id="status-hapus" style="display: none">       
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-success">
                    <h4 class="mb-0 text-white">Sucess</h4></div>
                <div class="card-body">
                    <h3 class="card-title" id="pesan"></h3>
                    <p class="card-text"></p>
                    <a href="javascript:void(0)" class="btn btn-inverse" id="close2">Close</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header bg-info">
                    <h4 class="card-title text-white">Menambah Data Perumahan</h4>
                </div>
                    <div class="form-body">
                        <div class="card-body">
                            <h6 class="card-subtitle">Tanda * merupakan form yang tidak boleh kosong</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="perumahan-name" class="form-group row">
                                        <label class="control-label text-left col-md-2">Nama Perumahan*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="perumahan_name" class="form-control" placeholder="Masukkan nama perumahan" name="perumahan_name"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="addreses" class="form-group row">
                                        <label class="control-label text-left col-md-2">Alamat*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="address" class="form-control" placeholder="Masukkan alamat perumahan" name="address"><small id="pesan-address" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="descriptions" class="form-group row">
                                        <label class="control-label text-left col-md-2">Deskription*</label>
                                        <div class="col-md-9">
                                            <textarea id="description" class="form-control" rows="5" placeholder="Masukkan deskripsi" name="description"></textarea><small id="pesan-description" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="tipe-perumahan" class="form-group row">
                                        <label class="control-label text-left col-md-2">Tipe Perumahan*</label>
                                        <div class="col-md-9">
                                            <small class="form-control-feedback">Pilih Jenis Tipe Perumahan</small>
                                            <select  id="tipe_perumahan" class="select2 form-control" name="tipe[]" multiple="multiple" style="height: 36px;width: 100%;">
                                                <optgroup label="Jenis Tipe Perumahan">
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}">{{$type->tipe_name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            <small id="pesan-tipe" class="pesan form-control-feedback">Masukan salah</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div id="fasilitases" class="form-group row">
                                        <label class="control-label text-left col-md-2">Fasilitas Perumahan*</label>
                                        <div class="col-md-9">
                                            <small class="form-control-feedback">Pilih Jenis Fasilitas</small>
                                            <select  id="fasilitas" class="select2 form-control" name="fasilitas[]" multiple="multiple" style="height: 36px;width: 100%;">
                                                <optgroup label="Fasilitas Perumahan">
                                                    @foreach ($fasilitases as $fasilitas)
                                                        <option value="{{$fasilitas->id}}">{{$fasilitas->fasilitas}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            <small id="pesan-fasilitas" class="pesan form-control-feedback">Masukan salah</small>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                             <!--/row-->
                             <div class="row">
                                <div class="col-md-12">
                                    <div id="kelebihans" class="form-group row">
                                        <label class="control-label text-left col-md-2">Kelebihan Perumahan*</label>
                                        <div class="col-md-9">
                                            <small class="form-control-feedback">Pilih Jenis Kelebihan</small>
                                            <select  id="kelebihan" class="select2 form-control" name="kelebihan[]" multiple="multiple" style="height: 36px;width: 100%;">
                                                <optgroup label="Kelebihan Perumahan">
                                                    @foreach ($kelebihans as $kelebihan)
                                                        <option value="{{$kelebihan->id}}">{{$kelebihan->kelebihan}} - {{$kelebihan->satuan}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            <small id="pesan-kelebihan" class="pesan form-control-feedback">Masukan salah</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                       </form>     
                    </div>
                        
                        
                        <div class="card-body">
                            <h4 class="card-title">Gambar Perumahan</h4>
                            <div id="image" class="form-group has-danger row">
                                <div class="col-md-9">
                                <small id="pesan-image" class="pesan form-control-feedback">Masukan salah</small></div>
                            </div>
                            <form action="{{route('perumahan.store.image')}}" class="dropzone" enctype="multipart/form-data" id="dropzone">
                                @csrf
                            </form>
                            </div>
                        <hr>
                        <div class="form-actions">
                            <div class="card-body">
                                <div class="text-right">
                                    <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                    <a href="{{route('perumahan.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div> 
    </div>

    
</div>


@endsection
<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>


@push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>

@endpush

<script>
    var judul = [];

    function showValidation(idDiv,idPesan,pesan){
        $('#'+idDiv).attr('class', 'form-group has-danger row');
        $('#'+idPesan).show();
        $('#'+idPesan).html(pesan);
        console.log($('#fasilitas').val());
        window.scrollTo(0, document.querySelector(".container-fluid").offsetTop);
    }

    function correctValidation(idDiv,idPesan){
        $('#'+idDiv).attr('class', 'form-group row');
        $('#'+idPesan).hide();
    }

    function arrKosong(arr,idDiv,idPesan,pesan){
        if(arr.length == 0){
            showValidation(idDiv,idPesan,pesan+' Tidak Boleh Kosong');
            status = 0;
        }else{
            correctValidation(idDiv,idPesan);
        }
    }

    function validasi(judul){
        var status = 1;
        var perumahan_name = $('#perumahan_name').val();
        var address = $('#address').val();
        var description = $('#description').val();
        var fasilitas = $('#fasilitas').val();
        var tipe = $('#tipe_perumahan').val();
        var kelebihan = $('#kelebihan').val();


        if(perumahan_name == null || perumahan_name == ""){
            showValidation('perumahan-name','pesan-name','Masukan nama perumahan tidak boleh kosong');
            status = 0;
        }else if(perumahan_name.length < 3){
            showValidation('perumahan-name','pesan-name','Tolonng masukkan nama tipe perumahan yang benar');
            status = 0;
        }else{
            correctValidation('perumahan-name', 'pesan-name');
        }

        if(address == null || address == ''){
            showValidation('addreses','pesan-address','Masukan Alamat tidak boleh kosong');
            status = 0;
        }else{
            correctValidation('addreses', 'pesan-address');
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

        arrKosong(judul,'images','pesan-image', 'Gambar');
        // arrKosong(fasilitas, 'fasilitases', 'pesan-fasilitas', 'Fasilitas');
        arrKosong(kelebihan, 'kelebihans', 'pesan-kelebihan', 'Kelebihan');
        arrKosong(tipe, 'tipe-perumahan', 'pesan-tipe', 'Tipe Perumahan');
        

        return status;
    }

    Dropzone.options.dropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            removedfile: function(file){
                var name = file.upload.filename;
                var indexArr = judul.indexOf(name);
                judul.splice(indexArr,1);
                var fileRef;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('perumahan.delete.image') }}",
                    data: {_token: $('#signup-token').val(),filename: name,},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                        console.log(judul);
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
                console.log(judul);
            },
            success: function(file, response) 
            {
                judul.push(response['success'])
                console.log(judul);
            },
            error: function(file, response)
            {
               return false;
            }
    };

    $(document).ready(function(){
        $('.pesan').hide();

        $('#tombol').click(function(){
            var qty = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('perumahan.find') }}",
                data: {_token: $('#signup-token').val(),perumahan_name: $('#perumahan_name').val(),},
                success: function (data){
                    qty = data.qty;
                    if(qty >= 1){
                        showValidation('peruhaman-name','pesan-perumahan','Tipe Perumahan sudah ada dalam database');
                        var status = 0;
                    }

                        var status = validasi(judul);
                        if(status){
                            if(!qty){
                                jQuery.ajax({
                                    url: "{{route('perumahan.store')}}",
                                    method: 'post',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        perumahan_name: $('#perumahan_name').val(),
                                        alamat: $('#address').val(),
                                        description: $('#description').val(),
                                        kelebihan: JSON.stringify($('#kelebihan').val()),
                                        tipe: JSON.stringify($('#tipe_perumahan').val()),
                                        images: JSON.stringify(judul),
                                    },
                                    success: function(result){
                                        alert("Tipe Perumahan baru telah berhasil dimasukkan")
                                        window.location.href = "/admin/perumahan/"+result.id+"/edit";
                                        
                                    }
                                });
                            }else{
                                showValidation('tipe-name','pesan-name','Tipe Perumahan sudah ada dalam database');
                            }
                        }else{
                            
                        }
                    
                    console.log(qty);
                },
                error: function(e) {
                    console.log(e);
            }});

            
        });

    });

</script>