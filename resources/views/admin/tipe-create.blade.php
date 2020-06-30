@extends('layouts.admin')

@push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush

@section('title')
    <a href="{{route('tipe.index')}}">Tipe Perumahan</a><li class="breadcrumb-item"></li>Create
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
                    <h4 class="card-title text-white">Menambah Data Tipe Perumahan</h4>
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
                                            <input type="text" id="tipe_name" class="form-control" placeholder="Masukkan nama tipe" name="tipe_name"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
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
                                                <option value="tanah">Tanah</option>
                                                <option value="rumah">Rumah</option>
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
                                            <input type="text" id="price" class="form-control" placeholder="Masukkan harga Tipe" name="price"><small id="pesan-price" class="pesan form-control-feedback">Masukan salah</small></div>
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
                                    <div id="land-size" class="form-group row">
                                        <label class="control-label text-left col-md-2">Luas Tanah (m<sup>2</sup>)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="land_size" class="form-control" placeholder="Masukkan luas tanah" name="land_size"><small id="pesan-land" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="home-size" class="form-group row">
                                        <label class="control-label text-left col-md-2">Luas Rumah (m<sup>2</sup>)*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="home_size" class="form-control" placeholder="Masukkan luas rumah" name="home_size"><small id="pesan-home" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            
                            </form>
                            
                        </div>
                        
                        
                        <div class="card-body">
                            <h4 class="card-title">Gambar Tipe Perumahan</h4>
                            <div id="image" class="form-group has-danger row">
                                <div class="col-md-9">
                                <small id="pesan-image" class="pesan form-control-feedback">Masukan salah</small></div>
                            </div>
                            <form action="{{route('tipe.store.image')}}" class="dropzone" enctype="multipart/form-data" id="dropzone">
                                @csrf
                            </form>
                            </div>
                        <hr>
                        <div class="form-actions">
                            <div class="card-body">
                                <div class="text-right">
                                    <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                    <a href="{{route('tipe.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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

{{-- @push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
@endpush --}}

<script>
    var judul = [];

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

    function validasi(judul){
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
            showValidation('tipe-name','pesan-name','Tolonng masukkan nama tipe perumahan yang benar');
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

        if(judul.length == 0){
            showValidation('image','pesan-image','Tolong masukkan gambar');
            status = 0;
        }else{
            correctValidation('image','pesan-image');
        }

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
                    url: "{{ route('tipe.delete.image') }}",
                    data: {_token: $('#signup-token').val(),filename: name,},
                    success: function (data){
                        console.log("File has been successfully removed!!");
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

        $('#jenis_property').change(function(){
            if($('#jenis_property').val() == 'tanah'){
                $('#home_size').attr('readonly','');
                $('#home_size').val(0);
            }else{
                $('#home_size').removeAttr('readonly');
            }
        })

        $('#tombol').click(function(){
            var qty = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('tipe.find') }}",
                data: {_token: $('#signup-token').val(),tipe_name: $('#tipe_name').val(),},
                success: function (data){
                    qty = data.qty;
                    if(qty >= 1){
                        showValidation('tipe-name','pesan-name','Tipe Perumahan sudah ada dalam database');
                        var status = 0;
                    }

                        var status = validasi(judul);
                        if(status){
                            if(!qty){
                                jQuery.ajax({
                                    url: "{{route('tipe.store')}}",
                                    method: 'post',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        tipe_name: $('#tipe_name').val(),
                                        jenis_property: $('#jenis_property').val(),
                                        price: $('#price').val(),
                                        description: $('#description').val(),
                                        land_size: $('#land_size').val(),
                                        home_size: $('#home_size').val(),
                                        images: JSON.stringify(judul),
                                    },
                                    success: function(result){
                                        alert("Tipe Perumahan baru telah berhasil dimasukkan")
                                        window.location.href = "{{route('tipe.index')}}";
                                        // console.log(result.success);
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