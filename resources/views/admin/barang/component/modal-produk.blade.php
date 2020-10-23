<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('produk.store')}}" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    <label>Nama produk: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama produk" name="nama" class="form-control" required>
                    </div>

                    <label>Harga jual produk: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Harga produk" name="harga_jual" class="form-control" required>
                    </div>

                    <label>Harga modal produk: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Harga produk" name="harga_modal" class="form-control" required>
                    </div>

                    <label>Logo produk: </label>
                    <div class="form-group">
                        <input type="file" placeholder="file" name="logo" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label>Nama produk: </label>
                    <div class="form-group">
                        <input type="text" id="editname" placeholder="Nama produk" name="nama" class="form-control">
                    </div>
                    <label>Harga jual produk: </label>
                    <div class="form-group">
                        <input type="text" id="edithargajual" placeholder="Harga produk" name="harga_jual"
                               class="form-control">
                    </div>
                    <label>Harga modal produk: </label>
                    <div class="form-group">
                        <input type="text" id="edithargamodal" placeholder="Harga produk" name="harga_modal"
                               class="form-control">
                    </div>

                    <label>Logo produk: </label>
                    <div class="form-group">
                        <input type="file" id="editlogosuri" placeholder="file" name="logo" class="form-control">
                    </div>
                    <input type="text" name="id" id="editid" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus produk ?</p>
                    <input type="text" id="deleteid" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteReceipt" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-form-receipt" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus produk ?</p>
                    <input type="text" id="deleteidreceipt" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalReceipt" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Receipt produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="javascript:void(0)" id="receipt-form" enctype="multipart/form-data" method="post">
                    <div class="row px-1">
                        <div class="col-md-6 p-0 px-1">
                            <label>Bahan : </label>
                            <div class="form-group">
                                <select class="form-control valid" id="bahan-selection" name="bahan_id"
                                        aria-invalid="false">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 p-0 px-1">
                            <label>Quantity: </label>
                            <div class="form-group">
                                <input type="number" id="editlogosuri" placeholder="jumlah" name="quantity"
                                       class="form-control" required>
                            </div>
                        </div>
                        <input type="text" id="produk_id_receipt" name="produk_id" hidden>
                        <div class="col-md-3 text-right">
                            <label></label>
                            <div class="form-group">
                                <button class="btn btn-success btn-md btn-block"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="row align-content-center">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table  table-striped table-bordered w-100" id="zeroxw">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Bahan</th>
                                        <th class="text-center">Stok Dibutuhkan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                                        @foreach($data['dataProduk'] as $dt)--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="text-center">{{$dt->nama}}</td>--}}
                                    {{--                                                <td class="text-center">{{$dt->harga_jual}}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                        @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
