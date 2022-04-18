@extends('layouts.site')
@section('main')
    <div id="content">
        <section id="Slider">
        <div class="aspect-ratio-169">
            @foreach($data as $model)
            <img src="{{url('uploads')}}/{{$model->image}}">
            @endforeach
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        </section>
    </div>
@stop();

