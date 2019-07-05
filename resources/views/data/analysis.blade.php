@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Lọc dữ liệu</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <form action="{{route("home.actionAnalysis")}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Chế độ xem</label>
                                            <select class="form-control" name="type" id="">
                                                <option value="day">Ngày</option>
                                                <option value="hour">Giờ</option>
                                                <option value="minute">Phút</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Từ</label>
                                            <input type="date" class="form-control" name="start_date" min="2018-10-06"  min="2018-10-16" value="10/06/2018">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Đến</label>
                                            <input type="date" class="form-control" name="end_date" value="10/16/2018">
                                        </div>
                                    </div>
                                </div>

                                @if(isset($days_avg))
                                    @include('home.parts.day')
                                @endif

                                <button type="submit" class="btn btn-primary pull-right">Thực hiện</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection