@extends ('layouts.email')

@section ('content')

	<p>
		{{ Lang::get('auth.password_reset_request_email_text') }}
	</p>

	<p>
		<a href="{{ $link }}">{{ $link }}</a>
	</p>

	<p>
		{{ Lang::get('auth.password_reset_request_email_no_request_text') }}
	</p>

@endsection