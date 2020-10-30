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
                            <img class="img-thumbnail"
                                 style="border-bottom-left-radius: 15px;
                                                         border-bottom-right-radius: 15px; width: 100%;height: 220px"
                                 @if($dt->image_uri != '')
                                 src="{{asset('storage/images/imageBahan/small').'/'.$dt->image_uri}}"
                                 @else
                                 src="{{asset('original-asset/no-photo.jpg')}}"
                                 @endif
                                 alt="Card image cap">
                            {{--                                                    <div class="card-body">--}}

                            {{--                                                    </div>--}}
                        </div>
                        <div class="card-footer text-right bg-white border-0">
                            <h2>Stok {{$dt->quantity}}</h2>
                        </div>
                    </div>
                </div>
                @if($loop->index % 4 == 3 || $loop->index==3)
            </div>
        @endif
    @endforeach
</section>
