@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Кабинет Кладовщика</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 <div class="masters">
				 <a href="{{ route('user.create') }}">Создать мастера</a>
				 <a href="{{ route('user.index') }}">Вывести список мастеров</a>
				  <a href="{{ route('instrument.create') }}">Создать инструмент</a>
				 <a href="{{ route('instrument.index') }}">Вывести инструменты</a>
					@yield('content')
				 </div>  
                 <div class="instruments">
					
				 </div>  
            </div>
        </div>
    </div>
</div>
@endsection
