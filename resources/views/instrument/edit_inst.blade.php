@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редактировть инструмент</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('instrument.update', ['instrument' => $instrument->id]) }}">
                        {{ csrf_field() }}
						{{ method_field('PATCH') }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $instrument->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">user_id</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $instrument->user_id }}">

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Редактировать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
