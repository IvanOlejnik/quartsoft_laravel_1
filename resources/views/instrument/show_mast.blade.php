@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{route('master.index')}}">Вернуться на главную</a>
		<h1>Инструменты на складе</h1>
        <hr>
		   @foreach($instruments as $instrument)
				<div class='block'>
					<span>{!! $instrument->id !!}	&nbsp;</span>
					<span>{!! $instrument->title !!} &nbsp;</span>
					<!--<a href="{{route('master.edit', $instrument->id)}}">Заказать</a>-->
					 <form class="form-horizontal" method="POST" action="{{ route('master.update', ['master' => $instrument->id]) }}">
                        {{ csrf_field() }}
						{{ method_field('PATCH') }}
                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
						<button type="submit" id="master-update" class="btn btn-danger">
							<i class="fa fa-btn fa-trash"></i>Заказать
						</button>
					 </form>
					<hr>
				</div>
			@endforeach
   </div>
@endsection

