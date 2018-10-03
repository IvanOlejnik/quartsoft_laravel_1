@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{route('stockman')}}">Вернуться на главную</a>
		<h1>Страница с инструментами</h1>
      
        <hr>
                   @foreach($instruments as $instrument)
						<div class='block'>
                            <span>{!! $instrument->id !!}	&nbsp;</span>
							<span>{!! $instrument->title !!} &nbsp;</span>
							<span>{!! $instrument->user_id !!} &nbsp;</span>
                            <form action="{{ route('instrument.destroy', $instrument->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" id="delete-user-{{ $instrument->id }}" class="btn btn-danger">
									<i class="fa fa-btn fa-trash"></i>Удалить
								</button>
							</form>
							<a href="{{route('instrument.edit', $instrument->id)}}">Редактировать</a>
							<hr>
						</div>
					@endforeach
   </div>
@endsection

