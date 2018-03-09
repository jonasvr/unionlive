@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          {{ Form::open(array('url' => route('createAd'), 'method' => 'POST', "class" => "form-horizontal","files"=>true)) }}
          <section class="panel home" data-section-name="start">
            <div class="inner">
              <div class="vertical-center">
                <h1>Create a campaign</h1>
                <p style="margin-bottom:50px;">
                  In the next few steps you can create your own campagne.<br>
                  At the end you get a proposal based on the given data.<br>
                  You can always go back or change data at any step.<br>
                  Finally you get the possibility to reserve or confirm your campaign.</p>
              </div>
              <p class="cta"><a href="/scrollify#panel1" class="scroll">Start</a></p>
            </div>
            <div class="pricing-information">
              <p>Total ads<br><span id="number-of-ads">0</span></p>
              <p>Price p.a.<br>€ <span id="price-per-ad">0</span></p>
              <p>Total price<br>€ <span id="total-price">0</span></p>
            </div>
          </section>

          <section class="panel panel1" data-section-name="title">
            <div class="inner">
      				<div class="vertical-center">
                <h2 class="title">1. What is the name of your campaign?</h2>
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <!-- <label for="title">Title</label> -->
                    {{ Form::text('title', '', array('id' => 'ad-title','class' => 'form-control','placeholder' => 'Title')) }}
                    @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                    @endif
                </div>
      				</div>
              <p class="start"><a href="/scrollify#panel1" class="scroll">next</a></p>
      			</div>
      		</section>

          <section class="panel panel2" data-section-name="type">
            <div class="inner">
      				<div class="vertical-center">
                <h2>2. What kind of ad would you like</h2>
                <div class="type-options">
                  <div  id="audio" class="type">
                    <h1>Audio</h1>
                    <p>This campaign is pure audio based.</p>
                  </div>

                  <div id="visual" class="type">
                    <h1>Visual</h1>
                    <p>This campaign is pure visual based.</p>
                  </div>
                </div>
                <div id="audiovisual" class="type">
                  <h1>Audio+visual</h1>
                  <p>This campaign is the best of both worlds combined.</p>
                </div>
      				</div>
              <p class="cta"><a href="/scrollify#panel1" class="scroll">next</a></p>
      			</div>
      		</section>

          <section class="panel panel3" data-section-name="duration">
      			<div class="inner">
      				<div class="vertical-center">
      					<h2 class="title">3. Do you have a small or a big message?</h2>
                <div class="duration-options">
                  <div class="row">
                    <div class="col-md-4 duration-option">
                      <h1 id="ten">10''</h1>
                    </div>
                    <div class="col-md-4 duration-option">
                      <h1 id="fifteen">15''</h1>
                      (ppa +10%)
                    </div>
                    <div class="col-md-4 duration-option">
                      <h1 id="twenty">20''</h1>
                      (ppa +25%)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 duration-option">
                      <h1 id="twentyfive">25''</h1>
                      (ppa +35%)
                    </div>
                    <div class="col-md-5 duration-option">
                      <h1 id="thirty">30''</h1>
                      (ppa +50%)
                    </div>
                  </div>
                </div>
      				</div>
              <p class="cta"><a href="/scrollify#panel1" class="scroll">next</a></p>
      			</div>
      		</section>

          <section class="panel panel4" data-section-name="files">
      			<div class="inner">
      				<div class="vertical-center">
      					<h2 class="title">4. Upload your ad content</h2>
                <div id="audio-input" class="form-group col-md-6 {{ $errors->has('audioFile') ? ' has-error' : '' }}">
                    <label for="audioFile">Audio file input</label>
                    {{ Form::file('audioFile') }}
                    <p class="help-block">Only wav files</p>
                    @if ($errors->has('audioFile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('audioFile') }}</strong>
                        </span>
                    @endif
                </div>
                <div id="artwork-input" class="form-group col-md-6 {{ $errors->has('artFile') ? ' has-error' : '' }}">
                    <label for="artFile">Artwork input</label>
                    {{ Form::file('artFile') }}
                    <p class="help-block">Only jpg,png</p>
                    @if ($errors->has('artFile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('artFile') }}</strong>
                        </span>
                    @endif
                </div>
      				</div>
              <p class="cta"><a href="/scrollify#panel1" class="scroll">next</a></p>
      			</div>
      		</section>

          <section class="panel panel5" data-section-name="period">
      			<div class="inner">
      				<div class="vertical-center">
      					<h2 class="title">5. Do you need short term marketing or more longterm?</h2>
                <div class="period-options">
                  <div class="row">
                    <div class="col-md-4 period-option">
                      <h1 id="day">day</h1>
                      (ppa -10%)
                    </div>
                    <div class="col-md-4 period-option">
                      <h1 id="week">week</h1>
                      (ppa -10%)
                    </div>
                    <div class="col-md-4 period-option">
                      <h1 id="month">month</h1>
                      (ppa -10%)
                    </div>
                    <div class="col-md-4 period-option">
                      <h1 id="season">season</h1>
                      (ppa -10%)
                    </div>
                    <div class="col-md-4 period-option">
                      <h1 id="semester">180 days</h1>
                      (ppa -10%)
                    </div>
                    <div class="col-md-4 period-option">
                      <h1 id="year">year</h1>
                      (ppa -10%)
                    </div>
                  </div>
                </div>
      				</div>
              <p class="cta"><a href="/scrollify#panel1" class="scroll">next</a></p>
      			</div>
      		</section>



          <section class="panel panel6" data-section-name="details">
      			<div class="inner">
      				<div class="vertical-center">

                    <div class="col-md-4">
                        <div class="form-group col-md-8">
                          <label for="weeks">weeks</label>
                          <select id="weeks" name="weeks" class="form-control">
                            @for($i = 1; $i<5; $i++)
                                @if($i == 1)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                          </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @foreach($days as $day)
                           <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="days[]" value="{{$day->day}}"> {{$day->day}}
                              </label>
                            </div>

                        @endforeach
                    </div>
                    <div class="col-md-4">
                        @foreach($hours as $hour)
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="hours[]" value="{{$hour->timeSlot}}"> {{$hour->timeSlot}}
                              </label>
                            </div>
                        @endforeach
                    </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
      				</div>
      			</div>

      		</section>

      {{ Form::close()}}
        </div>
    </div>
</div>
@endsection
