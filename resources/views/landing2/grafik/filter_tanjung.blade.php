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
            name: 'Pasar Tanjung',
            data: [
                @foreach ($harga_chart_tanjung as $tanjung)
                    {{ $tanjung->harga_hari_ini }},
                @endforeach
            ]
        }],
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
</script>
