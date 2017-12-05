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
                            <h2>new ad</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            {{ Form::open(array('url' => route('createAd'), 'method' => 'POST', "class" => "form-horizontal","files"=>true)) }}

                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title</label>
                                    {{ Form::text('title', '', array('class' => 'form-control','placeholder' => 'Title')) }}
                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('audioFile') ? ' has-error' : '' }}">
                                    <label for="audioFile">Aduio file input</label>
                                    {{ Form::file('audioFile') }}
                                    <p class="help-block">Only wav files</p>
                                    @if ($errors->has('audioFile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('audioFile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('artFile') ? ' has-error' : '' }}">
                                    <label for="artFile">Artwork input</label>
                                    {{ Form::file('artFile') }}
                                    <p class="help-block">Only jpg,png</p>
                                    @if ($errors->has('artFile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('artFile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                            {{ Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
