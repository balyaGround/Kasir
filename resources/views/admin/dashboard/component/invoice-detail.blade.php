@php
    $harga=0;
@endphp

<div id="bnn">
    @foreach($data[0]->penjualanDetail as $dt)
        @php
            $harga += ($dt->amount * $dt->produk->harga_jual);
        @endphp
        <div class="row mx-1 mt-1">
            <div class="col-md-5 col-3">
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

            <div class="col-md-4 col-4 text-right">
                <p>Rp.{{ number_format($dt->amount * $dt->produk->harga_jual) }},00-</p>
            </div>
        </div>
    @endforeach


    <hr>
    <div class="row mx-1">
        <div class="col-md-8 col-8 text-left">
            <p>Total</p>
        </div>
        <div class="col-md-4 col-4 text-right">
            <div class='mx-2'></div>
            <p>Rp.{{number_format($harga),'.' }},00-</p>
        </div>
    </div>
    <div class="row mx-1  mt-1">
        <div class="col-md-8 col-8 text-left">
            <p class="mt-1">Nomor/Nama Meja</p>
        </div>
        <div class="col-md-4 col-4 text-right">
            {{--                <div class='mx-2'></div>--}}
            <input class="form-control text-right" name="namaMeja" id="namaMejaEdits" value="{{$data[0]->nomor_nama_meja}}"
                   type="text">
        </div>
    </div>
    <div class="row mx-1  mt-1">
        <div class="col-md-8 col-8 text-left">
            <p>Jumlah Bayar</p>
        </div>
        <div class="col-md-4 col-4 text-right">
            <input type="text" class="form-control text-right" id="jumlahBayar" value="0">
        </div>
    </div>
    <div class="row mx-1  mt-1">
        <div class="col-md-8 col-8 text-left">
            <p>Kembalian</p>
        </div>
        <div class="col-md-4 col-4 text-right">
            <div class='mx-2'></div>
            <p id="kembalianText"></p>
            <input type="text" id="kembalian" value="0" hidden>
        </div>
    </div>


</div>


<script>


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
        }
        return "Rp. " + val + ",00.-";
    }

    $("#jumlahBayar").keyup(function (e) {
        let harga ={{$harga}}
            // let kembalian = ((harga - this.value) < 0 ?  ((harga-this.value)*-1) : ((harga-this.value)*-1) ) ;
            let
        kembalian = ((harga - this.value) * -1);
        $("#kembalian").val(kembalian);
        $("#kembalianText").html(commaSeparateNumber(kembalian));
    });
    total ={{$harga}};
</script>

