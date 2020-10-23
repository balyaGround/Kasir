<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const dt2 = $('.zero-configuration2').DataTable({
            order: [[0, "desc"]],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{env('APP_URL')}}/master/bahan/dataTable'
            },
            columns: [
                {data: 'nama', name: 'nama', orderable: true, class: 'text-center'},
                {data: 'quantity', name: "quantity", searchable: false, orderable: false, className: "text-center"},
                {data: 'image', name: "", searchable: false, orderable: false, className: "text-center"},
                {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
            ]
        });

        $('#add-formBahan').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{env('APP_URL')}}/master/bahan",
                processData: false,
                contentType: false,
                data: formData,
                success: (data) => {
                    $('#modalAddBahan').modal('hide');
                    dt2.ajax.reload(null, false);
                },
                error: function (data) {
                }
            });
        });

        $('#modalDeleteBahan').on('show.bs.modal', function (e) {
            let data = $(e.relatedTarget).data('json');
            $('#deleteidBahan').val(data.id.toString());
        });
        $('#modalEditBahan').on('show.bs.modal', function (e) {
            let data = $(e.relatedTarget).data('json');
            $('#editidBahan').val(data.id.toString());
            $('#editnameBahan').val(data.nama.toString());
            $('#editquantityBahan').val(data.quantity.toString());
        });
        $('#delete-formBahan').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            let Id = formData.get('id');
            $.ajax({
                url: '{{env('APP_URL')}}/master/bahan/' + Id,
                type: 'DELETE',
                dataType: 'HTML',
                success: function (resp) {
                    $("#modalDeleteBahan").modal("hide");
                    dt2.ajax.reload(null, false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $('#edit-formBahan').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            let Id = formData.get('id');
            $.ajax({
                type: 'POST',
                url: "{{env('APP_URL')}}/master/bahan/" + Id,
                processData: false,
                contentType: false,
                data: formData,
                success: (data) => {
                    // this.reset();
                    $('#modalEditBahan').modal('hide');
                    dt2.ajax.reload(null, false);
                    // oTable.ajax.reload(null, false);
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        });
    });
</script>
