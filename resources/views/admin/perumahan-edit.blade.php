@extends('layouts.admin')

{{-- @push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush --}}

@section('title')
    <a href="{{route('perumahan.index')}}">Perumahan</a><li class="breadcrumb-item"></li>Edit
@endsection

@section('content')

<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="col-md-7 col-12 align-self-center d-none d-md-block">
    <div class="d-flex mt-2 justify-content-end">
    </div>
</div>
</div>

<div class="container-fluid">
    @if ($statusKelebihan)
        <div class="row"id="status" role="alert">       
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0 text-white">Peringatan</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Form Kelebihan Perumahan</h3>
                        <p class="card-text">Kolom 'nilai' dari kelebihan perumahan yang baru dimasukkan belum di berikan data. Jadi isikan data nilai kelebihan sesuai dengan kebutuhan!</p>                  
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
                    <h4 class="card-title text-white">Edit Data Tipe Perumahan</h4>
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
                                                <input type="text" id="perumahan_name" class="form-control" placeholder="Masukkan nama perumahan" name="perumahan_name" value="{{$perum->perumahan_name}}"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
                                        </div>
                                    </div>
                                </div>
    
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="addreses" class="form-group row">
                                            <label class="control-label text-left col-md-2">Alamat*</label>
                                            <div class="col-md-9">
                                                <input type="text" id="address" class="form-control" placeholder="Masukkan alamat perumahan" name="address" value="{{$perum->address}}"><small id="pesan-address" class="pesan form-control-feedback">Masukan salah</small></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="descriptions" class="form-group row">
                                            <label class="control-label text-left col-md-2">Deskription*</label>
                                            <div class="col-md-9">
                                                <textarea id="description" class="form-control" rows="5" placeholder="Masukkan deskripsi" name="description">{{$perum->description}}</textarea><small id="pesan-description" class="pesan form-control-feedback">Masukan salah</small></div>
                                        </div>
                                    </div>
                                </div>                            
                            </form>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="text-right">
                                        <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                        <a href="{{route('perumahan.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <hr>
                        <div class="card-body">
                            <h4 class="card-title">Kelebihan Perumahan</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addKelebihan">+ Tambah Kelebihan Perumahan</button>
                            <br><br>

                            <div class="table-responsive">
                                <table id="tabel-kelebihan" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kelebihan</th>
                                            <th>Satuan</th>
                                            <th>Nilai</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($perum->kelebihan)
                                            @foreach ($perum->kelebihan as $kelebihan)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="kelebihan{{$kelebihan->pivot->id}}">{{$kelebihan->kelebihan}}</td>
                                                <td class="satuan{{$kelebihan->pivot->id}}">{{$kelebihan->satuan}}</td>
                                                <td class="nilai{{$kelebihan->pivot->id}}">{{$kelebihan->pivot->nilai}}</td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#editKelebihan" data-placement="top" title="Edit" onclick="editKelebihan({{$kelebihan->pivot->id}})"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="hapusKelebihan({{$kelebihan->pivot->id}}, {{$loop->iteration}})"><i class="fa fa-trash"></i></button>
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
                        <div class="card-body">
                            <h4 class="card-title">Tipe Perumahan</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addTipe">+ Tambah Tipe Perumahan</button>
                            <br><br>

                            <div class="table-responsive">
                                <table id="tabel-tipe" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tipe Perumahan</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($perum->tipe)
                                            @foreach ($perum->tipe as $tipe)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$tipe->tipe_name}}</td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('tipe.edit', $tipe->id)}}"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="hapusTipe({{$tipe->pivot->id}}, {{$loop->iteration}})"><i class="fa fa-trash"></i></button>
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
                            <h4 class="card-title">Gambar Perumahan</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addFasilitas">+ Tambah Gambar Perumahan</button>
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
                                        @if ($perum->image)
                                            @foreach ($perum->image as $image)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset($image->image)}}" alt="gambar tipe perumahan" style="width: 300px; height: 150px"></td>
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
            <form action="{{route('perumahan.edit.addGambar')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="id" value="{{$perum->id}}">
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


<div class="modal fade" id="addKelebihan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelebihan Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddKelebihan" action="{{route('perumahan.edit.addKelebihan')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="perumahan_id" value="{{$perum->id}}">
                        <label class="control-label text-left">Kelebihan Perumahan*</label>
                        <select  id="kelebihan_val" class="form-control" name="kelebihan_id">
                            <optgroup label="Kelebihan Perumahan">
                                @foreach ($kelebihans as $kelebihan)
                                    <option value="{{$kelebihan->id}}">{{$kelebihan->kelebihan}} - {{$kelebihan->satuan}}</option>
                                @endforeach
                            </optgroup>
                        </select>                    
                    </div>
                    <div id="addKelebihanDanger" class="form-group">
                        <label class="control-label text-left">Nilai Kelebihan*</label>
                        <input type="text" name="nilai" class="form-control" id="nilaiAddKelebihan">
                        <small id="pesan-addKelebihan" class="pesan form-control-feedback">Masukan salah</small>
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

<div class="modal fade" id="addTipe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tipe Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddTipe" action="{{route('perumahan.edit.addTipe')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="perumahan_id" value="{{$perum->id}}">
                        <label class="control-label text-left">Tipe Perumahan*</label>
                        <select  id="tipe_val" class="select2 form-control" name="tipe[]" multiple="multiple" style="height: 36px;width: 100%;">
                            <optgroup label="Tipe Perumahan">
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->tipe_name}}</option>
                                @endforeach
                            </optgroup>
                        </select>                    
                    </div>
                    <div id="addTipeDanger" class="form-group">
                        <small id="pesan-addTipe" class="pesan form-control-feedback">Masukan salah</small>
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



<div class="modal fade" id="editKelebihan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Edit Kelebihan Perumahan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditKelebihan" action="{{route('perumahan.edit.kelebihan')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Kelebihan</label>
                        <input id="idEditKelebihan" type="hidden" name="id" value="">
                        <input id="kelebihanEditKelebihan" type="input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input id="satuanEditKelebihan" type="input" class="form-control" readonly>
                    </div>
                    <div id="editKelebihanDanger" class="form-group has-success">
                        <label>Nilai</label>
                        <input id="nilaiEditKelebihan" type="input" class="form-control" name="nilai">
                        <small id="pesan-editKelebihan" class="pesan form-control-feedback">Masukan salah</small>
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

@push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>@endpush
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
        var perumahan_name = $('#perumahan_name').val();
        var address = $('#address').val();
        var description = $('#description').val();


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
        

        return status;
    }

    function editKelebihan(id){
        // console.log('Kelebihan: '+$('.kelebihan'+id).text()+' Satuan: '+$('.satuan'+id).text()+' Nilai: '+$('.nilai'+id).text());
        $('#idEditKelebihan').val(id);
        $('#kelebihanEditKelebihan').val($('.kelebihan'+id).text());
        $('#satuanEditKelebihan').val($('.satuan'+id).text());
        $('#nilaiEditKelebihan').val($('.nilai'+id).text());
    }

    function hapus(id_gambar, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus gambar?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "{{route('perumahan.edit.deleteGambar')}}",
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

    function hapusKelebihan(idKelebihan, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus kelebihan ini?");
        if(konfirmasi == true){
            jQuery.ajax({
                url: "{{route('perumahan.delete.kelebihan')}}",
                method:'POST',
                data: {
                    _token: $('#signup-token').val(),
                    id: idKelebihan,
                },
                success: function(result){
                    $("#tabel-kelebihan").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    alert(result.success);
                }
            });
        }
    }

    function hapusTipe(idTipe, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus tipe perumahan ini?");
        if(konfirmasi == true){
            jQuery.ajax({
                url: "{{route('perumahan.delete.tipe')}}",
                method:'POST',
                data: {
                    _token: $('#signup-token').val(),
                    id: idTipe,
                },
                success: function(result){
                    $("#tabel-tipe").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    alert(result.success);
                }
            });
        }
    }

    $(document).ready(function(){
        $('.pesan').hide();

        $("#close1").click(function(e){
            $('#status').hide();
        });

        $('#formEditKelebihan').submit(function(e){
            var nilai = $('#nilaiEditKelebihan').val();
            if(isNaN(nilai)){
                e.preventDefault();
                showValidation('editKelebihanDanger','pesan-editKelebihan', 'Nilai tidak boleh selain angka');
            }else if(nilai <= 0){
                e.preventDefault();
                showValidation('editKelebihanDanger','pesan-editKelebihan', 'Nilai tidak boleh kurang dari sama dengan 0');
            }
            console.log(typeof(nilai));
        });


        $('#formAddKelebihan').submit(function(e){
            var nilai = $('#nilaiAddKelebihan').val();
            var kelebihan = $('#kelebihan_val').val();
            if(isNaN(nilai)){
                e.preventDefault();
                showValidation('addKelebihanDanger','pesan-addKelebihan', 'Nilai tidak boleh selain angka');
            }else if(nilai <= 0){
                e.preventDefault();
                showValidation('addKelebihanDanger','pesan-addKelebihan', 'Nilai tidak boleh kurang dari sama dengan 0');
            }else if(kelebihan == null || kelebihan == ''){
                e.preventDefault();
                showValidation('addKelebihanDanger','pesan-addKelebihan', 'Seluruh Kelebihan telah ada pada perumahan');

            }
        });

        $('#formAddTipe').submit(function(e){
            var tipe = $('#tipe_val').val();
            if(tipe == null || tipe == ''){
                e.preventDefault();
                showValidation('addTipeDanger','pesan-addTipe', 'Seluruh Tipe telah ada pada perumahan');
            }
        });

        $('#tombol').click(function(){
            var qty = 0;
            var id = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('perumahan.find') }}",
                data: {_token: $('#signup-token').val(),perumahan_name: $('#perumahan_name').val(),},
                success: function (data){
                    qty = data.qty;
                    id = data.id;
                    
                        var status = validasi();
                        if(status){
                            if(qty < 1 || (qty >= 1 && data.id == {{$perum->id}})){
                                jQuery.ajax({
                                    url: "/admin/perumahan/{{$perum->id}}",
                                    method: 'put',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        perumahan_name: $('#perumahan_name').val(),
                                        address: $('#address').val(),
                                        description: $('#description').val(),
                                    },
                                    success: function(result){
                                        alert("Tipe Perumahan baru telah berhasil diupdate")
                                        // window.location.href = "{{route('perumahan.index')}}";
                                        // console.log(result.success);
                                    }
                                });
                                console.log('ifnya keajax');
                            }else if(qty >= 1 && data.id != {{$perum->id}}){
                                showValidation('perumahan-name','pesan-name','Tipe Perumahan sudah ada dalam database');
                            }
                        }else{
                            console.log('ifnya ke else terakhir. status: '+status);
                        }
                    
                    console.log('id: '+id+' id2: {{$perum->id}}');
                },
                error: function(e) {
                    console.log(e);
            }});

            
        });
    
    });

</script>