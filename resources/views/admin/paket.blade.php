@extends('layouts.admin')

@push('script')
    <link href="{{asset('/assets/admin/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush

@section('title', 'Furniture')
    
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
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Paket Furniture</h2>
                    <h6 class="card-subtitle"></h6>
                    <br>
                        <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                        data-target="#addFasilitas">+ Tambah Paket Furniture</button>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket Furniture</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Furnitures</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($paketFurnitures)
                                    @foreach ($paketFurnitures as $paket)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$paket->paket_name}}</td>
                                        <td>{{$paket->price_total}}</td>
                                        <td>{{$paket->description}}</td>
                                        <td>@if ($paket->furniture)
                                            @foreach ($paket->furniture as $item)
                                                {{$item->furniture_name}} <br>
                                            @endforeach
                                        @endif</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{route('paket-furniture.edit', $paket->id)}}"><button class="edit btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="hapus btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" onclick="hapus({{$paket->id}},{{$loop->iteration}})"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                        <tr>
                                            <td>Belum ada kelebihan</td>
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
 
@endsection

@section('modal')
<!-- .modal for add task -->
<div class="modal fade" id="addFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Paket Furniture</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAdd" action="{{route('paket-furniture.store')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div id="paket-name" class="form-group">
                        <label>Nama Paket*</label>
                        <input id="paket_name" type="text" class="form-control"
                            placeholder="Masukkan nama paket" name="paket_name">
                        <small id="pesan-paket" class="pesan form-control-feedback">Masukan salah</small>
                    </div>

                    <div id="descriptions" class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        <small id="pesan-description" class="pesan form-control-feedback">Masukan salah</small>
                    </div>
                    
                    <div id="furnitures" class="form-group">
                        <label>Furniture</label>
                        <select  id="furniture" class="select2 form-control" name="furniture[]" multiple="multiple" style="height: 36px;width: 100%;">
                            <optgroup label="Kelebihan Perumahan">
                                @foreach ($furnitures as $furniture)
                                    <option value="{{$furniture->id}}">{{$furniture->furniture_name}} - Rp{{$furniture->price}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <small id="pesan-furniture" class="pesan form-control-feedback">Masukan salah</small>
                    </div>

                    <div class="form-group">
                        <label>Total Harga Furniture</label>
                        <input type="text" id="total-harga" class="form-control"
                            placeholder="Masukkan harga paket furniture" name="total-harga" readonly></div>
                    
                    <div id="prices" class="form-group">
                        <label>Harga Paket (Rp)</label>
                        <input id="price" type="text" class="form-control"
                            placeholder="Masukkan harga paket furniture" name="price">
                        <small id="pesan-price" class="pesan form-control-feedback">Masukan salah</small>
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
    <!-- /.modal-dialog -->  

    <div class="modal fade" id="editFurniture" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Paket Furniture</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEdit" action="{{route('paket-furniture.store')}}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div id="edit-paket-name" class="form-group">
                            <label>Nama Paket*</label>
                            <input id="edit-paket_name" type="text" class="form-control"
                                placeholder="Masukkan nama paket" name="paket_name">
                            <small id="edit-pesan-paket" class="pesan form-control-feedback">Masukan salah</small>
                        </div>
                        
                        <div id="edit-furnitures" class="form-group">
                            <label>Furniture</label>
                            <select  id="edit-furniture" class="select2 form-control" name="furniture[]" multiple="multiple" style="height: 36px;width: 100%;">
                                <optgroup label="Kelebihan Perumahan">
                                    @foreach ($furnitures as $furniture)
                                        <option value="{{$furniture->id}}">{{$furniture->furniture_name}} - Rp{{$furniture->price}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <small id="edit-pesan-furniture" class="pesan form-control-feedback">Masukan salah</small>
                        </div>
    
                        <div class="form-group">
                            <label>Total Harga Furniture</label>
                            <input type="text" id="total-harga" class="form-control"
                                placeholder="Masukkan harga paket furniture" name="total-harga" readonly></div>
                        
                        <div id="edit-prices" class="form-group">
                            <label>Harga Paket (Rp)</label>
                            <input id="price" type="text" class="form-control"
                                placeholder="Masukkan harga paket furniture" name="price">
                            <small id="edit-pesan-price" class="pesan form-control-feedback">Masukan salah</small>
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
        <!-- /.modal-dialog -->  

    
@endsection


<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>

@push('script_bawah')
<!--This page plugins -->

<script src="{{asset('/assets/admin/src/assets/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/custom-datatable.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>

@endpush

<script>
    function hapus(id_tipe, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus paket furniture?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "/admin/paket-furniture/"+id_tipe,
                    method: 'delete',
                    data: {
                        _token: $('#signup-token').val(),
                    },
                    success: function(result){
                        $("#pesan").text("Paket Furniture telah berhasil dihapus");
                        $("#status-hapus").show();
                        $("#zero_config").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    }
            });
        }
    }

    function showValidation(idDiv,idPesan,pesan){
        $('#'+idDiv).attr('class', 'form-group has-danger');
        $('#'+idPesan).show();
        $('#'+idPesan).html(pesan);
    }

    function correctValidation(idDiv,idPesan){
        $('#'+idDiv).attr('class', 'form-group');
        $('#'+idPesan).hide();
    }

    function arrKosong(arr,idDiv,idPesan,pesan,status){
        if(arr.length == 0){
            showValidation(idDiv,idPesan,pesan+' Tidak Boleh Kosong');
            status = 0;   
        }else{
            correctValidation(idDiv,idPesan);
        }

        return status;
    }

    function validasi(){
        var status = 1;
        var tipe_name = $('#paket_name').val();
        var price = $('#price').val();
        var description = $('#description').val();
        var furniture = $('#furniture').val();


        if(tipe_name == null || tipe_name == ""){
            showValidation('paket-name','pesan-paket','Masukan nama paket tidak boleh kosong');
            status = 0;
        }else if(tipe_name.length < 3){
            showValidation('paket-name','pesan-paket','Tolonng masukkan nama paket yang benar');
            status = 0;
        }else{
            correctValidation('paket-name', 'pesan-paket');
        }

        if(description == null || description == ""){
            showValidation('descriptions','pesan-description','Masukan deskripsi tidak boleh kosong');
            status = 0;
        }else if(description.length < 3){
            showValidation('descriptions','pesan-description','Tolonng masukkan deskripsi yang benar');
            status = 0;
        }else{
            correctValidation('descriptions', 'pesan-description');
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

        status = arrKosong(furniture, 'furnitures', 'pesan-furniture', 'Tolong pilih furniture untuk paket',status);


        return status;
    }

    // function edit(id){
    //     jQuery.ajax({
    //         url: '/admin/paket-furniture/'+id+'/edit',
    //         method: 'get',
    //         success: function(result){
    //             $("#editFurniture").modal('show');
                
    //             console.log(result.success);
    //             console.log(result.id);
    //         }
    //     });
    // }
    

    $(document).ready(function(e){
        var totalHarga = 0;
        var status;

        $('.pesan').hide();

        $("#close1").click(function(e){
            $('#status').hide();
        });
        $("#close2").click(function(e){
            $('#status-hapus').hide();
        });

        $("#furniture").change(function(e){
            jQuery.ajax({
                url: "{{route('paket-furniture.totalHarga')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    furniture: JSON.stringify($('#furniture').val()),
                },
                success: function(result){
                    $("#total-harga").val('Rp'+result.success);                    
                }
            });
        });


        $('#formAdd').submit(function(e){
            status = validasi();
            if(!status){
                e.preventDefault();
                console.log(status);
            }
        });

    });
</script>