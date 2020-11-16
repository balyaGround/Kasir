<div class="modal fade" id="modalApplBayar" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart"
     aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered "
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row mx-1  mb-3">
                    <div class="col-md-8">
                        <label for="">Menu</label>
                        <select name="produk" class="select2 form-control" id="produk">
                            @foreach($data['produk'] as $dtp)
                                <option value="{{json_encode($dtp)}}">{{$dtp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" id="idInvoice"  value="2" hidden>



                    <div class="col-md-2">
                        <label for="" >Jumlah</label>
                        <input type="text" class="form-control" id="produkJumlah" value="1">
                    </div>
                    <div class="col-md-2 text-center">
                        <button class="btn btn-success mt-1 " id="tambohwaan">Tambah</button>
                    </div>
                </div>

                {{--                <div class="row mx-1"> <p>Apakah anda yakin sudah</p></div>--}}
                <div id="bkn">

                </div>

            </div>


            <div class="modal-footer justify-content-center">
                <button type="button" id="updateInvoiceBtn" class="btn btn-success">Simpan</button>
                <button type="button" data-toggle="modal" data-target="#modalApplyBayar" class="btn btn-success">Bayar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalApplyBayar" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               <div class="modal-body">
                    @csrf
                    <p>Apakah kamu yakin tidak ada perubahan ?</p>
                    <input type="text" id="invoiceIdApply" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" id="bayarApplyBtn" class="btn btn-success">Ya</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
                </div>
        </div>
    </div>
</div>
