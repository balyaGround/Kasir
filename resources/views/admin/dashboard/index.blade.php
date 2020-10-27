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
                                Bayar
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
        let temporaryData = [];

        function fungsiKurangTambahMenu(index, tipe) {
            if (tipe === "kurang") {
                if (temporaryData[index].amount === 1) {
                    temporaryData.splice(index, 1);
                } else {
                    temporaryData[index].amount--;
                }
            } else {
                temporaryData[index].amount++;
            }
            loadCart();
        }

        function loadCart(){
            let html = "";
            let total = 0;
            temporaryData.forEach(myFunction);

            function myFunction(item, index) {
                html += `<div class="row mx-1 mt-1">
                                <div class="col-md-5 col-4">
                                    <p>${item.nama}</p>
                                </div>

                                <div class="col-md-3 col-5 mx-0 px-0">
                                    <div class="d-flex justify-content-around">
                                     <button class="btn btn-primary btn-sm py-1 waves-effect" onclick="fungsiKurangTambahMenu(${index},'kurang')"><i class="fa fa-minus"></i> </button>
                                                       <p class='text-center' style='margin-left:5px;margin-right:5px;'>${item.amount}</p>
                                    <button class="btn btn-primary btn-sm py-1 waves-effect " onclick="fungsiKurangTambahMenu(${index},'tambah')"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                                 <div class="col-md-4 col-3 text-right">
                                    <p>${item.amount * parseInt(item.harga_jual)}</p>
                                </div>
                            </div>`;
                total += item.amount * parseInt(item.harga_jual);
                }

            html += `
                        <hr>
                        <div class="row mx-1">
                                <div class="col-md-8 col-10 text-left">
                                    <p>Total</p>
                                </div>
                                <div class="col-md-4 col-2 text-right">
                                    <div class='mx-2'></div>
                                    <p>${total}</p>
                                </div>
                              </div>`;
            $('#all-data-cart').html(html);

            return true;
        }

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let delay = (() => {
                let timer = 20;
                return function (callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            $("#temukanMenu").keyup(function (e) {
                delay(function () {
                    $.ajax({
                        type: 'GET',
                        url: "{{env('APP_URL')}}/filterProduk/" + ($("#temukanMenu").val().toString() == '' ? 'kosong' : $("#temukanMenu").val().toString()),
                        success: (data) => {
                            $("#daftar-menu").html(data);
                        },
                        error: function (data) {
                            // console.log(data);
                        }
                    });
                })
            });
            $("#temukanStok").keyup(function (e) {
                delay(function () {
                    $.ajax({
                        type: 'GET',
                        url: "{{env('APP_URL')}}/filterStock/" + ($("#temukanStok").val().toString() == '' ? 'kosong' : $("#temukanStok").val().toString()),
                        success: (data) => {
                            $("#daftar-stock").html(data);
                        },
                        error: function (data) {
                            // console.log(data);
                        }
                    });
                })
            });


            let temps;


            $('#current_add').click(function () {
                const input = $('#current_input');
                input.val(parseInt(input.val()) + 1);
            })
            $('#current_min').click(function () {
                const input = $('#current_input');
                if (parseInt(input.val()) > 0) {
                    input.val(parseInt(input.val()) - 1);
                } else {
                    alert("weleh weleh")
                }
            })
            $('#current_appl').click(function () {
                let haha = false;
                let getIndex = 0;

                temporaryData.forEach(myFunction);

                function myFunction(item, index) {
                    if (!haha === true) {
                        haha = (item.id === temps.id ? true : false)
                        getIndex = index;
                    }
                }

                if (!haha === true) {
                    temps.amount = parseInt($('#current_input').val());
                    temporaryData.push(temps);
                    console.table(temporaryData);
                    // console.log("namboh");

                } else {
                    // console.log('update');
                    temps.amount = parseInt(temporaryData[getIndex].amount) + parseInt($('#current_input').val());
                    temporaryData[getIndex] = temps;
                    console.table(temporaryData);
                }
                $('#modalAddToCart').modal('hide');
            })
            $('#modalAddToCart').on('show.bs.modal', function (e) {
                console.table(temporaryData);

                $('#current_input').val(0);
                temps = $(e.relatedTarget).data('json');
                let haha = false;
                let getIndex = 0;
                temporaryData.forEach(myFunction);

                function myFunction(item, index) {
                    if (!haha === true) {
                        haha = (item.id === temps.id ? true : false)
                        getIndex = index;
                        $('#current_input').val(0);
                    }
                }


            })
            $('#modalCart').on('show.bs.modal', function (e) {
                // console.table(temporaryData);
               loadCart()
            })
            $('#bayar_btn').click(function () {
                if(temporaryData.length === 0){
                    alert("tolonglah lek tambah dulu menunya")
                }else{
                    $.ajax({
                        type: 'POST',
                        url: "{{route('bayar')}}",
                        data: {data: JSON.stringify(temporaryData)},
                        async: true,
                        cache: false,
                        success: (data) => {
                            window.open("{{env('APP_URL')}}" + "/print/invoice/" + data);
                            location.reload()
                        },
                        error: function (data) {
                            // console.log(data);
                        }
                    });
                }

            })


            const dt2 = $('.zero-configuration2').DataTable({
                order: [[2, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{route('invoice.dataTable')}}'
                },
                columns: [
                    {data: 'nomor_invoice', name: 'nomor_invoice', orderable: true, class: 'text-center'},
                    {data: 'user.name', name: 'user.name', orderable: true, class: 'text-center'},
                    {data: 'created_at', name: "created_at", className: "text-center"},
                    {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                ]
            });


        });

        function fungsiPrintInvoice(nomorinvoice) {
            window.open("{{env('APP_URL')}}" + "/print/invoice/" + nomorinvoice);
        }


    </script>
@endsection
