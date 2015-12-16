@extends ('layouts.default')

@section ('body')

	<div class="container">

		<div class="row">

			<div class="col-sm-6 col-sm-offset-3">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h1 class="panel-title">{{ Lang::get('auth.password_reset_request_panel_title') }}</h1>
					</div>

					<div class="panel-body">

						@if (Session::get('max_request_attemps_exceeded'))

							<p>{{ Lang::get('auth.password_reset_request_max_attemps_exceeded') }}</p>						

						@elseif (Session::get('password_reset_email'))

							<p>{{ Lang::get('auth.password_reset_request_email_sent_text') }}</p>

							<p class="text-center"><strong>{{ Session::get('password_reset_email') }}</strong></p>

							<hr>

							<p>{{ Lang::get('auth.password_reset_request_email_sent_hint_text') }}</p>

						@else

							@include ('errors._form_with_error_alert')

							<p>{{ Lang::get('auth.password_reset_request_text') }}</p>

							{!! Form::open(['url' => URL::route('password_reset_request'), 'autocomplete' => 'off']) !!}

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

								<div class="form-group">
									<button class="btn btn-primary" type="submit">{{ Lang::get('auth.password_reset_btn') }}</button>
								</div>

							{!! Form::close() !!}

						@endif

					</div>

				</div>

			</div>

		</div>

	</div>

@endsection