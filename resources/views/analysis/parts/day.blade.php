<div class="row">
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
                <canvas id="line-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
</div>

@push("scripts")
<script type="text/javascript">
    var day = @json($days_avg["day"]);
    var temperature = @json($days_avg["temperature"]);
    var humidity = @json($days_avg["humidity"]);
    var ph = @json($days_avg["ph"]);
    var soil_moisture = @json($days_avg["soil_moisture"]);
    var pir = @json($days_avg["pir"]);
    var ec_meter = @json($days_avg["ec_meter"]);
    var light = @json($days_avg["light"]);
    var pin = @json($days_avg["pin"]);

    var ctx = document.getElementById("line-chart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: day,
            datasets: [{
                data: temperature,
                label: "Nhiệt độ",
                borderColor: "#e30015",
                fill: false
            }, {
                data: humidity,
                label: "Độ ẩm",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: ph,
                label: "Độ PH",
                borderColor: "#da5698",
                fill: false
            }, {
                data: soil_moisture,
                label: "Độ ẩm đất",
                borderColor: "#ed5b39",
                fill: false
            }, {
                data: pir,
                label: "PIR",
                borderColor: "#12c414",
                fill: false
            }, {
                data: ec_meter,
                label: "EC_meter",
                borderColor: "#4c38c4",
                fill: false
            }, {
                data: light,
                label: "Ánh sáng",
                borderColor: "#c41282",
                fill: false
            }, {
                data: pin,
                label: "Pin",
                borderColor: "#2cbbc4",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Bảng phân tích yếu tố thời tiết trung bình theo từng ngày'
            }
        }
    });
</script>
@endpush


