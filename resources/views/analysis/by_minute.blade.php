@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Điều kiện</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <form action="{{route("analysis.byMinute")}}" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating has-default">
                                            <label class="control-label">Ngày</label>
                                            <input type="date" class="form-control" name="date" required value="{{app('request')->input("date")}}">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group label-floating has-success" style="margin-top: -5px">
                                            <label class="control-label">Giờ</label>
                                            <select name="hour" id="" class="form-control" style="margin-top: -20px">
                                                @for($hour = 0; $hour < 24; $hour++)
                                                <option {{app('request')->input("hour") == str_pad($hour, 2, '0', STR_PAD_LEFT) ? "selected" : ""}} value="{{str_pad($hour, 2, '0', STR_PAD_LEFT)}}">{{str_pad($hour, 2, '0', STR_PAD_LEFT)}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary pull-right">Thực hiện</button>
                                    </div>
                                </div>
                                @if(isset($minutes_avg))
                                    @include('analysis.parts.minute')
                                @endif
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection