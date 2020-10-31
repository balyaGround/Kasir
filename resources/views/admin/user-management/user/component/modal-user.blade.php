<div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.store')}}" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <label>Nama user: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama user" name="name" class="form-control">
                    </div>
                    <label>Email user: </label>
                    <div class="form-group">
                        <input type="text" placeholder="email" name="email" class="form-control">
                    </div>
                    <label>Username: </label>
                    <div class="form-group">
                        <input type="text" placeholder="username" name="username" class="form-control">
                    </div>
                    <label>Password user: </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password user" name="password" class="form-control">
                    </div>
                    <label>Toko : </label>
                    <div class="form-group">
                        <select class="form-control valid tokos" id="add-type" name="toko_id" aria-invalid="false">

                        </select>
                    </div>
                    <label>Role : </label>
                    <div class="form-group">
                        <select class="form-control valid roles" id="add-type" name="role_id" aria-invalid="false">

                        </select>
                    </div>
                    <label>Foto : </label>
                    <div class="form-group">
                        <input type="file" placeholder="Image" name="image_user" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nama user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit-formUser" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label>Nama user: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama user" id="editnameUser" name="name"
                               class="form-control">
                    </div>
                    <label>Email user: </label>
                    <div class="form-group">
                        <input type="text" placeholder="email" id="editemailUser" name="email" class="form-control">
                    </div>
                    <label>Username: </label>
                    <div class="form-group">
                        <input type="text" placeholder="username" id="editusernameUser" name="username"
                               class="form-control">
                    </div>
                    <label>Password user: </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password user" id="editpasswordUser" name="password"
                               class="form-control">
                    </div>
                    <label>Toko : </label>
                    <div class="form-group">
                        <select class="form-control valid tokos" id="edittokoUser" name="toko_id" aria-invalid="false">

                        </select>
                    </div>
                    <label>Role : </label>
                    <div class="form-group">
                        <select class="form-control valid roles" id="editroleUser" name="role_id" aria-invalid="false">
                        </select>
                    </div>
                    <label>Foto : </label>
                    <div class="form-group">
                        <input type="file" placeholder="Image" name="image_user" class="form-control">
                    </div>  
                    <input type="text" name="id" id="editidUser" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="delete-formUser" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    <p>Apakah kamu yakin ingin hapus user ?</p>
                    <input type="text" id="deleteidUser" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
