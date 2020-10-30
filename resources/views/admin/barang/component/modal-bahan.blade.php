<div class="modal fade" id="modalAddBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="add-formBahan" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    <label>Nama bahan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama bahan" name="nama" class="form-control" required>
                    </div>

                    <label>Stok : </label>
                    <div class="form-group">
                        <input type="number" placeholder="Stock bahan" name="quantity" class="form-control" required>
                    </div>

                    <label>Image bahan: </label>
                    <div class="form-group">
                        <input type="file" placeholder="file" name="logo" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit-formBahan" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label>Nama bahan: </label>
                    <div class="form-group">
                        <input type="text" id="editnameBahan" placeholder="Nama bahan" name="nama" class="form-control">
                    </div>

                    <label>Stock Bahan: </label>
                    <div class="form-group">
                        <input type="text" id="editquantityBahan" placeholder="Stock bahan" name="quantity" class="form-control">
                    </div>

                    <label>Image bahan: </label>
                    <div class="form-group">
                        <input type="file" id="editlogosuriBahan" placeholder="file" name="logo" class="form-control">
                    </div>
                    <input type="text" name="id" id="editidBahan" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteBahan" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-formBahan" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus bahan ?</p>
                    <input type="text" id="deleteidBahan" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
