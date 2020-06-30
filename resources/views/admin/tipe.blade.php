@extends('layouts.admin')

@push('script')
    <link href="{{asset('/assets/admin/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush

@section('title', 'Tipe Perumahan')
    
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
                    <h2 class="card-title">Kelebihan</h2>
                    <h6 class="card-subtitle"></h6>
                    <br>
                    <a href="{{route('tipe.create')}}">
                        <button class="btn btn-sm btn-rounded btn-success">+ Tambah Tipe Perumahan</button>
                    </a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Tipe</th>
                                    <th>Jenis Properti</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Luas Tanah</th>
                                    <th>Luas Rumah</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($types)
                                    @foreach ($types as $type)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$type->tipe_name}}</td>
                                        <td>{{$type->jenis_property}}</td>
                                        <td>{{$type->price}}</td>
                                        <td>{{$type->description}}</td>
                                        <td>{{$type->land_size}}</td>
                                        <td>{{$type->home_size}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{route('tipe.edit', $type->id)}}"><button class="edit btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="hapus btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" onclick="hapus({{$type->id}},{{$loop->iteration}})"></i></button>
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



<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>

@push('script_bawah')
<!--This page plugins -->

<script src="{{asset('/assets/admin/src/assets/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/custom-datatable.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
@endpush

<script>
    function hapus(id_fasilitas, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus fasilitas?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "/admin/tipe/"+id_fasilitas,
                    method: 'delete',
                    data: {
                        _token: $('#signup-token').val(),
                    },
                    success: function(result){
                        $("#pesan").text("Kelebihan "+result.artikel+" telah berhasil dihapus");
                        $("#status-hapus").show();
                        $("#zero_config").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    }
            });
        }
    }

    function showEdit(id_fasilitas){
        jQuery.ajax({
                url: "/admin/tipe/"+id_fasilitas+"/edit",
                method: 'get',
                success: function(result){
                    // $('.ganti').html(result.hasil);
                    // $('#editFasilitas').modal('show');
                    $("#namaKelebihan").val(result.kelebihan['kelebihan']);
                    $("#namaSatuan").val(result.kelebihan['satuan']);
                    $("#formEdit").attr("action", "/admin/tipe/"+id_fasilitas);
                }
        });
    }

    

    $(document).ready(function(e){
        $("#close1").click(function(e){
            $('#status').hide();
        });
        $("#close2").click(function(e){
            $('#status-hapus').hide();
        });

    });
</script>