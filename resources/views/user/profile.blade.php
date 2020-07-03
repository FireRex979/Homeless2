@extends('layouts.user')
@section('judul','User | Profile Page')
@section('content')
<input type="hidden" name="route" value="{{$route}}">
<script type="text/javascript">
    $(document).ready(function(){
        var route = $('input[name=route]').val();
        if (route=='profile') {
            var form = "event.preventDefault();"+
                        "document.getElementById('logout-form').submit();";
            $('#btn-logout').attr('href', '{{route("logout")}}').attr('onclick', form);
            $('#btn-logout-2').attr('href', '{{route("logout")}}').attr('onclick', form);
        }
    })
</script>
<!-- wrapper -->	
            <div id="wrapper">
                <!--content -->  
                <div class="content">
                    <!--section --> 
                    <section>
                        <!-- container -->
                        <div class="container">
                            <!-- profile-edit-wrap -->
                            <div class="profile-edit-wrap">
                                <div class="profile-edit-page-header">
                                    <h2>Profile User</h2>
                                    <div class="breadcrumbs"><a href="/home">Home</a><span>profile</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="fixed-bar fl-wrap">
                                            <div class="user-profile-menu-wrap fl-wrap">
                                                <!-- user-profile-menu-->
                                                <div class="user-profile-menu">
                                                    <h3>Menu</h3>
                                                    <ul>															
                                                        <li><a href="/user/{{Auth::user()->id}}" class="user-profile-act"><i class="fa fa-user-o"></i> Profile</a></li>
                                                        <li><a href="/message"><i class="fa fa-envelope-o"></i> Pesan <span>3</span></a></li>
                                                        <li><a href="/forget-password"><i class="fa fa-unlock-alt"></i>Ganti Password</a></li>
                                                    </ul>
                                                </div>
                                                <!-- user-profile-menu end-->                                       
                                                <a href="" id="btn-logout-2" class="log-out-btn">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <!-- profile-edit-container--> 
                                        <div class="profile-edit-container">
                                            <div class="profile-edit-header fl-wrap">
                                                <h4>Profile</h4>
                                            </div>
                                            <div class="custom-form">
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <label>Nama <i class="fa fa-user-o"></i></label>
                                                <input type="text" placeholder="" value="{{$user->name}}" name="name" />
                                                <label>Email<i class="fa fa-envelope-o"></i>  </label>
                                                <input type="email" placeholder="" name="email" value="{{$user->email}}"/>
                                                <label>No Telepon<i class="fa fa-phone"></i>  </label>
                                                <input type="text" placeholder="" name="no_tlp" value="{{$user->no_tlp}}"/>
                                                <label> Alamat <i class="fa fa-map-marker"></i>  </label>
                                                <input type="text" placeholder="" name="address" value="{{$user->address}}"/>
                                                <button type="submit" id="btn-save-profile" class="btn big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                        <!-- profile-edit-container end--> 
                                        <!-- profile-edit-container--> 
                                        <div class="profile-edit-container add-list-container">
                                            
                                        </div>
                                        <!-- profile-edit-container end--> 		                                      
                                    </div>
                                    <div class="col-md-2">
                                        <div class="edit-profile-photo fl-wrap">
                                            <img src="/images/user/{{$user->profile_image}}" class="respimg" alt="" id="profile-image">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" id="input-image" class="upload" name="profile_image">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--profile-edit-wrap end -->
                        </div>
                        <!--container end -->
                    </section>
                    <!-- section end -->
                    <div class="limit-box fl-wrap"></div>
                </div>
            </div>
            <!-- wrapper end -->
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btn-save-profile').on('click', function(){
                var name = $('input[name=name]').val();
                var email = $('input[name=email]').val();
                var no_tlp = $('input[name=no_tlp]').val();
                var address = $('input[name=address]').val();
                var id = $('input[name=id]').val();
                $.ajax({
                    url: '/edit-profile/user/'+id,
                    method: 'POST',
                    data: {
                        name: name,
                        email: email,
                        no_tlp: no_tlp,
                        address: address
                    },
                    success: function(response){
                        $('input[name=name]').val(response.user['name']);
                        $('input[name=email]').val(response.user['email']);
                        $('input[name=no_tlp]').val(response.user['no_tlp']);
                        $('input[name=address]').val(response.user['address']);
                        alert('Ganti Profile Sukses');
                    }
                });
            });
            $('#input-image').on('change', function(){
                var filedata = this.files[0];
                var imgtype = filedata.type;
                var match = ['image/jpg', 'image/jpeg', 'image/png'];
                if (!(filedata.type==match[0]||filedata.type==match[1]||filedata.type==match[2])) {
                    alert("Format gambar Salah");
                }else{
                    var reader=new FileReader();
                    reader.onload=function(ev){
                        $('#profile-image').attr('src', ev.target.result);
                        $('#profile-image-header').attr('src', ev.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    var postData=new FormData();
                    var id = $('input[name=id]').val();
                    postData.append('file', this.files[0]);
                    var url = '/change/image/profile/'+id;
                    $.ajax({
                        async: true,
                        type: 'POST',
                        contentType: false,
                        url: url,
                        data: postData,
                        processData: false,
                        success: function(){
                            alert("success");
                        }
                    });
                }
            });
        });
    </script>
@endsection