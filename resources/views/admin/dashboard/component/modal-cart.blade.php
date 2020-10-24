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
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

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
        </div>
    </div>
</div>
