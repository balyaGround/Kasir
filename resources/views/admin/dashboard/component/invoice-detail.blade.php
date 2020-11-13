@php
    $harga=0;
@endphp

<div id="bnn">
    @foreach($data[0]->penjualanDetail as $dt)
        @php
            $harga += ($dt->amount * $dt->produk->harga_jual);
        @endphp
        <div class="row mx-1 mt-1">
            <div class="col-md-5 col-4">
                <p>{{$dt->produk->nama}}</p>
            </div>
            <div class="col-md-3 col-5 mx-0 px-0">
                <div class="d-flex justify-content-around">
                    <button class="btn btn-primary btn-sm py-1 waves-effect"
                            onclick="fungsiKurangTambahMenuEdit({{$loop->iteration-1}},'kurang')"><i
                            class="fa fa-minus"></i></button>
                    <p class='text-center' style='margin-left:5px;margin-right:5px;'>{{$dt->amount}}</p>
                    <button class="btn btn-primary btn-sm py-1 waves-effect "
                            onclick="fungsiKurangTambahMenuEdit({{$loop->iteration -1 }},'tambah')"><i
                            class="fa fa-plus"></i></button>
                </div>
            </div>

            <div class="col-md-4 col-3 text-right">
                <p>{{$dt->amount * $dt->produk->harga_jual}}</p>
            </div>
        </div>
    @endforeach
    <hr>
    <div class="row mx-1">
        <div class="col-md-8 col-10 text-left">
            <p>Total</p>
        </div>
        <div class="col-md-4 col-2 text-right">
            <div class='mx-2'></div>
            <p>{{$harga}}</p>
        </div>
    </div>
</div>



    <script>
        $('#tambah-menu-btn').click(function (){

            alert('tessss');


        });
    </script>

