<div>

<div class="row mt-4">
    <div class="col-lg-6 col-sm-6">
    <div class="card h-100">
    <div class="card-header pb-0 p-3">
    <div class="d-flex justify-content-between">
    <h6 class="mb-0">{{ __('cart') }} {{ __('cost') }}/{{ __('day') }}</h6>
        <h6 class="mb-0">
      {{ __('period') }}
            @if($awal == null)
            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
            @else
            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
            @endif
        </h6>
    </div>
    </div>
    <div class="card-body pb-0 p-3 mt-4">
    <div class="row">
    <div class="col-12 text-start">
    <div class="chart">
    <canvas id="eek" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
    </div>
    </div>

    </div>
    </div>

    </div>
    </div>
    <div class="col-lg-6 col-sm-6 mt-sm-0 mt-4">

    <div class="card">
    <div class="card-header pb-0 p-3">

    <div class="d-flex justify-content-between">
    <h6 class="mb-0">{{ __('cart') }} {{ __('cost') }}/ M³</h6>

    <h6 class="mb-0">
  {{ __('period') }}
        @if($awal == null)
        {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
        @else
        {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
        @endif
    </h6>


    </div>

    <div class="d-flex align-items-center">
    <span class="badge badge-md badge-dot me-4">
    <i style="background-color: #cb0c9f"></i>
    <span class="text-dark text-xs">WWTP</span>
    </span>
    <span class="badge badge-md badge-dot me-4">
    <i class="bg-dark"></i>
    <span class="text-dark text-xs">STP</span>
    </span>
    </div>
    </div>
    <div class="card-body p-3">
    <div class="chart">
    <canvas id="tai" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
    </div>
    </div>
    </div>
    </div>
    </div>


    <div class="row mt-4">
        <div class="col-lg-12 col-sm-12">
        <div class="card h-100">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-0">{{ __('cart') }} {{ __('produk') }} WWTP</h6>
            <h6 class="mb-0">
          {{ __('period') }}
                @if($awal == null)
                {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                @else
                {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                @endif
            </h6>
        </div>
        </div>
        <div class="card-body pb-0 p-3 mt-4">
        <div class="row">
        <div class="col-12 text-start">
        <div class="chart">
        <canvas id="item_wwtp" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
        </div>
        </div>

        </div>
        </div>

        </div>
        </div>
        <div class="col-lg-12 col-sm-12 mt-4">

        <div class="card">
        <div class="card-header pb-0 p-3">

        <div class="d-flex justify-content-between">
        <h6 class="mb-0">{{ __('cart') }} {{ __('produk') }} STP</h6>

        <h6 class="mb-0">
      {{ __('period') }}
            @if($awal == null)
            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
            @else
            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
            @endif
        </h6>


        </div>

        <div class="d-flex align-items-center">
        <span class="badge badge-md badge-dot me-4">
        <i style="background-color: #cb0c9f"></i>
        <span class="text-dark text-xs">WWTP</span>
        </span>
        <span class="badge badge-md badge-dot me-4">
        <i class="bg-dark"></i>
        <span class="text-dark text-xs">STP</span>
        </span>
        </div>
        </div>
        <div class="card-body p-3">
        <div class="chart">
        <canvas id="item_stp" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
        </div>
        </div>
        </div>
        </div>
        </div>


    <div class="row mt-4">
        <div class="col-lg-8">
        <div class="card h-100">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-0">Top {{ __('pemakaian') }}</h6>
        <h6 class="mb-0">
      {{ __('period') }}
            @if($awal == null)
            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
            @else
            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
            @endif
        </h6>
        </div>
        </div>
        <div class="card-body p-3">
        <div class="chart">
        <canvas id="babi" class="chart-canvas" height="600" ></canvas>
        </div>
        </div>
        </div>
        </div>

        <div class="col-lg-4 mt-lg-0 mt-4">
        <div class="card">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-0">Stock {{ __('produk') }}</h6>
        </div>
        </div>
        <div class="card-body p-3">
        <ul class="list-group list-group-flush list my--3">

            @foreach ($stocks as $s)
            <li class="list-group-item px-0 border-0">
                <div class="row align-items-center">

                <div class="col">
                <p class="text-xs font-weight-bold mb-0">{{ __('produk') }}:</p>
                <h6 class="text-sm mb-0">{{ $s->nama_barang }}</h6>
                </div>
                <div class="col text-center">
                <p class="text-xs font-weight-bold mb-0">{{ __('price') }}/Kg:</p>
                <h6 class="text-sm mb-0">@currency($s->harga_po)</h6>
                </div>
                <div class="col text-center">
                <p class="text-xs font-weight-bold mb-0">Stock:</p>
                <h6 class="text-sm mb-0">{{ $s->total_qty - $s->total_pemakaian }}</h6>
                </div>
                </div>
                <hr class="horizontal dark mt-3 mb-1">
                </li>
            @endforeach



        </ul>
        </div>
        </div>
        </div>
        </div>


        <div class="row mt-4">
            <div class="col-lg-12 col-sm-12">
            <div class="card h-100">
            <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
            <h6 class="mb-0">{{ __('grafik_internal_daily') }} COD</h6>
                <h6 class="mb-0">
              {{ __('period') }}
                    @if($awal == null)
                    {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                    @else
                    {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                    @endif
                </h6>
            </div>
            </div>
            <div class="card-body pb-0 p-3 mt-4">
            <div class="row">
            <div class="col-12 text-start">
            <div class="chart">
            <canvas id="ph" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
            </div>
            </div>

            </div>
            </div>

            </div>
            </div>

            </div>


            <div class="row mt-4">
                <div class="col-lg-12 col-sm-12">
                <div class="card h-100">
                <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                <h6 class="mb-0">{{ __('grafik_internal_daily') }} BOD</h6>
                    <h6 class="mb-0">
                  {{ __('period') }}
                        @if($awal == null)
                        {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                        @else
                        {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                        @endif
                    </h6>
                </div>
                </div>
                <div class="card-body pb-0 p-3 mt-4">
                <div class="row">
                <div class="col-12 text-start">
                <div class="chart">
                <canvas id="bod" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                </div>
                </div>

                </div>
                </div>

                </div>
                </div>

                </div>



                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12">
                    <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                    <h6 class="mb-0">{{ __('grafik_internal_daily') }} TDS</h6>
                        <h6 class="mb-0">
                      {{ __('period') }}
                            @if($awal == null)
                            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                            @else
                            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                            @endif
                        </h6>
                    </div>
                    </div>
                    <div class="card-body pb-0 p-3 mt-4">
                    <div class="row">
                    <div class="col-12 text-start">
                    <div class="chart">
                    <canvas id="tds" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                    </div>
                    </div>

                    </div>
                    </div>

                    </div>
                    </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12 col-sm-12">
                        <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{ __('grafik_internal_daily') }} TSS</h6>
                            <h6 class="mb-0">
                          {{ __('period') }}
                                @if($awal == null)
                                {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                @else
                                {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                @endif
                            </h6>
                        </div>
                        </div>
                        <div class="card-body pb-0 p-3 mt-4">
                        <div class="row">
                        <div class="col-12 text-start">
                        <div class="chart">
                        <canvas id="tss" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                        </div>
                        </div>

                        </div>
                        </div>

                        </div>
                        </div>

                        </div>


                        <div class="row mt-4">
                            <div class="col-lg-12 col-sm-12">
                            <div class="card h-100">
                            <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                            <h6 class="mb-0">{{ __('grafik_internal_daily') }} Color</h6>
                                <h6 class="mb-0">
                              {{ __('period') }}
                                    @if($awal == null)
                                    {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                    @else
                                    {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                    @endif
                                </h6>
                            </div>
                            </div>
                            <div class="card-body pb-0 p-3 mt-4">
                            <div class="row">
                            <div class="col-12 text-start">
                            <div class="chart">
                            <canvas id="color" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                            </div>
                            </div>

                            </div>
                            </div>

                            </div>
                            </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12 col-sm-12">
                                <div class="card h-100">
                                <div class="card-header pb-0 p-3">
                                <div class="d-flex justify-content-between">
                                <h6 class="mb-0">{{ __('grafik_internal_daily') }} DO<sup>3</sup> </h6>
                                    <h6 class="mb-0">
                                  {{ __('period') }}
                                        @if($awal == null)
                                        {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                        @else
                                        {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                        @endif
                                    </h6>
                                </div>
                                </div>
                                <div class="card-body pb-0 p-3 mt-4">
                                <div class="row">
                                <div class="col-12 text-start">
                                <div class="chart">
                                <canvas id="dodo" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                                </div>
                                </div>

                                </div>
                                </div>

                                </div>
                                </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-12 col-sm-12">
                                    <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                    <div class="d-flex justify-content-between">
                                    <h6 class="mb-0">{{ __('grafik_internal_daily') }} SV30 </h6>
                                        <h6 class="mb-0">
                                      {{ __('period') }}
                                            @if($awal == null)
                                            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                            @else
                                            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                            @endif
                                        </h6>
                                    </div>
                                    </div>
                                    <div class="card-body pb-0 p-3 mt-4">
                                    <div class="row">
                                    <div class="col-12 text-start">
                                    <div class="chart">
                                    <canvas id="sv30" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                                    </div>
                                    </div>

                                    </div>
                                    </div>

                                    </div>
                                    </div>

                                    </div>


                            <div class="row mt-4">
                                <div class="col-lg-12 col-sm-12">
                                <div class="card h-100">
                                <div class="card-header pb-0 p-3">
                                <div class="d-flex justify-content-between">
                                <h6 class="mb-0">{{ __('grafik_internal_daily') }} PH </h6>
                                    <h6 class="mb-0">
                                  {{ __('period') }}
                                        @if($awal == null)
                                        {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                        @else
                                        {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                        @endif
                                    </h6>
                                </div>
                                </div>
                                <div class="card-body pb-0 p-3 mt-4">
                                <div class="row">
                                <div class="col-12 text-start">
                                <div class="chart">
                                <canvas id="qty" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                                </div>
                                </div>

                                </div>
                                </div>

                                </div>
                                </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-12 col-sm-12">
                                    <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                    <div class="d-flex justify-content-between">
                                    <h6 class="mb-0">{{ __('grafik_internal_daily') }} Temperatur </h6>
                                        <h6 class="mb-0">
                                      {{ __('period') }}
                                            @if($awal == null)
                                            {{ date('d F Y', strtotime($start)) }} -    {{ date('d F Y', strtotime($end)) }}
                                            @else
                                            {{ date('d F Y', strtotime($awal)) }} -    {{ date('d F Y', strtotime($akhir)) }}
                                            @endif
                                        </h6>
                                    </div>
                                    </div>
                                    <div class="card-body pb-0 p-3 mt-4">
                                    <div class="row">
                                    <div class="col-12 text-start">
                                    <div class="chart">
                                    <canvas id="temperatur" class="chart-canvas" height="300" style="max-height: 300px"></canvas>
                                    </div>
                                    </div>

                                    </div>
                                    </div>

                                    </div>
                                    </div>

                                    </div>





@section('grafik')
<script src="/assets/js/plugins/chartjs.min.js"></script>


<script>

    let wwtp = document.getElementById("item_wwtp").getContext("2d");
    let stp = document.getElementById("item_stp").getContext("2d");
    let grafikBar = document.getElementById("tai").getContext("2d");
    let grafikLine = document.getElementById("eek").getContext("2d");
    let ph = document.getElementById("ph").getContext("2d");
    let bod = document.getElementById("bod").getContext("2d");
    let tds = document.getElementById("tds").getContext("2d");
    let tss = document.getElementById("tss").getContext("2d");
    let color = document.getElementById("color").getContext("2d");
    let dodo = document.getElementById("dodo").getContext("2d");
    let sv30 = document.getElementById("sv30").getContext("2d");
    let qty = document.getElementById("qty").getContext("2d");
    let temperatur = document.getElementById("temperatur").getContext("2d");

    var ctx3 = document.getElementById("babi").getContext("2d");



    let gradientStroke1 = grafikBar.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    let gradientStroke2 = grafikBar.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors


    // Line chart
   const myLine = new Chart(grafikBar, {
      type: "line",
      data: {
        labels: [
  @foreach ($grouped as $g)
    "{{ $g['tanggal'] }}",
  @endforeach
],
datasets: [

  {
    label: "COST WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
     @foreach ($grouped as $g)
     {{ round($g['total_cost']/$g['outlet'], 0) }},
     @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "COST STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
    @foreach ($groupedStp as $g)
    {{ round($g['total_cost']/$g['stp'], 0) }},
    @endforeach
],
            maxBarThickness: 6
          }
],
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
                callback: function (value, index, values) {
                    return "Rp." + value ;
                },
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });


    const myEek = new Chart(grafikLine, {
      type: "line",
      data: {
        labels: [
  @foreach ($grouped as $g)
    "{{ $g['tanggal'] }}",
  @endforeach
],
datasets: [

  {
    label: "COST WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
   data: [
     @foreach ($grouped as $g)
     {{ $g['total_cost']}} ,
     @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "COST STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                        @foreach ($groupedStp as $g)
                        {{ $g['total_cost']}} ,
                        @endforeach
                    ],
            maxBarThickness: 6
          }
],
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
                callback: function (value, index, values) {
    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    });
    return formatter.format(value);
},
              display: true,
              padding: 10,
              color: '#9ca2b7',


            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });

new Chart(ctx3, {
  type: "bar",
  data: {
    labels: [
        @foreach ($pemakaianProduct as $p)
            '{{ $p->nama_barang }}',
        @endforeach
    ],
    datasets: [{
      label: "Top Pemakaian",
      weight: 5,
      borderWidth: 0,
      borderRadius: 4,
      backgroundColor: [
        @foreach ($pemakaianProduct as $p)
            getRandomColor(),
        @endforeach
      ],
      data: [
        @foreach ($pemakaianProduct as $p)
            '{{ $p->pemakaianwwtp_sum_qty }}',
        @endforeach
      ],
      fill: false
    }],
  },
  options: {
    indexAxis: 'y',
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#9ca2b7'
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: true,
          drawTicks: true,
        },
        ticks: {
          display: true,
          color: '#9ca2b7',
          padding: 10
        }
      },
    },
  },
});

const myPh = new Chart(ph, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "COD WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->cod }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "COD STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->cod }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });


    const Bod = new Chart(bod, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "BOD WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->bod }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "BOD STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->bod }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });

    const myTds = new Chart(tds, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "TDS WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->tds }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "TDS STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->tds }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });


    const myTss = new Chart(tss, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "TSS WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->tss }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "TSS STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->tss }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });

    const myColor = new Chart(color, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "Color WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->color }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "Color STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->color }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });




    const myDo = new Chart(dodo, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "DO WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->do }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "DO STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->do }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });

    const Mysv30 = new Chart(sv30, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "SV30 WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->sv30 }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "SV30 STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->sv30 }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });


    const Myqty = new Chart(qty, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "PH WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 1,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->qty }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "PH STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 1,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->qty }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5],


            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7',
              stepSize: 0.1,
              beginAtZero: true,

            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });

    const MyTemperatur = new Chart(temperatur, {
      type: "line",
      data: {
        labels: [
  @foreach ($cekph as $g)
    "{{ $g->tanggal }}",
  @endforeach
],
datasets: [

          {
    label: "Temperature WWTP",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,
    pointBackgroundColor: "#cb0c9f",
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [
        @foreach ($cekph as $g)
    "{{ $g->temperatur }}",
  @endforeach
   ],
    maxBarThickness: 6
  },
  {
            label: "Temperature STP",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#2152ff",
            borderColor: "#2152ff",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                @foreach ($cekstp as $g)
    "{{ $g->temperatur }}",
  @endforeach
],
            maxBarThickness: 6
          }

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },

        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7'
            }
          },
          x: {

            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });




    function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
    const randomNum = () => Math.floor(Math.random() * (235 - 52 + 1) + 52);
const randomRGB = () => `rgb(${randomNum()}, ${randomNum()}, ${randomNum()})`;
    const myWwtp = new Chart(wwtp, {
      type: "bar",
      data: {
        labels: [
            @foreach ($grouped as $g)
    "{{ $g['tanggal'] }}",
  @endforeach
],
weight: 5,
datasets: [

    @foreach ($items as $item)
          {
    label: "{{ $item->nama_barang }}",

    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,


    backgroundColor:  getRandomColor(),

    data: [

        @foreach ($grouped as $g)
        <?php
                                $item_wwtp_id = $item->id;
                                $index = array_search($item_wwtp_id, $g['item_wwtp_ids']);
                                $qty = $index !== false ? $g['qtys'][$index] : 0;
                            ?>
    "{{ $cost = $qty !== 0 ? $qty * $item->harga_po : 0 }}",
  @endforeach
   ],
   fill: false
  },

  @endforeach

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },


        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7',
              callback: function (value, index, values) {
                    return "Rp." + value ;
                },
            }
          },
          x: {

            grid: {
              drawBorder: true,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,

            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });

    const myStp = new Chart(stp, {
      type: "bar",
      data: {
        labels: [
            @foreach ($groupedStp as $g)
    "{{ $g['tanggal'] }}",
  @endforeach
],
datasets: [

    @foreach ($items_stp as $item)
          {
    label: "{{ $item->nama_barang }}",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 2,

    backgroundColor:  getRandomColor(),
    data: [

        @foreach ($groupedStp as $g)
        <?php
                                $item_wwtp_id = $item->id;
                                $index = array_search($item_wwtp_id, $g['item_wwtp_ids']);
                                $qty = $index !== false ? $g['qtys'][$index] : 0;
                            ?>
    "{{ $cost = $qty !== 0 ? $qty * $item->harga_po : 0 }}",
  @endforeach
   ],
    fill: false
  },
  @endforeach

],


      },
      options: {
        layout: {
            padding: {
                left:0,
                right:0,
                top:0,
                bottom:0
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          },


        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: true,
              color: '#9ca2b7',
              callback: function (value, index, values) {
                    return "Rp." + value ;
                },
            }
          },
          x: {

            grid: {
              drawBorder: true,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,

            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 0
            }
          },
        },
      },
    });





  </script>


@endsection


</div>
