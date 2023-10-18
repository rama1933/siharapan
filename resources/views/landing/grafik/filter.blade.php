<style>
    #chartdiv_filter {
        width: 100%;
        height: 380px;
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto);

    body {
        font-family: Roboto, sans-serif;
    }

    #chart {
        max-width: 100%;
        margin: 35px auto;
    }
</style>


<div id="chart">
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        series: [{
            name: 'Pasar Kandangan',
            data: [
                @foreach ($harga_chart_kandangan as $kandangan)
                    {{ $kandangan->harga_terendah }},
                @endforeach
            ]
        }, ],
        chart: {
            height: 550,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'date',
            categories: [
                @foreach ($tanggal as $tanggal)
                    "{{ date('d-m-Y', strtotime($tanggal->tanggal)) }}",
                @endforeach
                // "2018-09-19", "2018-09-19T", "2018-09-19",
                // "2018-09-19", "2018-09-19", "2018-09-19",
                // "2018-09-19"
            ]
        },
        tooltip: {
            x: {
                format: 'dd/mm/YY'
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    // function filter_pasar() {
    //     let nama = $("#select_filter").val()
    //     let pasar = $("#select_filter_pasar").val()
    //     // $("#tbl_non_filter").hide()
    //     console.log(pasar)
    //     $.ajax({
    //         url: window.location.origin + '/landing/filter/pasar',
    //         method: "POST",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: {
    //             nama: nama,
    //             pasar: pasar
    //         },
    //         beforeSend: function() {},
    //         success: function(data) {
    //             $('#chartdiv').html(data)
    //         }
    //     });
    // }
</script>
