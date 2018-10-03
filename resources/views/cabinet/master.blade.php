@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Страница Мастера</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 <div class="masters">
					<a href="{{ route('master.view') }}">Инструмены на складе</a>
					<a href="{{ route('master.order') }}">Заказанные инструменты</a>
					@yield('content')
				 </div>  
					@yield('content')
				 </div>  
                 <div class="instruments">
					
				 </div>  
            </div>
        </div>
    </div>
</div>
@endsection
