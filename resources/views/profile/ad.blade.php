@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-5 col-md-2">
                            <h2>{{$title}}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            {{ Html::image($path_art,'art work',['class' => 'img-responsive']) }}                            
                        </div>
                        <div class="col-md-6">
                            <audio controls>
                              <source src={{$path_audio}} type="audio/wav">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
