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
                                                    <a href="#" class="nav-link disabled">Disabled</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about"
                                                       aria-controls="about" role="tab"
                                                       aria-selected="false">Account</a>
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
                                                                <th class="text-center">Nomor Invoice</th>
                                                                <th class="text-center">Logo</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>tes</td>
                                                                <td>tes</td>
                                                                <td>tes</td>
                                                            </tr>
                                                            </tbody>

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
                                                <div class="tab-pane" id="dropdown31" role="tabpanel"
                                                     aria-labelledby="dropdown31-tab" aria-expanded="false">
                                                    <p>Cake croissant lemon drops gummi bears carrot cake biscuit
                                                        cupcake croissant. Macaroon lemon drops
                                                        muffin jelly sugar plum chocolate cupcake danish icing. Soufflé
                                                        tootsie roll lemon drops sweet roll
                                                        cake icing cookie halvah cupcake.</p>
                                                </div>
                                                <div class="tab-pane" id="dropdown32" role="tabpanel"
                                                     aria-labelledby="dropdown32-tab" aria-expanded="false">
                                                    <p>Chocolate croissant cupcake croissant jelly donut. Cheesecake
                                                        toffee apple pie chocolate bar biscuit
                                                        tart croissant. Lemon drops danish cookie. Oat cake macaroon
                                                        icing tart lollipop cookie sweet bear
                                                        claw.</p>
                                                </div>
                                                <div class="tab-pane" id="about" aria-labelledby="about-tab"
                                                     role="tabpanel">
                                                    <p>Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies
                                                        dragée. Chocolate bar liquorice
                                                        cheesecake cookie chupa chups marshmallow oat cake biscuit.
                                                        Dessert toffee fruitcake ice cream
                                                        powder
                                                        tootsie roll cake.</p>
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

    <script>
        $(document).ready(function () {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $('.zero-configuration').DataTable({});
        });
    </script>
@endsection
