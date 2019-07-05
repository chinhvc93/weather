<div class="row">
    <div class="col-md-6">
       <table class="table table-bordered">
           <thead>
               <th style="font-weight: bold">Ngày</th>
               <th style="font-weight: bold">Nhiệt độ</th>
           </thead>
           @foreach($days_avg as $day)
               <tr>
                   <td>{{$day["date"]}}</td>
                   <td>{{$day["temperature"] ? $day["temperature"] . " °C" : "NA"}}</td>
               </tr>
           @endforeach
       </table>
    </div>
    <div class="col-md-6">
        <div class="card card-chart">
            <div class="card-header card-header-danger">
                <div class="ct-chart" id="days-chart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Completed Tasks</h4>
                <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
            </div>
        </div>
    </div>
</div>

@push("scripts")
    <script>
        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

        var data = {
            labels: ['1', '2', '3', '4', '5', '6'],
            series: [
                {
                    data: [1, 2, 3, 5, 8, 13]
                }
            ]
        };

        var options = {
            axisX: {
                labelInterpolationFnc: function(value) {
                    return 'Calendar Week ' + value;
                }
            }
        };

        var responsiveOptions = [
            ['screen and (min-width: 641px) and (max-width: 1024px)', {
                showPoint: false,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return 'Week ' + value;
                    }
                }
            }],
            ['screen and (max-width: 640px)', {
                showLine: false,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return 'W' + value;
                    }
                }
            }]
        ];

        /* Initialize the chart with the above settings */
        new Chartist.Line('#days-chart', data, options, responsiveOptions);
    </script>
@endpush


