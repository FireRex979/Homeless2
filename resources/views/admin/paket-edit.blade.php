@extends('layouts.admin')

{{-- @push('script')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.css')}}">
@endpush --}}

@section('title')
    <a href="{{route('paket-furniture.index')}}">Paket Furniture</a><li class="breadcrumb-item"></li>Edit
@endsection

@section('content')

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
                    <h4 class="card-title text-white">Edit Data Paket Furniture</h4>
                </div>
                    <div class="form-body">
                        <div class="card-body">
                            <h6 class="card-subtitle">Tanda * merupakan form yang tidak boleh kosong</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="paket-name" class="form-group row">
                                            <label class="control-label text-left col-md-2">Nama Paket*</label>
                                            <div class="col-md-9">
                                                <input type="text" id="paket_name" class="form-control" placeholder="Masukkan nama paket" name="paket_name" value="{{$paket->paket_name}}"><small id="pesan-name" class="pesan form-control-feedback">Masukan salah</small></div>
                                        </div>
                                    </div>
                                </div>
    
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="harga-total" class="form-group row">
                                            <label class="control-label text-left col-md-2">Total Harga Furniture*</label>
                                            <div class="col-md-9">
                                                <input type="text" id="total_harga" class="form-control" value="{{$harga}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="price-total" class="form-group row">
                                            <label class="control-label text-left col-md-2">Harga Paket Furniture*</label>
                                            <div class="col-md-9">
                                                <input type="text" id="price_total" class="form-control" placeholder="Masukkan harga paket furniture" name="price_total" value="{{$paket->price_total}}"><small id="pesan-price" class="pesan form-control-feedback">Masukan salah</small></div>
                                        </div>
                                    </div>
                                </div> 
                            </form>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="text-right">
                                        <button type="button" id="tombol" class="btn btn-info">Submit</button>
                                        <a href="{{route('paket-furniture.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="card-body">
                            <h4 class="card-title">Furniture</h4>
                            
                            <button class="btn btn-sm btn-rounded btn-success" data-toggle="modal"
                                    data-target="#addFurniture">+ Tambah Furniture</button>
                            <br><br>

                            <div class="table-responsive">
                                <table id="tabel-furniture" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Furniture</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori Furniture</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($paket->furniture)
                                            @foreach ($paket->furniture as $furniture)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="furniture{{$furniture->id}}">{{$furniture->furniture_name}}</td>
                                                <td class="price{{$furniture->id}}">{{$furniture->price}}</td>
                                                <td class="description{{$furniture->id}}">{{$furniture->description}}</td>
                                                <td class="kategori{{$furniture->id}}">{{$furniture->kategori->category_name}}</td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('furniture.edit', $furniture->id)}}"><button class="btn btn-success btn-sm rounded-0" type="button"  data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="hapusFurniture({{$furniture->pivot->id}}, {{$loop->iteration}})"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="addFurniture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Furniture</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddFurniture" action="{{route('paket-furniture.edit.addFurniture')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div id="addFurnitureDiv" class="form-group">
                        <input type="hidden" name="paket_id" value="{{$paket->id}}">
                        <label class="control-label text-left">Furniture*</label>
                        <select  id="furniture_id" class="form-control" name="furniture_id">
                            <optgroup label="Furniture">
                                @foreach ($furnitures as $furniture)
                                    <option value="{{$furniture->id}}">{{$furniture->furniture_name}} - {{$furniture->price}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <small id="pesan-addFurniture" class="pesan form-control-feedback">Masukan salah</small>                    
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

@endsection

<script src="{{asset('/assets/admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/src/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>

@push('script_bawah')
    <!--This page plugins -->
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/assets/admin/src/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>@endpush
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
        var tipe_name = $('#paket_name').val();
        var price = $('#price_total').val();

        if(tipe_name == null || tipe_name == ""){
            showValidation('paket-name','pesan-paket','Masukan nama paket tidak boleh kosong');
            status = 0;
        }else if(tipe_name.length < 3){
            showValidation('paket-name','pesan-paket','Tolonng masukkan nama paket yang benar');
            status = 0;
        }else{
            correctValidation('paket-name', 'pesan-paket');
        }

        if(price == null || price == ''){
            showValidation('price-total','pesan-price','Masukan price tidak boleh kosong');
            status = 0;
        }else if(isNaN(price)){
            showValidation('price-total','pesan-price','Masukan format price yang benar');
            status = 0;
        }else if(price < 0){
            showValidation('price-total','pesan-price','price tidak boleh kurang dari 0');
            status = 0;
        }else{
            correctValidation('price-total', 'pesan-price');
        }       

        return status;
    }

    function hapusFurniture(idFurniture, numRow){
        var konfirmasi = confirm("Apakah anda yakin menghapus furniture ini?");
        if(konfirmasi == true){
            jQuery.ajax({
                url: "{{route('paket-furniture.edit.deleteFurniture')}}",
                method:'POST',
                data: {
                    _token: $('#signup-token').val(),
                    id: idFurniture,
                },
                success: function(result){
                    // $("#tabel-furniture").find('tbody tr:eq('+String(numRow-1)+')').hide();
                    alert(result.success);
                    window.location.href = "{{route('paket-furniture.edit', $paket->id)}}";
                }
            });
        }
    }

    $(document).ready(function(){
        $('.pesan').hide();

        $("#close1").click(function(e){
            $('#status').hide();
        });

        $('#formAddFurniture').submit(function(e){
            var furniture = $('#furniture_id').val();
            if(furniture == null || furniture == ''){
                e.preventDefault();
                showValidation('addFurnitureDiv','pesan-addFurniture', 'Pilih salah satu dari furniture atau Seluruh Furniture telah ada pada paket');

            }
        });

        $('#tombol').click(function(){
            var qty = 0;
            var id = 0;
            $.ajax({
                type: 'POST',
                url: "{{ route('paket-furniture.find') }}",
                data: {_token: $('#signup-token').val(),paket_name: $('#paket_name').val(),},
                success: function (data){
                    qty = data.qty;
                    id = data.id;
                    
                        var status = validasi();
                        if(status){
                            if(qty < 1 || (qty >= 1 && data.id == {{$paket->id}})){
                                jQuery.ajax({
                                    url: "/admin/paket-furniture/{{$paket->id}}",
                                    method: 'put',
                                    data: {
                                        _token: $('#signup-token').val(),
                                        paket_name: $('#paket_name').val(),
                                        price_total: $('#price_total').val(),
                                    },
                                    success: function(result){
                                        alert("Paket Furniture telah berhasil diupdate")
                                        // window.location.href = "{{route('paket-furniture.index')}}";
                                        // console.log(result.success);
                                    }
                                });
                                console.log('ifnya keajax');
                            }else if(qty >= 1 && data.id != {{$paket->id}}){
                                showValidation('paket-name','pesan-paket','Paket Furniture sudah ada dalam database');
                            }
                        }else{
                            console.log('ifnya ke else terakhir. status: '+status);
                        }
                    
                    console.log('id: '+id+' id2: {{$paket->id}}');
                },
                error: function(e) {
                    console.log(e);
            }});

            
        });
    
    });

</script>