<div class="table-responsive">
    <table
        class="table zero-configuration table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Income</th>
            <th class="text-center">Outcome</th>
            <th class="text-center">Penghasilan</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($data as $dt)
            <tr>
                <td >{{$dt['produk']['nama']}}</td>
                <td>{{$dt['amount']}}</td>
                <td>Rp.{{number_format($dt['produk']['harga_jual'],2,",",".")}}</td>
                <td>Rp.{{number_format($dt['produk']['harga_modal'],2,",",".")}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="text-center">
            <td > <span class="bold font-medium-3">Total</span></td>
            <td><span class="bold font-medium-3">{{$total_amount}}</span></td>
            <td><span class="bold font-medium-3">Rp.{{number_format($total_harga_jual,2,",",".")}}</span></td>
            <td><span class="bold font-medium-3">Rp.{{number_format($total_harga_modal,2,",",".")}}</span></td>

        </tr>
        </tfoot>
    </table>
</div>
