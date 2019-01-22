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
    var data_day = @json($days_avg["element"]);
    var $data = [];
    $.each(data_day, function( index, value ) {
        $data.push({
            data: value,
            label: index,
            hidden: false,
            fill: false,
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        });
    });

    var ctx = document.getElementById("line-chart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: day,
            datasets: $data
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


