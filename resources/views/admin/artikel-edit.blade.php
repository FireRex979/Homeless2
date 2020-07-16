@extends('layouts.admin')

@push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/summernote/dist/summernote-bs4.css')}}">
@endpush

@section('title')
    <a href="{{route('artikel.index')}}">Artikel</a><li class="breadcrumb-item"></li>Create
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
                    <h4 class="card-title text-white">Menambah Artikel</h4>
                </div>
                    <div class="form-body">
                        <div class="card-body">
                            <h6 class="card-subtitle">Tanda * merupakan form yang tidak boleh kosong</h6>
                        </div>
                        <div class="card-body">
                            <form id="addArtikel" action="{{route('artikel.update', $artikel->id)}}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="titles" class="form-group row">
                                        <label class="control-label text-left col-md-2">Judul Artikel*</label>
                                        <div class="col-md-9">
                                            <input type="text" id="title" class="form-control" placeholder="Masukkan judul artikel" name="title" value="{{$artikel->title}}"><small id="pesan-title" class="pesan form-control-feedback">Masukan salah</small></div>
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="kategoris" class="form-group row">
                                        <label class="control-label text-left col-md-2">Kategori*</label>
                                        <div class="col-md-9">
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="">Pilih Kategori Artikel</option>
                                                @if ($kategori)
                                                    @foreach ($kategori as $item)
                                                        <option value="{{$item->id}}" @if ($item->id == $artikel->category_id)
                                                            selected
                                                        @endif>{{$item->category_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <small id="pesan-kategori" class="pesan form-control-feedback">Masukan salah</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="card-title">Konten Artikel</h4>
                            <div class="col-md-12">
                                        <div id="contents">
                                            <small id="pesan-content" class="pesan form-control-feedback">Masukan salah</small>
                                        </div>
                                
                                        <textarea id="content" class="summernote" name="content">{{$artikel->content}}</textarea>

                            </div>
                            
                            <hr>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="text-right">
                                        <button type="submit" id="tombol" class="btn btn-info">Submit</button>
                                        <a href="{{route('artikel.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


@endsection
<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/admin/src/assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>



@push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('assets/admin/src/assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
@endpush

<script>
    /************************************/
    //default editor
    /************************************/
    
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


    function validasi(){
        var status = 1;
        var title = $('#title').val();
        var kategori = $('#kategori').val();
        var content = $('#content').val();
        var fasilitas = $('#fasilitas').val();
        var tipe = $('#tipe_perumahan').val();
        var kelebihan = $('#kelebihan').val();


        if(title == null || title == ""){
            showValidation('titles','pesan-title','Masukan judul tidak boleh kosong');
            status = 0;
        }else if(title.length < 3){
            showValidation('titles','pesan-title','Tolong masukkan judul tipe perumahan yang benar');
            status = 0;
        }else{
            correctValidation('titles', 'pesan-title');
        }

        if(kategori == null || kategori == ''){
            showValidation('kategoris','pesan-kategori','Masukan kategori tidak boleh kosong');
            status = 0;
        }else{
            correctValidation('kategoris', 'pesan-kategori');
        }

        if(content == null || content == ""){
            showValidation('contents','pesan-content','Masukan content tidak boleh kosong');
            status = 0;
        }else if(content.length < 3){
            showValidation('contents','pesan-content','Tolonng masukkan content perumahan yang benar');
            status = 0;
        }else{
            correctValidation('contents', 'pesan-content');
        }        

        return status;
    }

    $(document).ready(function(e){
        var status;
        $('.pesan').hide();

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('#addArtikel').submit(function(e){
            status = validasi();
            if(!status){
                e.preventDefault();
            }
        });
    });

</script>



