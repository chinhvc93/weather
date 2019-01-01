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
    var hour = @json($hours_avg["hour"]);
    var temperature = @json($hours_avg["temperature"]);
    var humidity = @json($hours_avg["humidity"]);
    var ph = @json($hours_avg["ph"]);
    var soil_moisture = @json($hours_avg["soil_moisture"]);
    var pir = @json($hours_avg["pir"]);
    var ec_meter = @json($hours_avg["ec_meter"]);
    var light = @json($hours_avg["light"]);
    var pin = @json($hours_avg["pin"]);

    var ctx = document.getElementById("line-chart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: hour,
            datasets: [{
                data: temperature,
                label: "Nhiệt độ",
                borderColor: "#e30015",
                hidden: false,
                fill: false
            }, {
                data: humidity,
                label: "Độ ẩm",
                borderColor: "#8e5ea2",
                hidden: true,
                fill: false
            }, {
                data: ph,
                label: "Độ PH",
                borderColor: "#da5698",
                hidden: true,
                fill: false
            }, {
                data: soil_moisture,
                label: "Độ ẩm đất",
                borderColor: "#ed5b39",
                hidden: true,
                fill: false
            }, {
                data: pir,
                label: "PIR",
                borderColor: "#12c414",
                hidden: true,
                fill: false
            }, {
                data: ec_meter,
                label: "EC_meter",
                borderColor: "#4c38c4",
                hidden: true,
                fill: false
            }, {
                data: light,
                label: "Ánh sáng",
                borderColor: "#c41282",
                hidden: true,
                fill: false
            }, {
                data: pin,
                label: "Pin",
                borderColor: "#2cbbc4",
                hidden: true,
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Bảng phân tích yếu tố thời tiết trung bình theo từng giờ trong ngày'
            }
        }
    });
</script>
@endpush


