@extends('layouts.admin')
@section('acc')
    <?php
        $name = Session::get('name');
        if ($name) {
            echo $name;
        }
    ?>
@stop();
@section('main')
	<div class="jumbotron">
		<div class="container">
			<h1>Hello World</h1>
		</div>
	</div>
@stop();
