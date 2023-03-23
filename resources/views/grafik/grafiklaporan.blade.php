<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var ctx2 = document.getElementById("chart-pie").getContext("2d");
    var ctx3 = document.getElementById("chart-bar").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    // Line chart
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Awal", "Nov 2022", "Des 2022", "Jan 2023", "Feb 2023", "Mar 2023", "Apr 2023", "Mei 2023", "Jun 2023", "Jul 2023", "Agus 2023", "Sep 2023", "Okt 2023"],
        datasets: [{
            label: "Pengeluaran",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#cb0c9f",
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [0, {{ isset($grafikpengeluaran[0]) ? $grafikpengeluaran[0] : 0 }}, {{ isset($grafikpengeluaran[1]) ? $grafikpengeluaran[1] : 0  }}, {{ isset($grafikpengeluaran[2]) ? $grafikpengeluaran[2] : 0  }}, {{ isset($grafikpengeluaran[3]) ? $grafikpengeluaran[3] : 0  }},{{ isset($grafikpengeluaran[4]) ? $grafikpengeluaran[4] : 0  }}, {{ isset($grafikpengeluaran[5]) ? $grafikpengeluaran[5] : 0  }}, {{ isset($grafikpengeluaran[6]) ? $grafikpengeluaran[6] : 0  }}, {{ isset($grafikpengeluaran[7]) ? $grafikpengeluaran[7] : 0  }}, {{ isset($grafikpengeluaran[8]) ? $grafikpengeluaran[8] : 0  }}, {{ isset($grafikpengeluaran[9]) ? $grafikpengeluaran[9] : 0  }}, {{ isset($grafikpengeluaran[10]) ? $grafikpengeluaran[10] : 0  }}, {{ isset($grafikpengeluaran[11]) ? $grafikpengeluaran[11] : 0  }}],
            maxBarThickness: 6
          },
          {
            label: "Pemasukan",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [0, {{ isset($grafikpemasukan[0]) ? $grafikpemasukan[0] : 0 }}, {{ isset($grafikpemasukan[1]) ? $grafikpemasukan[1] : 0  }}, {{ isset($grafikpemasukan[2]) ? $grafikpemasukan[2] : 0  }}, {{ isset($grafikpemasukan[3]) ? $grafikpemasukan[3] : 0  }},{{ isset($grafikpemasukan[4]) ? $grafikpemasukan[4] : 0  }}, {{ isset($grafikpemasukan[5]) ? $grafikpemasukan[5] : 0  }}, {{ isset($grafikpemasukan[6]) ? $grafikpemasukan[6] : 0  }}, {{ isset($grafikpemasukan[7]) ? $grafikpemasukan[7] : 0  }}, {{ isset($grafikpemasukan[8]) ? $grafikpemasukan[8] : 0  }}, {{ isset($grafikpemasukan[9]) ? $grafikpemasukan[9] : 0  }}, {{ isset($grafikpemasukan[10]) ? $grafikpemasukan[10] : 0  }}, {{ isset($grafikpemasukan[11]) ? $grafikpemasukan[11] : 0  }}],
            maxBarThickness: 6
          }
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
                stepSize: 1000000,
              beginAtZero: true,
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


    // Pie chart
    new Chart(ctx2, {
      type: "pie",
      data: {

        labels: ['{{ (!empty($maxpengeluaran[0])) ? $maxpengeluaran[0]->name : ''}}', '{{ (!empty($maxpengeluaran[1])) ? $maxpengeluaran[1]->name : ''}}', '{{ (!empty($maxpengeluaran[2])) ? $maxpengeluaran[2]->name : ''}}', '{{ (!empty($maxpengeluaran[3])) ? $maxpengeluaran[3]->name : ''}}'],
        datasets: [{
          label: "Pengeluaran",
          weight: 9,
          cutout: 0,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#17c1e8', '#cb0c9f', '#3A416F', '#a8b8d8'],
          data:  [{{ (!empty($maxpengeluaran[0])) ? $maxpengeluaran[0]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[1])) ? $maxpengeluaran[1]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[2])) ? $maxpengeluaran[2]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[3])) ? $maxpengeluaran[3]->pengeluaran_sum_jumlah : ''}}],
          fill: false
        }],
      },


    //     labels: ['{{ (!empty($maxpengeluaran[0])) ? $maxpengeluaran[0]->name : ''}}', '{{ (!empty($maxpengeluaran[1])) ? $maxpengeluaran[1]->name : ''}}', '{{ (!empty($maxpengeluaran[2])) ? $maxpengeluaran[2]->name : ''}}', '{{ (!empty($maxpengeluaran[3])) ? $maxpengeluaran[3]->name : ''}}'],
    //     datasets: [{
    //       label: "Pengeluaran",
    //       weight: 9,
    //       cutout: 0,
    //       tension: 0.9,
    //       pointRadius: 2,
    //       borderWidth: 2,
    //       backgroundColor: ['#17c1e8', '#cb0c9f', '#3A416F', '#a8b8d8'],
    //       data: [{{ (!empty($maxpengeluaran[0])) ? $maxpengeluaran[0]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[1])) ? $maxpengeluaran[1]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[2])) ? $maxpengeluaran[2]->pengeluaran_sum_jumlah : ''}}, {{ (!empty($maxpengeluaran[3])) ? $maxpengeluaran[3]->pengeluaran_sum_jumlah : ''}}],
    //       fill: false,
    //     }],
    //   },
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
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });

    // Bar chart
    new Chart(ctx3, {
      type: "bar",
      data: {
        labels: ['{{ (!empty($maxpemasukan[0])) ? $maxpemasukan[0]->name : ''}}', '{{ (!empty($maxpemasukan[1])) ? $maxpemasukan[1]->name : ''}}', '{{ (!empty($maxpemasukan[2])) ? $maxpemasukan[2]->name : ''}}', '{{ (!empty($maxpemasukan[3])) ? $maxpemasukan[3]->name : ''}}', '{{ (!empty($maxpemasukan[4])) ? $maxpemasukan[4]->name : ''}}','{{ (!empty($maxpemasukan[5])) ? $maxpemasukan[5]->name : ''}}', '{{ (!empty($maxpemasukan[6])) ? $maxpemasukan[6]->name : ''}}', '{{ (!empty($maxpemasukan[7])) ? $maxpemasukan[7]->name : ''}}'],
        datasets: [{
          label: "Pemasukan",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: '#3A416F',
          data: [{{ (!empty($maxpemasukan[0])) ? $maxpemasukan[0]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[1])) ? $maxpemasukan[1]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[2])) ? $maxpemasukan[2]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[3])) ? $maxpemasukan[3]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[4])) ? $maxpemasukan[4]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[5])) ? $maxpemasukan[5]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[6])) ? $maxpemasukan[6]->pemasukan_sum_jumlah : ''}}, {{ (!empty($maxpemasukan[7])) ? $maxpemasukan[7]->pemasukan_sum_jumlah : ''}}],
          fill: false
        }],
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
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
              stepSize: 1000000,
              beginAtZero: true,
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });
  </script>
