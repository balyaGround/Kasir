@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master Role</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <p class="card-text">Tambah Role</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddRole">Tambah Role</button>
                        <div class="table-responsive">
                            <table class="table zero-configuration1 table-striped table-bordered     ">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td class="text-center">{{$dt->nama}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modalEditRole"
                                                    data-json='{{json_encode($dt)}}'><i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalDeleteRole" data-json='{{json_encode($dt)}}'><i
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
    <div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('role.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama Role: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Role" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-formRole" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama Role: </label>
                        <div class="form-group">
                            <input type="text" id="editnameRole" placeholder="Nama Role" name="nama" class="form-control">
                        </div>

                        <input type="text" name="id" id="editidRole" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDeleteRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-formRole" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus Role ?</p>
                        <input type="text" id="deleteidRole" name="id" hidden>
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

            $('.zero-configuration1').DataTable({
            });
            $('#modalDeleteRole').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#deleteidRole').val(data.id.toString());
            });
            $('#modalEditRole').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');

                $('#editidRole').val(data.id.toString());
                $('#editnameRole').val(data.nama.toString());

            });
            $('#delete-formRole').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    url: '{{env('APP_URL')}}/master/role/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDeleteRole").modal("hide");
                        location.reload()
                    },
                    error: function (data) {
                        console.log(data);
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
                        // this.reset();
                        $('#modalEditRole').modal('hide');
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
