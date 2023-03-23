<div>
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-1">
          <img src="/ltx/img/leetex_logo-removebg-preview.png" alt="" class="img-fluid">
          </div>
          <div class="col-8 justify-content-start">
             <H1>PT. Leetex Garmen Indonesia</H1><br>
             <h5> Jalan Raya Bandung Cirebon Desa SinarJati, Kec. Dawuan, Kabupaten Majalengka, Jawa Barat 45453</h5>

              </div>
          <div class="col-3 justify-content-end">
              <a href="/summarywwtp"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
              <a href="" onclick=" window.print(); " target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              </div>
          <!-- /.col -->
        </div>
        <h4 class="text-bold text-center mb-4">Summary WWTP dan STP</h4>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive table-bordered">
            <table class="table table-striped table-bordered" id="datatable-search">
                <thead class="thead-light">
                <tr>
                <th rowspan="2" class="text-sm "  style="vertical-align : middle;text-align:center;">Bulan</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">WWTP</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">STP</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">Total</th>

                </tr>

                </thead>
                <tbody>

                    @foreach ($grouped as $g)
                    <tr>


                        <td class="text-dark">{{ date("F", mktime(0, 0, 0, $g->month, 10)) }} {{ $g->year }}</td>


                        <td class="text-dark">@currency($g->total_status_1)</td>

                        <td class="text-dark">@currency($g->total_status_2)</td>

                        <td class="text-dark">@currency($g->total)</td>

                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                    <tr class="thead-light">
                        <td class="text-center">Total</td>
                        <td >@currency($total_wwtp->total)</td>
                        <td >@currency($total_stp->total)</td>
                        <td >@currency($grantototal->total)</td>

                    </tr>
                </tfoot>
                </table>

        </div>
        </div>
        </div>
        </div>
</div>
