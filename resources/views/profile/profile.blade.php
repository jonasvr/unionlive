@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('alerts.success')
            @include('alerts.error')

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-5 col-md-2">
                            <h2>{{ucwords(Auth::user()->name)}}</h2>
                        </div>
                        <a href="{{ route('newAd') }}">
                        <div class="col-md-offset-3 col-md-2 text-center">
                                <p>new add</p>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        @foreach($ads as $ad)
                            <a href="{{route('showAd',['id'=>$ad->id])}}">
                                <div class="col-md-offset-2 col-md-8 text-center red-border margin-bottom-5">
                                    <p>{{$ad->title}}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="row">
                        <center>{{ $ads->links() }}</center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection