<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Nov 2022", "Des 2022", "Jan 2023", "Feb 2023", "Mar 2023", "Apr 2023", "Mei 2023", "Jun 2023", "Jul 2023", "Agus 2023", "Sep 2023", "Okt 2023"],
        datasets: [{
          label: "Pemasukan",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#cb0c9f",
          data: [{{ isset($grafikpemasukan[0]) ? $grafikpemasukan[0] : 0 }}, {{ isset($grafikpemasukan[1]) ? $grafikpemasukan[1] : 0  }}, {{ isset($grafikpemasukan[2]) ? $grafikpemasukan[2] : 0  }}, {{ isset($grafikpemasukan[3]) ? $grafikpemasukan[3] : 0  }},{{ isset($grafikpemasukan[4]) ? $grafikpemasukan[4] : 0  }}, {{ isset($grafikpemasukan[5]) ? $grafikpemasukan[5] : 0  }}, {{ isset($grafikpemasukan[6]) ? $grafikpemasukan[6] : 0  }}, {{ isset($grafikpemasukan[7]) ? $grafikpemasukan[7] : 0  }}, {{ isset($grafikpemasukan[8]) ? $grafikpemasukan[8] : 0  }}, {{ isset($grafikpemasukan[9]) ? $grafikpemasukan[9] : 0  }}, {{ isset($grafikpemasukan[10]) ? $grafikpemasukan[10] : 0  }}, {{ isset($grafikpemasukan[11]) ? $grafikpemasukan[11] : 0  }}],
          maxBarThickness: 6
        },{
          label: "Pengeluaran",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#3A416F",
          data: [{{ isset($grafikpengeluaran[0]) ? $grafikpengeluaran[0] : 0 }}, {{ isset($grafikpengeluaran[1]) ? $grafikpengeluaran[1] : 0  }}, {{ isset($grafikpengeluaran[2]) ? $grafikpengeluaran[2] : 0  }}, {{ isset($grafikpengeluaran[3]) ? $grafikpengeluaran[3] : 0  }},{{ isset($grafikpengeluaran[4]) ? $grafikpengeluaran[4] : 0  }}, {{ isset($grafikpengeluaran[5]) ? $grafikpengeluaran[5] : 0  }}, {{ isset($grafikpengeluaran[6]) ? $grafikpengeluaran[6] : 0  }}, {{ isset($grafikpengeluaran[7]) ? $grafikpengeluaran[7] : 0  }}, {{ isset($grafikpengeluaran[8]) ? $grafikpengeluaran[8] : 0  }}, {{ isset($grafikpengeluaran[9]) ? $grafikpengeluaran[9] : 0  }}, {{ isset($grafikpengeluaran[10]) ? $grafikpengeluaran[10] : 0  }}, {{ isset($grafikpengeluaran[11]) ? $grafikpengeluaran[11] : 0  }}],
          maxBarThickness: 6
        },],
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
          intersect: true,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: true,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
            },
            ticks: {

              stepSize: 1000000,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#3A416F"
            },
          },
          x: {
            grid: {
              drawBorder: true,
              display: true,
              drawOnChartArea: true,
              drawTicks: true
            },
            ticks: {
              display: true
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Awal", "Nov 2022", "Des 2022", "Jan 2023", "Feb 2023", "Mar 2023", "Apr 2023", "Mei 2023", "Jun 2023", "Jul 2023", "Agus 2023", "Sep 2023", "Okt 2023"],
        datasets: [{
            label: "Pemasukan",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [0, {{ isset($grafikpemasukan[0]) ? $grafikpemasukan[0] : 0 }}, {{ isset($grafikpemasukan[1]) ? $grafikpemasukan[1] : 0  }}, {{ isset($grafikpemasukan[2]) ? $grafikpemasukan[2] : 0  }}, {{ isset($grafikpemasukan[3]) ? $grafikpemasukan[3] : 0  }},{{ isset($grafikpemasukan[4]) ? $grafikpemasukan[4] : 0  }}, {{ isset($grafikpemasukan[5]) ? $grafikpemasukan[5] : 0  }}, {{ isset($grafikpemasukan[6]) ? $grafikpemasukan[6] : 0  }}, {{ isset($grafikpemasukan[7]) ? $grafikpemasukan[7] : 0  }}, {{ isset($grafikpemasukan[8]) ? $grafikpemasukan[8] : 0  }}, {{ isset($grafikpemasukan[9]) ? $grafikpemasukan[9] : 0  }}, {{ isset($grafikpemasukan[10]) ? $grafikpemasukan[10] : 0  }}, {{ isset($grafikpemasukan[11]) ? $grafikpemasukan[11] : 0  }}],
            maxBarThickness: 6

          },
          {
            label: "Pengeluaran",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [0, {{ isset($grafikpengeluaran[0]) ? $grafikpengeluaran[0] : 0 }}, {{ isset($grafikpengeluaran[1]) ? $grafikpengeluaran[1] : 0  }}, {{ isset($grafikpengeluaran[2]) ? $grafikpengeluaran[2] : 0  }}, {{ isset($grafikpengeluaran[3]) ? $grafikpengeluaran[3] : 0  }},{{ isset($grafikpengeluaran[4]) ? $grafikpengeluaran[4] : 0  }}, {{ isset($grafikpengeluaran[5]) ? $grafikpengeluaran[5] : 0  }}, {{ isset($grafikpengeluaran[6]) ? $grafikpengeluaran[6] : 0  }}, {{ isset($grafikpengeluaran[7]) ? $grafikpengeluaran[7] : 0  }}, {{ isset($grafikpengeluaran[8]) ? $grafikpengeluaran[8] : 0  }}, {{ isset($grafikpengeluaran[9]) ? $grafikpengeluaran[9] : 0  }}, {{ isset($grafikpengeluaran[10]) ? $grafikpengeluaran[10] : 0  }}, {{ isset($grafikpengeluaran[11]) ? $grafikpengeluaran[11] : 0  }}],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
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
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    

    
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
