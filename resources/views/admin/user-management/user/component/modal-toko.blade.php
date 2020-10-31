<!-- Modal -->
<div class="modal fade" id="modalAddToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="add-formToko" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    <label>Nama Toko: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Toko" name="nama" class="form-control" required>
                    </div>

                    <label>Logo Toko: </label>
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
<div class="modal fade" id="modalEditToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit-formToko" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label>Nama Toko: </label>
                    <div class="form-group">
                        <input type="text" id="editnameToko" placeholder="Nama Toko" name="nama" class="form-control">
                    </div>

                    <label>Logo Toko: </label>
                    <div class="form-group">
                        <input type="file" id="editlogosuriToko" placeholder="file" name="logo" class="form-control">
                    </div>
                    <input type="text" name="id" id="editidToko" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteToko" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-formToko" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus toko ?</p>
                    <input type="text" id="deleteidToko" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
