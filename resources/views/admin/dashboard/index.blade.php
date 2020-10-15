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
                                        class="feather icon-clock"> Daftar Menu</i></a>
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
                                            <fieldset class="form-group position-relative has-icon-left font-medium-4 shadow">
                                                <input type="text" class="form-control search-product py-2" id="iconLeft5" placeholder="Temukan Menu">
                                                <div class="form-control-position font-medium-4 " style="padding-top: 5px;">
                                                    <i class="feather icon-search" ></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab"
                                 role="tabpanel">
                                <p>Pudding candy canes sugar plum cookie chocolate cake powder
                                    croissant. Carrot cake tiramisu danish
                                    candy cake muffin croissant tart dessert. Tiramisu caramels
                                    candy canes chocolate cake sweet roll
                                    liquorice icing cupcake.</p>
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
