@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    حصص اونلاين
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    امتحانات اونلاين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_exams.create')}}" class="btn btn-success btn-sm" role="button"
                                
                                aria-pressed="true">اضافة امتحان جديد</a>
                                <a class="btn btn-warning" href="{{route('indirect.create')}}">اضافة امتحان اوفلاين جديد</a>
                                <br> <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                        
                                            <th>المعلم</th>
                                            <th>عنوان الامتحان</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الامتحان</th>
                                            <th>رابط الامتحان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_exams as $online_exam)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                          
                                                <td>{{$online_exam->user->name}}</td>
                                                <td>{{$online_exam->topic}}</td>
                                                <td>{{$online_exam->start_at}}</td>
                                                <td>{{$online_exam->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_exam->join_url}}" target="_blank">انضم الان</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_exam->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.online_exams.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
