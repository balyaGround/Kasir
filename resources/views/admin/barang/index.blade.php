@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mx-2">Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active  font-medium-3 px-2" id="produk-tab"
                                       data-toggle="tab" href="#produk"
                                       aria-controls="home" role="tab" aria-selected="true"><i
                                            class="feather icon-briefcase"> Daftar Menu</i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-medium-3 px-2" id="stok-tab" data-toggle="tab"
                                       href="#stok"
                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                            class="feather icon-box"> Stok</i></a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="produk" aria-labelledby="produk-tab"
                                     role="tabpanel">
                                    @include('admin.barang.component.tab-content-produk')
                                </div>
                                <div class="tab-pane" id="stok" aria-labelledby="stok-tab"
                                     role="tabpanel">
                                    @include('admin.barang.component.tab-content-bahan')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('admin.barang.component.modal-produk')
    @include('admin.barang.component.modal-bahan')
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

    @include('admin.barang.script.product-script')
    @include('admin.barang.script.stok-script')
@endsection
