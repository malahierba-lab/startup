@extends ('layouts.default')

@section ('body')

	<div class="container">

		<div class="row">

			<div class="col-sm-6 col-sm-offset-3">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h1 class="panel-title">{{ Lang::get('auth.login_panel_title') }}</h1>
					</div>

					<div class="panel-body">

						@if (Session::get('max_request_attemps_exceeded'))

							<p>{{ Lang::get('auth.login_max_attemps_exceeded') }}</p>

						@else

							@include ('errors._form_with_error_alert')

							{!! Form::open(['url' => URL::route('login'), 'autocomplete' => 'off']) !!}

								<!-- email -->
								<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

									<label class="control-label" for="email">{{ Lang::get('auth.email_label') }}</label>

									{!! Form::text('email', null, [
										'class' 		=> 'form-control',
										'placeholder'	=> Lang::get('auth.email_placeholder'),
										'maxlength'		=> Config::get('user.email_max_length'),
									]) !!}

									@if ($errors->has('email'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('email') }}</p>
									@endif
									

								</div>
								<!-- /email -->

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

								<!-- remember_me -->
								<div class="checkbox {{ $errors->has('remember_me') ? 'has-error' : '' }}">

									<label>

										{!! Form::checkbox('remember_me', 'true') !!}
										{{ Lang::get('auth.remember_me_text') }}

									</label>

									@if ($errors->has('remember_me'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('remember_me') }}</p>
									@endif
									

								</div>
								<!-- /remember_me -->

								<div class="form-group">
									<button class="btn btn-primary" type="submit">{{ Lang::get('auth.login_btn') }}</button>
									<a class="btn btn-link" href="{{ URL::route('password_reset_request') }}">{{ Lang::get('auth.reset_password_call_to_action') }}</a>
								</div>

							{!! Form::close() !!}

						@endif

					</div>

					<div class="panel-footer">
						<a href="{{ URL::route('signup') }}" class="btn btn-link btn-block">{{ Lang::get('auth.signup_call_to_action') }}</a>
					</div>

				</div>

			</div>

		</div>

	</div>

@endsection