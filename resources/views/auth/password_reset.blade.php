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

						@include ('errors._form_with_error_alert')

						<p>{{ Lang::get('auth.password_reset_text') }}</p>

						{!! Form::open(['url' => URL::route('password_reset', [
							'user_email' 			=> urlencode($user_email),
							'password_reset_token'	=> $password_reset_token,
						]), 'autocomplete' => 'off']) !!}

							<!-- password -->
							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

								<label class="control-label" for="password">{{ Lang::get('auth.password_label') }}</label>

								{!! Form::password('password', [
									'class' 		=> 'form-control',
									'placeholder'	=> Lang::get('auth.password_placeholder'),
									'maxlength'		=> Config::get('user.password_max_length'),
								]) !!}

								@if ($errors->has('password'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('password') }}</p>
								@endif
								

							</div>
							<!-- /password -->

							<!-- password_confirmation -->
							<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">

								<label class="control-label" for="password_confirmation">{{ Lang::get('auth.password_confirmation_label') }}</label>

								{!! Form::password('password_confirmation', [
									'class' 		=> 'form-control',
									'placeholder'	=> Lang::get('auth.password_confirmation_placeholder'),
									'maxlength'		=> Config::get('user.password_max_length'),
								]) !!}

								@if ($errors->has('password_confirmation'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('password_confirmation') }}</p>
								@endif
								

							</div>
							<!-- /password_confirmation -->

							<div class="form-group">
								<button class="btn btn-primary" type="submit">{{ Lang::get('auth.password_reset_btn') }}</button>
							</div>

						{!! Form::close() !!}

					</div>

				</div>

			</div>

		</div>

	</div>

@endsection