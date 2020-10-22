@extends('layout.main',['pesan'=>'<h2 class=" ml-1 my-1">Haloo, <span style="color:#e37e57;">'.auth()->user()['name'].' !</span></h1>'])
@section('css')

@endsection

@section('content')
    <div class="content-header row">
    </div>


    <div class="row mt-1">
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
                                <a class="nav-link font-medium-4 px-2" id="profile-tab" data-toggle="tab"
                                   href="#profile"
                                   aria-controls="profile" role="tab" aria-selected="true"><i
                                        class="feather icon-box"> Stok</i></a>

                            </li>
                        </ul>
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalCart"> Lihat keranjang
                        </button>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" aria-labelledby="home-tab"
                                 role="tabpanel">
                                <section id="ecommerce-searchbar">
                                    <div class="row mt-1 ">
                                        <div class="col-sm-12">
                                            <fieldset
                                                class="form-group position-relative has-icon-left font-medium-4 shadow">
                                                <input type="text" class="form-control search-product py-2"
                                                       id="iconLeft5" placeholder="Temukan Menu">
                                                <div class="form-control-position font-medium-4 "
                                                     style="padding-top: 5px;">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </section>
                                <section id="product">
                                    @foreach($data['produk'] as $dt)
                                        @if($loop->index == 0 || $loop->index %4 == 0)
                                            <div class="row px-2 mt-2">
                                                @endif
                                                <div class="col-md-3">
                                                    <a href="#" data-toggle="modal" data-json="{{$dt}}"
                                                       data-target="#modalAddToCart">
                                                        <div class="card border border-2"
                                                             style="border-color: #D25627 !important;">
                                                            <div class="zindex-1 position-absolute mt-1 ml-1">
                                                                <h3 class="border px-1 py-1 "
                                                                    style="border-radius: 15px; border-color: #e9754a; background-color: #e9754a;opacity: 0.8; color: white">
                                                                    {{$dt->nama}}</h3>
                                                            </div>
                                                            <div class="card-content">
                                                                <img class="img-fluid"
                                                                     style="border-bottom-left-radius: 15px;
                                                         border-bottom-right-radius: 15px; width: 100%;height: 220px"
                                                                     src="{{asset('storage/images/imageProduk/small').'/'.$dt->image_uri}}"
                                                                     alt="Card image cap">
                                                                {{--                                                    <div class="card-body">--}}

                                                                {{--                                                    </div>--}}
                                                            </div>
                                                            <div class="card-footer text-right bg-white border-0">
                                                                <h2>
                                                                    IDR {{number_format($dt->harga_jual,2,",",".")}}</h2>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                @if($loop->index % 4 == 3 || $loop->index==3)
                                            </div>
                                @endif
                                @endforeach
                            </div>
                            </section>
                        </div>
                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab"
                             role="tabpanel">
                            <section id="stock-searchbar">
                                <div class="row mt-1 ">
                                    <div class="col-sm-12">
                                        <fieldset
                                            class="form-group position-relative has-icon-left font-medium-4 shadow">
                                            <input type="text" class="form-control search-product py-2"
                                                   id="iconLeft5" placeholder="Temukan stok bahan makanan">
                                            <div class="form-control-position font-medium-4 "
                                                 style="padding-top: 5px;">
                                                <i class="feather icon-search"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </section>
                            <section id="stock">
                                @foreach($data['bahan'] as $dt)
                                    @if($loop->index == 0 || $loop->index %4 == 0)
                                        <div class="row px-2 mt-2">
                                            @endif
                                            <div class="col-md-3">
                                                <div class="card border border-2"
                                                     style="border-color: #D25627 !important;">
                                                    <div class="zindex-1 position-absolute mt-1 ml-1">
                                                        <h3 class="border px-1 py-1 "
                                                            style="border-radius: 15px; border-color: #e9754a; background-color: #e9754a;opacity: 0.8; color: white">
                                                            {{$dt->nama}}</h3>
                                                    </div>
                                                    <div class="card-content">
                                                        <img class="img-fluid"
                                                             style="border-bottom-left-radius: 15px;
                                                         border-bottom-right-radius: 15px; width: 100%;height: 220px"
                                                             src="{{asset('storage/images/imageBahan/small').'/'.$dt->image_uri}}"
                                                             alt="Card image cap">
                                                        {{--                                                    <div class="card-body">--}}

                                                        {{--                                                    </div>--}}
                                                    </div>
                                                    <div class="card-footer text-right bg-white border-0">
                                                        <h2>sisa stok : 20</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($loop->index % 4 == 3 || $loop->index==3)
                                        </div>
                                    @endif
                                @endforeach
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <div class="d-flex flex-row justify-content-center">
                            <div id="all-data">

                            </div>
                            <button class="btn btn-primary" id="current_min">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="number" id="current_input" value="0" class="form-control mx-1 text-center"
                                   style="width: 50px">
                            <button class="btn btn-primary" id="current_add">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" id="current_appl" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        {{--                        @csrf--}}
                        {{--                        <div class="d-flex flex-row justify-content-center">--}}
                        <div id="all-data-cart">

                        </div>
                        {{--                        </div>--}}
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" id="bayar_btn" class="btn btn-success">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let temporaryData = [];
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
                let html = "";
                let total = 0;
                temporaryData.forEach(myFunction);

                function myFunction(item, index) {
                    html += `<div class="row">
                                <div class="col-md-6 col-6">
                                    <p>${item.nama}</p>\
                                </div>
                                <div class="col-md-2 col-2">
                                    <p>${item.amount}</p>
                                </div>
                                <div class="col-md-2 col-2">
                                    <p>${item.amount * parseInt(item.harga_jual)}</p>
                                </div>
                              </div>`;
                    total +=item.amount * parseInt(item.harga_jual);
                }

                html += `
                        <hr>
                        <div class="row">
                                <div class="col-md-8 col-8 text-center">
                                    <p>Total</p>
                                </div>
                                <div class="col-md-2 col-2">
                                    <p>${total}</p>
                                </div>
                              </div>`;
                $('#all-data-cart').html(html);
            })

            $('#bayar_btn').click(function () {
                console.log(temporaryData);
                $.ajax({
                    type: 'POST',
                    url: "{{route('bayar')}}",
                    data: {data:JSON.stringify(temporaryData)},
                    async: true,
                    cache:false,
                    success: (data) => {
                        // $('#modalReceipt').modal('hide');

                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            })
        });
    </script>
@endsection
