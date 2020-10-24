
<button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"> <i class="fa fa-plus"></i> Tambah Produk
</button>
<div class="table-responsive">
    <table class="table zero-configuration table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Harga Jual</th>
            <th class="text-center">Harga Modal</th>
            <th class="text-center">Logo</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['dataProduk'] as $dt)
            <tr>
                <td class="text-center">{{$dt->nama}}</td>
                <td class="text-center">{{$dt->harga_jual}}</td>
                <td class="text-center">{{$dt->harga_modal}}</td>
                <td class="text-center"><img
                        src="{{asset('storage/images/imageProduk/small').'/'.$dt->image_uri}}"
                        alt=""></td>
                <td class="text-center">
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalEdit"
                            data-json='{{json_encode($dt)}}'><i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-info" data-toggle="modal"
                            data-target="#modalReceipt" data-json='{{json_encode($dt)}}'>Receipt
                    </button>
                    <button class="btn btn-danger" data-toggle="modal"
                            data-target="#modalDelete" data-json='{{json_encode($dt)}}'><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
