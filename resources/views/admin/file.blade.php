@extends('layouts.admin')
@section('main')
    <iframe src="{{url('files/dialog.php')}}" style="width:100%;height:500px;overflow:auto; border:none"></iframe>
@stop();
