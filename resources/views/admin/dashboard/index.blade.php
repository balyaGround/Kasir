@extends('layout.main',[
    'pesan'=>'<h2 class=" ml-1 my-1">Haloo, <span style="color:#e37e57;">'.auth()->user()['name'].' !</span></h1>',
    'shop'=>'<button class="btn btn-primary py-1 mt-1 " data-toggle="modal" data-target="#modalCart"> <i class="feather icon-shopping-cart"></i>
                                </button>'

    ])
@section('css')

@endsection

@section('content')
    <div class="content-header row">
    </div>


    <div class="row ">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active font-medium-4 px-2" id="home-tab"
                                   data-toggle="tab" href="#home"
                                   aria-controls="home" role="tab" aria-selected="true"><i
                                        class="feather icon-book-open"> Daftar Menu</i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-medium-4 px-2" id="stock-tab" data-toggle="tab"
                                   href="#stock"
                                   aria-controls="profile" role="tab" aria-selected="true"><i
                                        class="feather icon-box"> Stok</i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-medium-4 px-2" id="invoice-tab" data-toggle="tab"
                                   href="#invoice"
                                   aria-controls="profile" role="tab" aria-selected="true"><i
                                        class="feather icon-dollar-sign"> Invoice List</i></a>
                            </li>
                            <button class="btn btn-success" style="margin-top: 12px;margin-bottom: 1px"
                                    data-toggle="modal" data-target="#modalCart"><i
                                    class="feather icon-shopping-cart"></i>
                                Buat Invoice
                            </button>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" aria-labelledby="home-tab"
                                 role="tabpanel">
                                <section id="ecommerce-searchbar">
                                    <div class="row mt-1 ">
                                        <div class="col-sm-12">
                                            <fieldset
                                                class="form-group position-relative has-icon-left font-medium-4 shadow">
                                                <input type="text" class="form-control search-product py-2"
                                                       id="temukanMenu" placeholder="Temukan Menu">
                                                <div class="form-control-position font-medium-4 "
                                                     style="padding-top: 5px;">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </section>
                                <div id="daftar-menu">
                                    @include('admin.dashboard.component.tab-content-daftarmenu')
                                </div>
                            </div>
                            <div class="tab-pane" id="stock" aria-labelledby="stock-tab"
                                 role="tabpanel">
                                <section id="stock-searchbar">
                                    <div class="row mt-1 ">
                                        <div class="col-sm-12">
                                            <fieldset
                                                class="form-group position-relative has-icon-left font-medium-4 shadow">
                                                <input type="text" class="form-control search-product py-2"
                                                       id="temukanStok" placeholder="Temukan stok bahan makanan">
                                                <div class="form-control-position font-medium-4 "
                                                     style="padding-top: 5px;">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </section>
                                <div id="daftar-stock">
                                    @include('admin.dashboard.component.tab-content-stock')
                                </div>
                            </div>
                            <div class="tab-pane" id="invoice" aria-labelledby="invoice-tab" role="tabpanel">
                                @include('admin.dashboard.component.tab-content-invoice')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('admin.dashboard.component.modal-cart')
    @include('admin.dashboard.component.modal-appl')
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
    <script src="{{asset('assets')}}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{asset('assets')}}/js/scripts/forms/select/form-select2.js"></script>
    @include('admin.dashboard.script.main-script')
@endsection
