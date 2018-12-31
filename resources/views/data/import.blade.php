@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nhập dữ liệu thời tiết</h4>
                            <p class="card-category">Hoàn thành mẫu đăng ký</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route("data.actionImport")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Chọn file excel</label>
                                        </div>
                                        <input id="file" name="file" type="file"  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Nhập dữ liệu</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection