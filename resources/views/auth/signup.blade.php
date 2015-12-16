@extends ('layouts.default')

@section ('body')

	<div class="container">

		<div class="row">

			<div class="col-sm-6 col-sm-offset-3">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h1 class="panel-title">{{ Lang::get('auth.signup_panel_title') }}</h1>
					</div>

					<div class="panel-body">

						@include ('errors._form_with_error_alert')

						{!! Form::open(['url' => URL::route('signup'), 'autocomplete' => 'off']) !!}

							<!-- name -->
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

								<label class="control-label" for="name">{{ Lang::get('auth.name_label') }}</label>

								{!! Form::text('name', null, [
									'class' 		=> 'form-control',
									'placeholder'	=> Lang::get('auth.name_placeholder'),
									'maxlength'		=> Config::get('user.name_max_length'),
								]) !!}

								@if ($errors->has('name'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('name') }}</p>
								@endif
								

							</div>
							<!-- /name -->

							<!-- username -->
							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">

								<label class="control-label" for="username">{{ Lang::get('auth.username_label') }}</label>

								{!! Form::text('username', null, [
									'class' 		=> 'form-control',
									'placeholder'	=> Lang::get('auth.username_placeholder'),
									'maxlength'		=> Config::get('user.username_max_length'),
								]) !!}

								@if ($errors->has('username'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('username') }}</p>
								@endif
								

							</div>
							<!-- /username -->

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

							<!-- accept_disclaimer -->
							<div class="checkbox {{ $errors->has('accept_disclaimer') ? 'has-error' : '' }}">

								<label>

									{!! Form::checkbox('accept_disclaimer', 'accepted') !!}
									{!! Lang::get('auth.accept_disclaimer_text', [
										'tos_url' 		=> URL::route('frontpage'),
										'privacy_url'	=> URL::route('frontpage'),
										'app_name'		=> $app_name,
									]) !!}

								</label>

								@if ($errors->has('accept_disclaimer'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->first('accept_disclaimer') }}</p>
								@endif
								

							</div>
							<!-- /accept_disclaimer -->

							<div class="form-group">
								<button class="btn btn-primary" type="submit">{{ Lang::get('auth.signup_btn') }}</button>
							</div>

						{!! Form::close() !!}

					</div>

					<div class="panel-footer">
						<a href="{{ URL::route('login') }}" class="btn btn-link btn-block">{{ Lang::get('auth.login_call_to_action') }}</a>
					</div>

				</div>

			</div>

		</div>

	</div>

@endsection