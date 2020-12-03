@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Settings</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active  font-medium-3 px-2" id="user-tab"
                                       data-toggle="tab" href="#User"
                                       aria-controls="home" role="tab" aria-selected="true"><i
                                            class="feather icon-user"> User</i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-medium-3 px-2" id="role-tab" data-toggle="tab"
                                       href="#role"
                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                            class="feather icon-user-check"> Role</i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-medium-3 px-2" id="toko-tab" data-toggle="tab"
                                       href="#toko"
                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                            class="feather icon-archive"> Toko</i></a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="User" aria-labelledby="home-tab"
                                     role="tabpanel">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser"><i
                                            class="fa fa-plus"></i> Tambah User
                                    </button>
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
                                                        <button class="btn btn-info" data-toggle="modal"
                                                                data-target="#modalEditUser"
                                                                data-json='{{json_encode($dt)}}'><i
                                                                class="fa fa-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-danger" data-toggle="modal"
                                                                data-target="#modalDeleteUser"
                                                                data-json='{{json_encode($dt)}}'><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="role" aria-labelledby="role-tab"
                                     role="tabpanel">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddRole">
                                        Tambah Role
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table zero-configuration1 table-striped table-bordered     w-100">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Nama</th>

                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="toko" role="tabpanel"
                                     aria-labelledby="dropdown31-tab" aria-expanded="false">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddToko">Tambah Toko</button>
                                    <div class="table-responsive">
                                        <table class="table zero-configuration2 table-striped table-bordered w-100">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Logo</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    @include('admin.user-management.user.component.modal-user')
    @include('admin.user-management.user.component.modal-role')
    @include('admin.user-management.user.component.modal-toko')
@endsection

@section('js')
{{--    <script src="{{asset('assets')}}/vendors/js/tables/datatable/pdfmake.min.js"></script>--}}
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

            $('.zero-configuration').DataTable({});
            $('#modalAddUser').on('show.bs.modal', function (e) {
                $.ajax({
                    url: '{{route('user.selected.data')}}',
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (resp) {
                       console.table(resp)
                        let tokohtml="";
                       let rolehtml="";
                        resp.toko.forEach(fungsitoko);
                        function fungsitoko(item, index) {
                            tokohtml +="<option value='"+item.id+"'>"+item.nama+"</option>"
                        }
                        resp.role.forEach(fungsirole);
                        function fungsirole(item, index) {
                            rolehtml +="<option value='"+item.id+"'>"+item.nama+"</option>"
                        }
                        $('.tokos').html(tokohtml)
                        $('.roles').html(rolehtml)

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
            $('#modalDeleteUser').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#deleteidUser').val(data.id.toString());
            });
            $('#modalEditUser').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                $.ajax({
                    url: '{{route('user.selected.data')}}',
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (resp) {
                        console.table(resp)
                        let tokohtml="";
                        let rolehtml="";
                        resp.toko.forEach(fungsitoko);
                        function fungsitoko(item, index) {
                            tokohtml +="<option value='"+item.id+"'>"+item.nama+"</option>"
                        }
                        resp.role.forEach(fungsirole);
                        function fungsirole(item, index) {
                            rolehtml +="<option value='"+item.id+"'>"+item.nama+"</option>"
                        }
                        $('.tokos').html(tokohtml)
                        $('.roles').html(rolehtml)
                        let data = $(e.relatedTarget).data('json');
                        $('#editidUser').val(data.id.toString());
                        $('#editnameUser').val(data.name.toString());
                        $('#editusernameUser').val(data.username.toString());
                        $('#editemailUser').val(data.email.toString());
                        $('#edittokoUser').val(data.toko_id.toString());
                        $('#editroleUser').val(data.role_id.toString());

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });
            $('#delete-formUser').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    url: '{{env('APP_URL')}}/user-management/users/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDeleteUser").modal("hide");
                        location.reload()
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
            $('#edit-formUser').submit(function (e) {
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
                        $('#modalEditUser').modal('hide');
                        location.reload()
                    },
                    error: function (data) {
                    }
                });
            });


            //    roleee
            const dt2 = $('.zero-configuration1').DataTable({
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{env('APP_URL')}}/master/role/dataTable'
                },
                columns: [
                    {data: 'nama', name: 'nama', orderable: true, class: 'text-center'},
                    {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                ]
            });
            $('#modalDeleteRole').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#deleteidRole').val(data.id.toString());
            });
            $('#modalEditRole').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#editidRole').val(data.id.toString());
                $('#editnameRole').val(data.nama.toString());

            });


            $('#add-formRole').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/role",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        $('#modalAddRole').modal('hide');
                        dt2.ajax.reload(null, false);
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            });
            $('#delete-formRole').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    url: '{{env('APP_URL')}}/master/role/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDeleteRole").modal("hide");
                        dt2.ajax.reload(null, false);
                    },
                    error: function (data) {
                    }
                });
            });
            $('#edit-formRole').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/role/" + Id,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        $('#modalEditRole').modal('hide');
                        dt2.ajax.reload(null, false);
                    },
                    error: function (data) {
                    }
                });
            });

            const dt3 = $('.zero-configuration2').DataTable({
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{env('APP_URL')}}/master/toko/dataTable'
                },
                columns: [
                    {data: 'nama', name: 'nama', orderable: true, class: 'text-center'},
                    {data: 'image', name: "", searchable: false, orderable: false, className: "text-center"},
                    {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                ]
            });

            $('#add-formToko').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/toko",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        $('#modalAddToko').modal('hide');
                        dt3.ajax.reload(null, false);
                    },
                    error: function (data) {
                    }
                });
            });

            $('#modalDeleteToko').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#deleteidToko').val(data.id.toString());
            });
            $('#modalEditToko').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#editidToko').val(data.id.toString());
                $('#editnameToko').val(data.nama.toString());

            });
            $('#delete-formToko').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    url: '{{env('APP_URL')}}/master/toko/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDeleteToko").modal("hide");
                        dt3.ajax.reload(null, false);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#edit-formToko').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/toko/" + Id,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        $('#modalEditToko').modal('hide');
                        dt3.ajax.reload(null, false);

                    },
                    error: function (data) {
                    }
                });
            });


        });

    </script>
@endsection
