@extends('stockman')

@section('content')
   <div class="container">
        <a href="{{route('wel')}}">Вернуться на главную</a>
		<h1>Страна с мастерами цеха</h1>
        <hr>
	   @foreach($users as $user)
			<div class='block'>
				<span>{!! $user->name !!} &nbsp;</span>
				<span>{!! $user->email !!} &nbsp;</span>
				<span>{!! $user->work !!} &nbsp;</span>
				<form action="{{ route('users.destroy', $user->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
						<i class="fa fa-btn fa-trash"></i>Удалить
					</button>
				</form>
				<hr>
			</div>
		@endforeach
   </div>
@endsection

