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
                            <form action="{{route("analysis.byDay")}}" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating has-default">
                                            <label class="control-label">Từ</label>
                                            <input type="date" class="form-control" name="start_date" required value="{{app('request')->input("start_date")}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating has-default">
                                            <label class="control-label">Đến</label>
                                            <input type="date" class="form-control" name="end_date" required value="{{app('request')->input("end_date")}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary pull-right">Thực hiện</button>
                                    </div>
                                </div>
                                @if(isset($days_avg))
                                    @include('analysis.parts.day')
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