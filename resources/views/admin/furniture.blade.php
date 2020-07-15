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
                    <h2 class="card-title">Furniture</h2>
                    <h6 class="card-subtitle"></h6>
                    <br>
                    <a href="{{route('furniture.create')}}">
                        <button class="btn btn-sm btn-rounded btn-success">+ Tambah Furniture</button>
                    </a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Furniture</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($furnitures)
                                    @foreach ($furnitures as $furniture)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$furniture->furniture_name}}</td>
                                        <td>{{$furniture->price}}</td>
                                        <td>{{$furniture->description}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{route('furniture.edit', $furniture->id)}}"><button class="edit btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="hapus btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" onclick="hapus({{$furniture->id}},{{$loop->iteration}})"></i></button>
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
    function hapus(id_tipe, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus furniture?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "/admin/furniture/"+id_tipe,
                    method: 'delete',
                    data: {
                        _token: $('#signup-token').val(),
                    },
                    success: function(result){
                        $("#pesan").text("Furniture telah berhasil dihapus");
                        $("#status-hapus").show();
                        $("#zero_config").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    }
            });
        }
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