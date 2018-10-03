@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{route('master.index')}}">Вернуться на главную</a>
		<h1>Заказанные инструмменты</h1>
        <hr>
		   @foreach($instruments as $instrument)
				<div class='block'>
					<span>{!! $instrument->id !!}	&nbsp;</span>
					<span>{!! $instrument->title !!} &nbsp;</span>
					<!--<a href="{{route('master.edit', $instrument->id)}}">Заказать</a>-->
					  <form class="form-horizontal" method="POST" action="{{ route('master.refuse', ['master' => $instrument->id]) }}">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}
                       <!-- <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}"> -->
						<button type="submit" id="master-refuse" class="btn btn-danger">
							<i class="fa fa-btn fa-trash"></i>Отменить
						</button>
					 </form>
					<hr>
				</div>
			@endforeach
   </div>
@endsection

