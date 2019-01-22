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
                            <form action="{{route("analysis.byHour")}}" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="control-label">Chọn Node</label>
                                        @foreach($nodes as $node)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input {{ in_array($node->node, Request::get('nodes') ?? []) ? "checked" : ""}} name="nodes[]" class="form-check-input" type="checkbox" value="{{$node->node}}">
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                    </span>
                                                    {{$node->node}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating has-default">
                                            <label class="control-label">Yếu tố</label>
                                            <select name="element" id="" class="form-control">
                                                <option {{ Request::get('element') == "temperature" ? "selected" : ""}} value="temperature">Nhiệt độ</option>
                                                <option {{ Request::get('element') == "humidity" ? "selected" : ""}} value="humidity">Độ ẩm</option>
                                                <option {{ Request::get('element') == "ph" ? "selected" : ""}} value="ph">pH</option>
                                                <option {{ Request::get('element') == "soil_moisture" ? "selected" : ""}} value="soil_moisture">DA_dat</option>
                                                <option {{ Request::get('element') == "pir" ? "selected" : ""}} value="pir">PIR</option>
                                                <option {{ Request::get('element') == "ec_meter" ? "selected" : ""}} value="ec_meter">EC_meter</option>
                                                <option {{ Request::get('element') == "light" ? "selected" : ""}} value="light">anhsang</option>
                                                <option {{ Request::get('element') == "pin" ? "selected" : ""}} value="pin">Pin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating has-default">
                                            <label class="control-label">Ngày</label>
                                            <input type="date" class="form-control" name="date" required value="{{app('request')->input("date")}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary pull-right">Thực hiện</button>
                                    </div>
                                </div>
                                @if(isset($hours_avg))
                                    @include('analysis.parts.hour')
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