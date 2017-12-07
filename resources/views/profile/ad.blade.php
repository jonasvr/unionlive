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
                        <div class="col-md-offset-3 col-md-6">
                            <div class="col-md-12">
                                {{ Html::image($path_art,'art work',['class' => 'img-responsive']) }} 
                            </div>                           
                            <div class="col-md-12 text-center">
                                <audio controls>
                                  <source src={{$path_audio}} type="audio/wav">
                                </audio>
                            </div>
                            <div class="col-md-12">
                                <pre>
                                {{var_dump($order)}}
                                </pre>
                            </div>
                            <div class="col-md-12">
                                <pre>
                                {{var_dump($shedule)}}
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
