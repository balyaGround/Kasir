@extends('layout.main')

@section('css')
@endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active font-medium-3 px-2 " id="home-tab"
                                                       data-toggle="tab" href="#home"
                                                       aria-controls="home" role="tab" aria-selected="true"><i
                                                            class="feather icon-clock"> Hari Ini</i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-medium-3" id="profile-tab" data-toggle="tab"
                                                       href="#profile"
                                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                                            class="feather icon-calendar">Bulanan</i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-medium-3" id="pembukuan-tab"
                                                       data-toggle="tab"
                                                       href="#pembukuan"
                                                       aria-controls="profile" role="tab" aria-selected="true"><i
                                                            class="feather icon-book">Pembukuan</i></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home" aria-labelledby="home-tab"
                                                     role="tabpanel">
                                                    <h4 class="primary-text-color mt-2"> {{$tanggal_hari_ini}}</h4>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table zero-configuration table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Menu</th>
                                                                <th class="text-center">Jumlah Terjual</th>
                                                                <th class="text-center">Harga Jual Cafe</th>
                                                                <th class="text-center">Harga Jual Owner</th>
                                                                <th class="text-center">Hasil Cafe</th>
                                                                <th class="text-center">Hasil Owner</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                            @foreach($data as $dt)
                                                                <tr>
                                                                    <td>{{$dt['produk']['nama']}}</td>
                                                                    <td>{{$dt['amount']}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_jual'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_modal'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_jual'] *$dt['amount'],2,",",".")}}</td>
                                                                    <td>
                                                                        Rp.{{number_format($dt['produk']['harga_modal'] *$dt['amount'],2,",",".")}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr class="text-center">
                                                                <td><span class="bold font-medium-3">Total</span></td>
                                                                <td><span
                                                                        class="bold font-medium-3">{{$total_amount}}</span>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><span
                                                                        class="bold font-medium-3">Rp.{{number_format($total_harga_jual,2,",",".")}}</span>
                                                                </td>
                                                                <td><span
                                                                        class="bold font-medium-3">Rp.{{number_format($total_harga_modal,2,",",".")}}</span>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile" aria-labelledby="profile-tab"
                                                     role="tabpanel">
                                                    <h4 class="card-title primary-text-color mt-2">Grafik Bulanan</h4>
                                                    <div class="col-lg-12 col-12 col-md-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                {{--                                                                <h4 class="card-title primary-text-color">Grafik Bulanan</h4>--}}
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div id="line-area-chart"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="pembukuan" aria-labelledby="pembukuan-tab"
                                                     role="tabpanel">
                                                    <h4 class="primary-text-color mt-2">Pembukuan
                                                        Bulanan {{-- ({{$bulan_ini}} --}}</h4>


                                                    @include('admin.report-management.report.component.tab-content-pembukuan')

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('toko.store')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <label>Nama Toko: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Toko" name="nama" class="form-control">
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
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nama Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="edit-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label>Nama Toko: </label>
                        <div class="form-group">
                            <input type="text" id="editname" placeholder="Nama Toko" name="nama" class="form-control">
                        </div>

                        <label>Logo Toko: </label>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="delete-form" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        <p>Apakah kamu yakin ingin hapus toko ?</p>
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
{{--    <script src="{{asset('assets')}}/vendors/js/tables/datatable/pdfmake.min.js"></script>--}}
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    {{--    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>--}}
    <script src="{{asset('assets')}}/js/inline-edit-datatable.js"></script>
    {{--    <script src="{{asset('assets')}}/js/scripts/charts/chart-apex.js"></script>--}}


    <script>
        var editor;
        var dt2;
        // use a global for the submit and return data rendering in the examples


        var today = new Date();
        var yyyy = today.getFullYear();
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        today = yyyy + '-' + mm;

        function generateSelectMonth() {
            return $.ajax({
                url: '{{route("pembukuan.getAllBuku")}}',
                type: 'GET',
                dataType: 'JSON',
                success: function (resp) {
                    let html = "";
                    resp.data.forEach(myFunction);

                    function myFunction(item, index) {

                        if (item.year + '-' + item.month == today) {

                            html += `<option value="${item.year}-${item.month}" selected>${item.monthname} ${item.year}</option>`;
                        } else {
                            html += `<option value="${item.year}-${item.month}">${item.monthname} ${item.year}</option>`;
                        }

                    }

                    $('#monthiyerti').html(html)
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        }

        function generateDatatable(date) {
            dt2 = $('.pembukuan-dt').DataTable({
                order: [[0, "asc"]],
                "lengthMenu": [[31, -1], [31, "All"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{env('APP_URL')}}/report-management/pembukuan/get-all-buku-monthy/' + date,
                },
                columnDefs: [
                    {
                        "render": function (data, type, row) {
                            return commaSeparateNumber(data);
                        },
                        "targets": [1, 2, 3]
                    },
                ],
                columns: [
                    // {data: 'id', name: 'id', orderable: true, class: 'text-center'},
                    {data: 'created_at', name: 'created_at', orderable: true, class: 'text-center'},
                    {data: 'income', name: "income", searchable: false, orderable: false, className: "text-center"},
                    {
                        data: 'outcome',
                        name: "outcome",
                        searchable: false,
                        orderable: false,
                        className: "text-center"
                    },
                    {
                        data: 'penghasilan',
                        name: "penghasilan",
                        searchable: false,
                        orderable: false,
                        className: "text-center"
                    }
                ]
            });
        }

        function pembukuancheck() {
            $.ajax({
                url: '{{route('pembukuan.check')}}',
                type: 'GET',
                dataType: 'JSON',
                success: function (resp) {
                    // console.log(resp.hasil)
                    if (resp.hasil === true) {
                    } else {
                        $('#pemb').html('<button id="generatePembukuan" class="btn btn-success">Generate Pembukuan</button>')
                        $('#generatePembukuan').click(function () {
                            $.ajax({
                                url: '{{route('pembukuan.generate')}}',
                                type: 'GET',
                                dataType: 'JSON',
                                success: function (resp) {
                                    $('#pemb').html('');
                                    dt2.ajax.reload(null, false);
                                    generateSelectMonth()
                                },
                                error: function (data) {
                                    // console.log(data);
                                }
                            });
                        })
                    }

                },
                error: function (data) {
                    // console.log(data);
                }
            });
        }

        function pembukuan(date) {
            return $.ajax({
                url: '{{env('APP_URL')}}/report-management/pembukuan/tfoot/' + date,
                type: 'GET',
                dataType: 'JSON',
                success: function (resp) {
                    console.log(resp.data)
                    $('#tfoot-pembukuan').html('<td > <span class="bold font-medium-3">Total</span></td>\n' +
                        '            <td><span class="bold font-medium-3">' + commaSeparateNumber(resp.data.totalIncome) + '</span></td>\n' +
                        '            <td><span class="bold font-medium-3">' + commaSeparateNumber(resp.data.totalOutcome) + '</span></td>\n' +
                        '            <td><span class="bold font-medium-3">' + commaSeparateNumber(resp.data.totalPenghasilan) + '</span></td>')
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        }

        function chartGenerate() {
            return $.ajax({
                url: '{{route('report.chartTahunan')}}',
                type: 'GET',
                dataType: 'JSON',
                success: function (resp) {

                    var $primary = '#e9754a',
                        $success = '#28C76F',
                        $danger = '#EA5455',
                        $warning = '#FF9F43',
                        $info = '#00cfe8',
                        $label_color_light = '#dae1e7';

                    var themeColors = [$primary, $success, $danger, $warning, $info];


                    var yaxis_opposite = false;
                    if ($('html').data('textdirection') == 'rtl') {
                        yaxis_opposite = true;
                    }

                    var lineAreaOptions = {

                        chart: {
                            height: 350,
                            type: 'area',
                        },
                        colors: themeColors,
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        series: [{
                            name: 'Penghasilan',
                            data: resp.data
                        }],
                        legend: {
                            offsetY: -10
                        },
                        xaxis: {
                            format: 'MM',
                            categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                        },
                        yaxis: {
                            opposite: yaxis_opposite,
                            labels: {
                                formatter: function (val, index) {
                                    return commaSeparateNumber(val);
                                }
                            }
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        },
                    }
                    var lineAreaChart = new ApexCharts(
                        document.querySelector("#line-area-chart"),
                        lineAreaOptions
                    );
                    lineAreaChart.render();
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        }

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
            }
            return "Rp. " + val + ",00.-";
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            generateSelectMonth();

            pembukuancheck();
            generateDatatable(today);
            pembukuan(today);
            chartGenerate();
            $('.zero-configuration').DataTable({});
            const editor = new $.fn.dataTable.Editor({
                ajax: {
                    "url": "{{route('pembukuan.update')}}",
                    "type": 'POST'
                    ,
                },
                table: ".pembukuan-dt",
                fields: [
                    {
                        name: "id"
                    },
                    {
                        name: "created_at"
                    },
                    {
                        name: "outcome"
                    }, {
                        name: "income"
                    }, {
                        name: "penghasilan"
                    },
                ],
            });
            $('.pembukuan-dt').on('click', 'tbody td:not(:first-child,:nth-child(4))', function (e) {
                editor.inline(this, {
                    buttons: {
                        label: '<button class="btn btn-success btn-sm" >update</button>',
                        fn: function () {
                            this.submit();
                            dt2.ajax.reload(null, false);
                            pembukuan(today)
                            chartGenerate()
                        }
                    }
                });
            });
            $('#monthiyerti').on('change', function (e) {
                $(".pembukuan-dt").dataTable().fnDestroy();
                today = this.value
                generateDatatable(this.value);
                today = this.value;
                pembukuan(this.value);
                {{--$.ajax({--}}
                {{--    url: '{{route('pembukuan.tfoot')}}',--}}
                {{--    type: 'GET',--}}
                {{--    dataType: 'JSON',--}}
                {{--    success: function (resp) {--}}
                {{--       --}}

                {{--    },--}}
                {{--    error: function (data) {--}}
                {{--        // console.log(data);--}}
                {{--    }--}}
                {{--});--}}
            })
        });


    </script>
@endsection
