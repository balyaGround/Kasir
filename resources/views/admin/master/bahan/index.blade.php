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
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Tambah bahan</button>
                        <div class="table-responsive">
                            <table class="table zero-configuration table-striped table-bordered     ">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td class="text-center">{{$dt->nama}}</td>
                                        <td class="text-center">{{$dt->quantity}}</td>
                                        <td class="text-center"><img
                                                src="{{asset('storage/images/imageBahan/small').'/'.$dt->image_uri}}"
                                                alt=""></td>
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
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('bahan.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama bahan: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama bahan" name="nama" class="form-control">
                        </div>

                        <label>Stok : </label>
                        <div class="form-group">
                            <input type="number" placeholder="Stock bahan" name="quantity" class="form-control">
                        </div>

                        <label>Image bahan: </label>
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
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama bahan: </label>
                        <div class="form-group">
                            <input type="text" id="editname" placeholder="Nama bahan" name="nama" class="form-control">
                        </div>

                        <label>Stock Bahan: </label>
                        <div class="form-group">
                            <input type="text" id="editquantity" placeholder="Stock bahan" name="quantity" class="form-control">
                        </div>

                        <label>Image bahan: </label>
                        <div class="form-group">
                            <input type="file" id="editlogosuri" placeholder="file" name="logo" class="form-control">
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
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus bahan ?</p>
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
                "columnDefs": [
                    {
                        "render": function (data, type, row) {
                            return commaSeparateNumber(data);
                        },
                        // "targets": [1,2]
                    },
                ]
            });

            function commaSeparateNumber(val) {
                while (/(\d+)(\d{3})/.test(val.toString())) {
                    val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
                }
                return "Rp. "+val+",00.-";
            }

            $('#modalDelete').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#deleteid').val(data.id.toString());
            });
            $('#modalEdit').on('show.bs.modal', function (e) {
                {{--    oTable.ajax.reload(null, false);--}}
                let data = $(e.relatedTarget).data('json');
                $('#editid').val(data.id.toString());
                $('#editname').val(data.nama.toString());
                $('#editquantity').val(data.quantity.toString());
            });
            $('#delete-form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    url: '{{env('APP_URL')}}/master/bahan/' + Id,
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
                    url: "{{env('APP_URL')}}/master/bahan/" + Id,
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
