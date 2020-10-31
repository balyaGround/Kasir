@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Settings</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('profile.process')}}" enctype="multipart/form-data" method="post">
                                    @csrf

                                    <div class="media">
                                        @if(auth()->user()->image_uri != '')
                                            <a href="javascript: void(0);">
                                                <img id="gg" src="{{asset('storage/images/imageUser/small/').'/'.auth()->user()->image_uri}}" class="rounded-circle mr-75" alt="profile image" height="100" width="100">
                                            </a>
                                        @else
                                            <a href="javascript: void(0);">
                                                <img id="gg" src="{{asset('original-asset/Kasir/img/man1.png')}}" class="img-circle mr-75" alt="profile image" height="100" width="100">
                                            </a>
                                        @endif
                                        <div class="media-body mt-75 mt-5">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload" >Upload new photo</label>
                                                <input type="file" name="imageprof"  onchange="loadFile(event)" id="account-upload" hidden="">
                                                <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light">Reset</button>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                    size of
                                                    800kB</small></p>
                                        </div>
                                    </div>
                                    <label class="mt-2">Nama: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" name="nama" value="{{auth()->user()->name}}" class="form-control">
                                    </div>
                                    <label >username: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" name="username" value="{{auth()->user()->username}}" class="form-control">
                                    </div>
                                    <label>Email: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" name="email" value="{{auth()->user()->email}}" class="form-control">
                                    </div>
                                    <label>Password Lama: </label>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password Lama" name="old_password" class="form-control">
                                    </div>
                                    <label>Password Baru: </label>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password Baru" name="new_password" class="form-control">
                                    </div>
                                     <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

    <div class="modal fade" id="modalDelete" tabindex="-1" user="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus user ?</p>
                        <input type="text" id="deleteid" name="id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('gg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

@endsection
