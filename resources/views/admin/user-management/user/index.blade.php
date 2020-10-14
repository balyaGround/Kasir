@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master user</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <p class="card-text">Tambah User</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Tambah User</button>
                        <div class="table-responsive">
                            <table class="table zero-configuration table-striped table-bordered     ">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Toko</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['userAll'] as $dt)
                                    <tr>
                                        <td class="text-center">{{$dt->name}}</td>
                                        <td class="text-center">{{$dt->email}}</td>
                                        <td class="text-center">{{$dt->username}}</td>
                                        <td class="text-center">{{$dt->role->nama}}</td>
                                        <td class="text-center">{{$dt->toko->nama}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modalEdit"
                                                    data-json='{{json_encode($dt)}}'><i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalDelete" data-json='{{json_encode($dt)}}'><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" user="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('users.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama user: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama user"  name="name" class="form-control">
                        </div>
                        <label>Email user: </label>
                        <div class="form-group">
                            <input type="text" placeholder="email" name="email" class="form-control">
                        </div>
                        <label>Username: </label>
                        <div class="form-group">
                            <input type="text" placeholder="username" name="username" class="form-control">
                        </div>
                        <label>Password user: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Password user"  name="password" class="form-control">
                        </div>
                        <label>Toko : </label>
                        <div class="form-group">
                            <select class="form-control valid" id="add-type" name="toko_id" aria-invalid="false">
                                @foreach($data['toko'] as $toko)
                                    <option value="{{$toko->id}}">{{$toko->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Role : </label>
                        <div class="form-group">
                            <select class="form-control valid" id="add-type" name="role_id" aria-invalid="false">
                                @foreach($data['role'] as $role)
                                    <option value="{{$role->id}}">{{$role->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" user="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama user: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama user" id="editname" name="name" class="form-control">
                        </div>
                        <label>Email user: </label>
                        <div class="form-group">
                            <input type="text" placeholder="email" id="editemail" name="email" class="form-control">
                        </div>
                        <label>Username: </label>
                        <div class="form-group">
                            <input type="text" placeholder="username" id="editusername" name="username" class="form-control">
                        </div>
                        <label>Password user: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Password user" id="editpassword" name="password" class="form-control">
                        </div>
                        <label>Toko : </label>
                        <div class="form-group">
                            <select class="form-control valid" id="edittoko" name="toko_id" aria-invalid="false">
                                @foreach($data['toko'] as $toko)
                                    <option value="{{$toko->id}}">{{$toko->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Role : </label>
                        <div class="form-group">
                            <select class="form-control valid" id="editrole" name="role_id" aria-invalid="false">
                                @foreach($data['role'] as $role)
                                    <option value="{{$role->id}}">{{$role->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="text" name="id" id="editid" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.zero-configuration').DataTable({
            });
            $('#modalDelete').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#deleteid').val(data.id.toString());
            });
            $('#modalEdit').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#editid').val(data.id.toString());
                $('#editname').val(data.name.toString());
                $('#editusername').val(data.username.toString());
                $('#editemail').val(data.email.toString());
                $('#edittoko').val(data.toko_id.toString());
                $('#editrole').val(data.role_id.toString());

            });
            $('#delete-form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    url: '{{env('APP_URL')}}/user-management/users/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDelete").modal("hide");
                        location.reload()
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#edit-form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/user-management/users/" + Id,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        // this.reset();
                        $('#modalEdit').modal('hide');
                        location.reload()
                        // oTable.ajax.reload(null, false);
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
