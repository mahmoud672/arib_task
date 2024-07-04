    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [
        ['January', 10],
        ['February', 8],
        ['March', 4],
        ['April', 13],
        ['May', 17],
        ['June', 9]
      ],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor: '#f3f3f3'
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: 'center'
        }
      },
      xaxis: {
        mode: 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */



    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [{
        label: 'Series2',
        data: 30,
        color: '#3c8dbc'
      },
      {
        label: 'Series3',
        data: 20,
        color: '#0073b7'
      },
      {
        label: 'Series4',
        data: 50,
        color: '#00c0ef'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
        label +
        '<br>' +
        Math.round(series.percent) + '%</div>'
    }


    // data tables


    $('#example1').DataTable();