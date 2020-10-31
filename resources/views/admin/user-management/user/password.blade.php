@extends('layout.main')
@section('css')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ganti Password</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('password.process')}}" method="post">
                                    @csrf
                                    <label>Password Lama: </label>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password Lama" name="old_password" class="form-control">
                                    </div>
                                    <label>Password Baru: </label>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password Baru" name="new_password" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

    <div class="modal fade" id="modalDelete" tabindex="-1" user="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus user ?</p>
                        <input type="text" id="deleteid" name="id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
