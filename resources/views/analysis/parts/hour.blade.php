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
    var data_hour = @json($hours_avg["element"]);
    var $data = [];
    $.each(data_hour, function( index, value ) {
        $ramdomColor = getRandomColor();
        $data.push({
            data: value,
            label: index,
            hidden: false,
            fill: false,
            pointRadius: 5,
            pointHoverRadius: 8,
            backgroundColor: $ramdomColor,
            borderColor: $ramdomColor
        });
    });

    var ctx = document.getElementById("line-chart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: hour,
            datasets: $data
        },
        options: {
            title: {
                display: true,
                text: 'Bảng phân tích yếu tố thời tiết trung bình theo từng giờ trong ngày'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }
        }
    });

    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
@endpush


