@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{route('stockman')}}">Вернуться на главную</a>
		<h1>Страница с юзерами</h1>
      
        <hr>
                   @foreach($users as $user)
						<div class='block'>
                            <span>{!! $user->id !!}	&nbsp;</span>
							<span>{!! $user->name !!} &nbsp;</span>
							<span>{!! $user->email !!} &nbsp;</span>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
									<i class="fa fa-btn fa-trash"></i>Удалить
								</button>
							</form>
							<a href="{{route('user.edit', $user->id)}}">Редактирование</a>
							<hr>
						</div>
					@endforeach
   </div>
@endsection

