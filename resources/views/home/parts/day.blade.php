<div class="row">
    <div class="col-md-8">
       <table class="table table-bordered">
           <thead>
               <th>Ngay</th>
               <th>Nhiet Do</th>
           </thead>
           @foreach($days_avg as $day)
               <tr>
                   <td>{{$day["date"]}} °C</td>
                   <td>{{$day["temperature"]}} °C</td>
               </tr>
           @endforeach
       </table>
    </div>
</div>
