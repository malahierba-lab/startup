@extends ('layouts.default')

@section ('body')

	<div class="container">

		<div class="row">

			<div class="col-sm-6 col-sm-offset-3">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h1 class="panel-title">{{ Lang::get('auth.password_reset_panel_title') }}</h1>
					</div>

					<div class="panel-body">

						<h3>{{ Lang::get('auth.password_reset_invalid_token_body_title') }}</h3>

						<p>
							{{ Lang::get('auth.password_reset_token_invalid_text') }}
						</p>

						<p>
							<a href="{{ URL::route('password_reset_request') }}" class="btn btn-primary">{{ Lang::get('auth.reset_password_call_to_action_alternative') }}</a>
						</p>

					</div>

				</div>

			</div>

		</div>

	</div>

@endsection