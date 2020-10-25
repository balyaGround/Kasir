@extends('layout.main')

@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active font-medium-3 px-2" id="home-tab"
                                                       data-toggle="tab" href="#home"
                                                       aria-controls="home" role="tab" aria-selected="true"><i
                                                            class="feather icon-clock"> Hari Ini</i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-medium-3" id="profile-tab" data-toggle="tab"
                                                       href="#profile"
                                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                                            class="feather icon-calendar"> Bulan Ini</i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-medium-3" id="pembukuan-tab"
                                                       data-toggle="tab"
                                                       href="#pembukuan"
                                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                                            class="feather icon-book">Pembukuan</i></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home" aria-labelledby="home-tab"
                                                     role="tabpanel">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table zero-configuration table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Menu</th>
                                                                <th class="text-center">Jumlah Terjual</th>
                                                                <th class="text-center">Harga Jual Cafe</th>
                                                                <th class="text-center">Harga Jual Owner</th>
                                                                <th class="text-center">Hasil Cafe</th>
                                                                <th class="text-center">Hasil Owner</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                            @foreach($data as $dt)
                                                                <tr>
                                                                    <td>{{$dt['produk']['nama']}}</td>
                                                                    <td>{{$dt['amount']}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_jual'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_modal'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_jual'] *$dt['amount'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_modal'] *$dt['amount'],2,",",".")}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr class="text-center">
                                                                <td><span class="bold font-medium-3">Total</span></td>
                                                                <td><span
                                                                        class="bold font-medium-3">{{$total_amount}}</span>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><span
                                                                        class="bold font-medium-3">Rp.{{number_format($total_harga_jual,2,",",".")}}</span>
                                                                </td>
                                                                <td><span
                                                                        class="bold font-medium-3">Rp.{{number_format($total_harga_modal,2,",",".")}}</span>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile" aria-labelledby="profile-tab"
                                                     role="tabpanel">
                                                    <p>Pudding candy canes sugar plum cookie chocolate cake powder
                                                        croissant. Carrot cake tiramisu danish
                                                        candy cake muffin croissant tart dessert. Tiramisu caramels
                                                        candy canes chocolate cake sweet roll
                                                        liquorice icing cupcake.</p>
                                                </div>
                                                <div class="tab-pane" id="pembukuan" aria-labelledby="pembukuan-tab"
                                                     role="tabpanel">
                                                    @include('admin.report-management.report.component.tab-content-pembukuan')
                                                </div>

                                            </div>
                                        </div>
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
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
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
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama Toko: </label>
                        <div class="form-group">
                            <input type="text" id="editname" placeholder="Nama Toko" name="nama" class="form-control">
                        </div>

                        <label>Logo Toko: </label>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus toko ?</p>
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
    {{--    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>--}}
    <script src="http://www.misin.msu.edu/0/js/Editor-PHP-1.4.0/js/dataTables.editor.js"></script>

    <script>
        var editor; // use a global for the submit and return data rendering in the examples

        const dt2 = $('.pembukuan-dt').DataTable({
            order: [[0, "desc"]],
            "lengthMenu": [[30, -1], [30, "All"]],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{route('pembukuan.dataTable')}}',
            },
            columns: [
                // {data: 'id', name: 'id', orderable: true, class: 'text-center'},
                {data: 'created_at', name: 'created_at', orderable: true, class: 'text-center'},
                {data: 'income', name: "income", searchable: false, orderable: false, className: "text-center"},
                {data: 'outcome', name: "outcome", searchable: false, orderable: false, className: "text-center"},
                {
                    data: 'penghasilan',
                    name: "penghasilan",
                    searchable: false,
                    orderable: false,
                    className: "text-center"
                }
            ]
        });




        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.zero-configuration').DataTable({});

            const editor = new $.fn.dataTable.Editor({
                ajax: {
                    "url": "{{route('tesajadah')}}",
                    "type": 'POST',
                },
                table: ".pembukuan-dt",
                fields: [
                    {
                        name: "id"
                    },
                    {
                        name: "created_at"
                    },
                    {
                        name: "outcome"
                    }, {
                        name: "income"
                    }, {
                        name: "penghasilan"
                    },
                ],
            });


          $('.pembukuan-dt').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this, {
                    buttons: {
                        label: '<button class="btn btn-success btn-sm" >update</button>',
                        fn: function () {
                            this.submit();
                            dt2.ajax.reload(null, false);
                        }
                    }
                });
            });

        });

    </script>
@endsection
