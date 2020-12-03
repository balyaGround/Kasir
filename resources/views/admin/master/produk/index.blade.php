@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master produk</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <p class="card-text">Tambah produk</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Tambah produk
                        </button>
                        <div class="table-responsive">
                            <table class="table zero-configuration table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Harga Jual</th>
                                    <th class="text-center">Harga Modal</th>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['dataProduk'] as $dt)
                                    <tr>
                                        <td class="text-center">{{$dt->nama}}</td>
                                        <td class="text-center">{{$dt->harga_jual}}</td>
                                        <td class="text-center">{{$dt->harga_modal}}</td>
                                        <td class="text-center"><img
                                                src="{{asset('storage/images/imageProduk/small').'/'.$dt->image_uri}}"
                                                alt=""></td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modalEdit"
                                                    data-json='{{json_encode($dt)}}'><i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-info" data-toggle="modal"
                                                    data-target="#modalReceipt" data-json='{{json_encode($dt)}}'>Receipt
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('produk.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama produk: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama produk" name="nama" class="form-control" required>
                        </div>

                        <label>Harga jual produk: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Harga produk" name="harga_jual" class="form-control" required>
                        </div>

                        <label>Harga modal produk: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Harga produk" name="harga_modal" class="form-control" required>
                        </div>

                        <label>Logo produk: </label>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama produk: </label>
                        <div class="form-group">
                            <input type="text" id="editname" placeholder="Nama produk" name="nama" class="form-control">
                        </div>
                        <label>Harga jual produk: </label>
                        <div class="form-group">
                            <input type="text" id="edithargajual" placeholder="Harga produk" name="harga_jual"
                                   class="form-control">
                        </div>
                        <label>Harga modal produk: </label>
                        <div class="form-group">
                            <input type="text" id="edithargamodal" placeholder="Harga produk" name="harga_modal"
                                   class="form-control">
                        </div>

                        <label>Logo produk: </label>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus produk ?</p>
                        <input type="text" id="deleteid" name="id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDeleteReceipt" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form-receipt" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus produk ?</p>
                        <input type="text" id="deleteidreceipt" name="id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReceipt" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Receipt produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="javascript:void(0)" id="receipt-form" enctype="multipart/form-data" method="post">
                        <div class="row px-1">
                            <div class="col-md-6">
                                <label>Bahan : </label>
                                <div class="form-group">
                                    <select class="form-control valid" id="add-type" name="bahan_id"
                                            aria-invalid="false">
                                        @foreach($data['dataBahan'] as $bahan)
                                            <option value="{{$bahan->id}}">{{$bahan->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 p-0">
                                <label>Quantity: </label>
                                <div class="form-group">
                                    <input type="number" id="editlogosuri" placeholder="jumlah" name="quantity"
                                           class="form-control" required>
                                </div>
                            </div>
                            <input type="text" id="produk_id_receipt" name="produk_id" hidden>
                            <div class="col-md-3 text-right">
                                <label></label>
                                <div class="form-group">
                                    <button class="btn btn-success btn-md btn-block"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="row align-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table  table-striped table-bordered w-100" id="zeroxw">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Bahan</th>
                                            <th class="text-center">Stok Dibutuhkan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        @foreach($data['dataProduk'] as $dt)--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td class="text-center">{{$dt->nama}}</td>--}}
                                        {{--                                                <td class="text-center">{{$dt->harga_jual}}</td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                        @endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
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

            $('.zero-configuration').DataTable({
                "columnDefs": [
                    {
                        "render": function (data, type, row) {
                            return commaSeparateNumber(data);
                        },
                        "targets": [1, 2]
                    },
                ]
            });

            function commaSeparateNumber(val) {
                while (/(\d+)(\d{3})/.test(val.toString())) {
                    val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
                }
                return "Rp. " + val + ",00.-";
            }
            let oTable;
            $('#modalReceipt').on('show.bs.modal', function (e) {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);

                const data = $(e.relatedTarget).data('json');
                $('#produk_id_receipt').val(data.id.toString());
                 oTable = $('#zeroxw').DataTable({
                    order: [[0, "desc"]],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{env('APP_URL')}}/master/produk/receipt/dataTable/' + data.id.toString()
                    },
                    columns: [
                        {data: 'bahan.nama', name: 'bahan.nama', orderable: true,class:'text-center'},
                        {data: 'bahan_qty', name: 'bahan_qty', orderable: true,class:'text-center'},
                        {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                    ]
                });
            })

            $('#delete-form-receipt').submit(function (e) {
                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    url: '{{env('APP_URL')}}/master/produk/receipt/' + Id,
                    type: 'DELETE',
                    dataType: 'HTML',
                    success: function (resp) {
                        oTable.ajax.reload(null, false);
                        $('#modalDeleteReceipt').modal('hide');
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#receipt-form').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                let Id = formData.get('id');
                $.ajax({
                    type: 'POST',
                    url: "{{route('receipt.store')}}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    async: true,
                    cache:false,
                    success: (data) => {
                        // $('#modalReceipt').modal('hide');
                        oTable.ajax.reload(null, false);
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });

                return false;
            })

            $("#modalReceipt").on("hidden.bs.modal", function (e) {
                $('#zeroxw').dataTable().fnClearTable();
                $('#zeroxw').dataTable().fnDestroy();
            });

            $('#modalDeleteReceipt').on('show.bs.modal', function (e) {
                const data = $(e.relatedTarget).data('id');
                $('#deleteidreceipt').val(data.toString());
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
                $('#editname').val(data.nama.toString());
                $('#edithargajual').val(data.harga_modal.toString());
                $('#edithargamodal').val(data.harga_jual.toString());
            });
            $('#delete-form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                let Id = formData.get('id');
                console.log(formData);
                $.ajax({
                    url: '{{env('APP_URL')}}/master/produk/' + Id,
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
                    url: "{{env('APP_URL')}}/master/produk/" + Id,
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
