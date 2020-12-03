@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master bahan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <p class="card-text">Tambah bahan</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddBahan">Tambah bahan</button>
                        <div class="table-responsive">
                            <table class="table zero-configuration2 table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Image</th>
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



    <!-- Modal -->
    <div class="modal fade" id="modalAddBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="add-formBahan" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama bahan: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama bahan" name="nama" class="form-control" required>
                        </div>

                        <label>Stok : </label>
                        <div class="form-group">
                            <input type="number" placeholder="Stock bahan" name="quantity" class="form-control" required>
                        </div>

                        <label>Image bahan: </label>
                        <div class="form-group">
                            <input type="file" placeholder="file" name="logo" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-formBahan" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama bahan: </label>
                        <div class="form-group">
                            <input type="text" id="editnameBahan" placeholder="Nama bahan" name="nama" class="form-control">
                        </div>

                        <label>Stock Bahan: </label>
                        <div class="form-group">
                            <input type="text" id="editquantityBahan" placeholder="Stock bahan" name="quantity" class="form-control">
                        </div>

                        <label>Image bahan: </label>
                        <div class="form-group">
                            <input type="file" id="editlogosuriBahan" placeholder="file" name="logo" class="form-control">
                        </div>
                        <input type="text" name="id" id="editidBahan" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDeleteBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-formBahan" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus bahan ?</p>
                        <input type="text" id="deleteidBahan" name="id" hidden>
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

            const dt2 = $('.zero-configuration2').DataTable({
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{env('APP_URL')}}/master/bahan/dataTable'
                },
                columns: [
                    {data: 'nama', name: 'nama', orderable: true, class: 'text-center'},
                    {data: 'quantity', name: "quantity", searchable: false, orderable: false, className: "text-center"},
                    {data: 'image', name: "", searchable: false, orderable: false, className: "text-center"},
                    {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                ]
            });

            $('#add-formBahan').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/bahan",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        $('#modalAddBahan').modal('hide');
                        dt2.ajax.reload(null, false);
                    },
                    error: function (data) {
                    }
                });
            });

            $('#modalDeleteBahan').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#deleteidBahan').val(data.id.toString());
            });
            $('#modalEditBahan').on('show.bs.modal', function (e) {
                let data = $(e.relatedTarget).data('json');
                $('#editidBahan').val(data.id.toString());
                $('#editnameBahan').val(data.nama.toString());
                $('#editquantityBahan').val(data.quantity.toString());
            });
            $('#delete-formBahan').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    url: '{{env('APP_URL')}}/master/bahan/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        $("#modalDeleteBahan").modal("hide");
                        dt2.ajax.reload(null, false);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#edit-formBahan').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    type: 'POST',
                    url: "{{env('APP_URL')}}/master/bahan/" + Id,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (data) => {
                        // this.reset();
                        $('#modalEditBahan').modal('hide');
                        dt2.ajax.reload(null, false);
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
