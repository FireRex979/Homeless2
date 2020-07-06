@extends('layouts.admin')

@push('script')
    <link href="{{asset('/assets/admin/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush

@section('title', 'Kategori Furniture')
    
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
                        @if (session('pesanArtikel'))
                            <h3 class="card-title">Kategori Artikel {{session('pesanArtikel.lama')}} telah dirubah menjadi {{session('pesanArtikel.baru')}}</h3>
                            <p class="card-text"></p>
                        @else
                            <h3 class="card-title">{{session('status')}}</h3>
                            <p class="card-text"></p>
                        @endif                    
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
                    <h2 class="card-title">Kategori Furniture</h2>
                    <h6 class="card-subtitle"></h6>
                    <br>
                    <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addFurniture">+ Tambah Kategori Furniture</button>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori Furniture</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($kategoriFurnitures)
                                    @foreach ($kategoriFurnitures as $kategoriFurniture)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kategoriFurniture->category_name}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="edit btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#editFurniture" data-placement="top" title="Edit" onclick="showEdit({{$kategoriFurniture->id}})"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="hapus btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" onclick="hapus({{$kategoriFurniture->id}},{{$loop->iteration}})"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                        <tr>
                                            <td>Belum ada data kategori furniture</td>
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
<div class="modal fade" id="addFurniture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Furniture</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('kategori-furniture.store')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori Furniture</label>
                        <input type="text" class="form-control"
                            placeholder="Masukkan nama kategori furniture" required name="category_name"></div>
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

<!-- .modal for add task -->
<div class="modal fade" id="editFurniture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Furniture</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formEdit">
            <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori Furniture</label>
                        <input type="text" id="namaFurniture" class="form-control"
                            placeholder="Masukkan nama kategori furniture" required name="category_name"></div>
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
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection


<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>

@push('script_bawah')
<!--This page plugins -->

<script src="{{asset('/assets/admin/src/assets/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/custom-datatable.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endpush

<script>
    function hapus(id_Furniture, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus Furniture?");
        if(konfirmasi == true){
            jQuery.ajax({
                    url: "/admin/kategori-furniture/"+id_Furniture,
                    method: 'delete',
                    data: {
                        _token: $('#signup-token').val(),
                    },
                    success: function(result){
                        $("#pesan").text("Furniture "+result.furniture+" telah berhasil dihapus");
                        $("#status-hapus").show();
                        $("#zero_config").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    }
            });
        }
    }

    function showEdit(id_Furniture){
        jQuery.ajax({
                url: "/admin/kategori-furniture/"+id_Furniture+"/edit",
                method: 'get',
                success: function(result){
                    // $('.ganti').html(result.hasil);
                    // $('#editFurniture').modal('show');
                    $("#namaFurniture").val(result.furniture['category_name']);
                    $("#formEdit").attr("action", "/admin/kategori-furniture/"+id_Furniture);
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