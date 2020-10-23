<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="add-formRole" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <label>Nama Role: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Role" name="nama" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit-formRole" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label>Nama Role: </label>
                    <div class="form-group">
                        <input type="text" id="editnameRole" placeholder="Nama Role" name="nama"
                               class="form-control">
                    </div>

                    <input type="text" name="id" id="editidRole" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteRole" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-formRole" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus Role ?</p>
                    <input type="text" id="deleteidRole" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
