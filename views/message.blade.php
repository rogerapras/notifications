<?php
	$errors = Session::get('errors', new Illuminate\Support\MessageBag);
?>
@if (Session::has('notifications.message'))
    @if (Session::has('notifications.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('notifications.title'), 'body' => Session::get('notifications.message')])
    @else
        <div class="alert alert-{{ Session::get('notifications.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('notifications.message') }}

			@if ($errors->has())
				@foreach($errors->all('<p>:message</p>') as $error)
					{{ $error }}
				@endforeach
			@endif

        </div>
    @endif
@endif


