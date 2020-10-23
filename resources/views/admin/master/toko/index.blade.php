@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master Toko</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                            <p class="card-text">Tambah toko</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddToko">Tambah Toko</button>
                        <div class="table-responsive">
                            <table class="table zero-configuration2 table-striped table-bordered     ">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td class="text-center">{{$dt->nama}}</td>
                                        <td class="text-center"><img
                                                src="{{asset('storage/images/logostoko/small').'/'.$dt->logos_uri}}"
                                                alt=""></td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modalEditToko"
                                                    data-json='{{json_encode($dt)}}'><i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalDeleteToko" data-json='{{json_encode($dt)}}'><i
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
    <div class="modal fade" id="modalAddToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('toko.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama Toko: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Toko" name="nama" class="form-control">
                        </div>

                        <label>Logo Toko: </label>
                        <div class="form-group">
                            <input type="file" placeholder="file" name="logo" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-formToko" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama Toko: </label>
                        <div class="form-group">
                            <input type="text" id="editnameToko" placeholder="Nama Toko" name="nama" class="form-control">
                        </div>

                        <label>Logo Toko: </label>
                        <div class="form-group">
                            <input type="file" id="editlogosuriToko" placeholder="file" name="logo" class="form-control">
                        </div>
                        <input type="text" name="id" id="editidToko" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDeleteToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-formToko" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus toko ?</p>
                        <input type="text" id="deleteidToko" name="id" hidden>
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

            $('.zero-configuration2').DataTable({
            });
            $('#modalDeleteToko').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#deleteidToko').val(data.id.toString());
            });
            $('#modalEditToko').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
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
                        location.reload()
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
                        // this.reset();
                        $('#modalEditToko').modal('hide');
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
