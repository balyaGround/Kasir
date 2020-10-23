<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.zero-configuration').DataTable({
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        return commaSeparateNumber(data);
                    },
                    "targets": [1, 2]
                },
            ]
        });

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
            }
            return "Rp. " + val + ",00.-";
        }
        let oTable;
        $('#modalReceipt').on('show.bs.modal', function (e) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);

            $.ajax({
                url: '{{route('barang.bahan.selection')}}',
                type: 'GET',
                dataType: 'JSON',
                success: function (resp) {
                    console.table(resp)
                    let bahanhtml="";
                    resp.forEach(fungsibahan);
                    function fungsibahan(item, index) {
                        bahanhtml +="<option value='"+item.id+"'>"+item.nama+"</option>"
                    }
                    $('#bahan-selection').html(bahanhtml)

                },
                error: function (data) {
                    console.log(data);
                }});


            const data = $(e.relatedTarget).data('json');
            $('#produk_id_receipt').val(data.id.toString());
            oTable = $('#zeroxw').DataTable({
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{env('APP_URL')}}/master/produk/receipt/dataTable/' + data.id.toString()
                },
                columns: [
                    {data: 'bahan.nama', name: 'bahan.nama', orderable: true,class:'text-center'},
                    {data: 'bahan_qty', name: 'bahan_qty', orderable: true,class:'text-center'},
                    {data: 'action', name: "", searchable: false, orderable: false, className: "text-center"}
                ]
            });


        })

        $('#delete-form-receipt').submit(function (e) {
            var formData = new FormData(this);
            let Id = formData.get('id');
            $.ajax({
                url: '{{env('APP_URL')}}/master/produk/receipt/' + Id,
                type: 'DELETE',
                dataType: 'HTML',
                success: function (resp) {
                    oTable.ajax.reload(null, false);
                    $('#modalDeleteReceipt').modal('hide');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $('#receipt-form').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            let Id = formData.get('id');
            $.ajax({
                type: 'POST',
                url: "{{route('receipt.store')}}",
                processData: false,
                contentType: false,
                data: formData,
                async: true,
                cache:false,
                success: (data) => {
                    // $('#modalReceipt').modal('hide');
                    oTable.ajax.reload(null, false);
                },
                error: function (data) {
                    // console.log(data);
                }
            });

            return false;
        })

        $("#modalReceipt").on("hidden.bs.modal", function (e) {
            $('#zeroxw').dataTable().fnClearTable();
            $('#zeroxw').dataTable().fnDestroy();
        });

        $('#modalDeleteReceipt').on('show.bs.modal', function (e) {
            const data = $(e.relatedTarget).data('id');
            $('#deleteidreceipt').val(data.toString());
        });

        $('#modalDelete').on('show.bs.modal', function (e) {
            {{--    oTable.ajax.reload(null, false);--}}
            let data = $(e.relatedTarget).data('json');
            $('#deleteid').val(data.id.toString());
        });
        $('#modalEdit').on('show.bs.modal', function (e) {
            {{--    oTable.ajax.reload(null, false);--}}
            let data = $(e.relatedTarget).data('json');
            $('#editid').val(data.id.toString());
            $('#editname').val(data.nama.toString());
            $('#edithargajual').val(data.harga_modal.toString());
            $('#edithargamodal').val(data.harga_jual.toString());
        });
        $('#delete-form').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            let Id = formData.get('id');
            console.log(formData);
            $.ajax({
                url: '{{env('APP_URL')}}/master/produk/' + Id,
                type: 'DELETE',
                dataType: 'HTML',
                success: function (resp) {
                    $("#modalDelete").modal("hide");
                    location.reload()
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
        $('#edit-form').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            let Id = formData.get('id');
            $.ajax({
                type: 'POST',
                url: "{{env('APP_URL')}}/master/produk/" + Id,
                processData: false,
                contentType: false,
                data: formData,
                success: (data) => {
                    // this.reset();
                    $('#modalEdit').modal('hide');
                    location.reload()
                    // oTable.ajax.reload(null, false);
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        });

    });
</script>
