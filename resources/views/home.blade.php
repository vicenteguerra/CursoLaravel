@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">:)</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="container timeline">
           <div class="text-content">
             <div class="span7 offset1">
                @if(Session::has('success'))
                  <div class="alert-box success">
                  <h2>{!! Session::get('success') !!}</h2>
                  </div>
                @endif
                <div class="secure">Upload form</div>
                {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}
                 <div class="control-group">
                  <div class="controls">
                  {!! Form::file('imagen') !!}
            <p class="errors">{!!$errors->first('imagen')!!}</p>
            @if(Session::has('error'))
            <p class="errors">{!! Session::get('error') !!}</p>
            @endif
                </div>
                </div>
                <div id="success"> </div>
              {!! Form::submit('Submit', array('class'=>'upload')) !!}
              {!! Form::close() !!}
              </div>
           </div>
        </div>
    </div>
</div>
@endsection
