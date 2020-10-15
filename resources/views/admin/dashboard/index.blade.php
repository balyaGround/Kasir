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
                                    <div class="row px-2 mt-2">
                                        @for($i=0;$i<4;$i++)
                                        <div class="col-md-3">
                                            <div class="card border border-2" style="border-color: #D25627 !important;">
                                                <div class="zindex-1 position-absolute mt-1 ml-1">
                                                    <h3 class="border px-1 py-1 " style="border-radius: 15px; border-color: #e9754a; background-color: #e9754a;opacity: 0.8; color: white"> Rp.15.000,00</h3>
                                                </div>
                                                <div class="card-content" >
                                                    <img class="img-fluid"
                                                         style="border-bottom-left-radius: 15px;
                                                         border-bottom-right-radius: 15px;"
                                                         src="https://ecs7.tokopedia.net/img/cache/700/product-1/2017/8/17/0/0_855b1223-40d2-46d5-b11c-f4a439da4e56_460_320.jpg"
                                                         alt="Card image cap">
{{--                                                    <div class="card-body">--}}

{{--                                                    </div>--}}
                                                </div>
                                                <div class="card-footer text-center">
                                                    <h2>Burger</h2>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
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
                                                <div class="card border border-2" style="border-color: #D25627 !important;">
                                                    <div class="zindex-1 position-absolute mt-1 ml-1">
                                                        <h3 class="border px-1 py-1 " style="border-radius: 15px; border-color: #e9754a; background-color: #e9754a;opacity: 0.8; color: white">
                                                            {{$dt->nama}}</h3>
                                                    </div>
                                                    <div class="card-content" >
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




@endsection
@section('js')
@endsection
