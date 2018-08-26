@extends('layouts.appFLAT')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Create your mini site</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('site.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">
                            <label for="business_name" class="col-md-4 control-label">Name of Business</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name') }}" required autofocus>

                                @if ($errors->has('business_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('business_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Business E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : Auth::guard('vendor')->user()->email }}" required>
								@if(!old('email'))
									<p class="help-block">Your email is prefilled as your business email, If your business email is different from {{ Auth::guard('vendor')->user()->email }} , then change it</p>
								@endif
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alt_phone') ? ' has-error' : '' }}">
                            <label for="alt_phone" class="col-md-4 control-label">Alternative Phone</label>

                            <div class="col-md-6">
                                <input id="alt_phone" type="tel" class="form-control" name="alt_phone" value="{{ old('alt_phone') }}" required>

                                @if ($errors->has('alt_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alt_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required autofocus>
								<p class="help-block">Choose a prefered slug, this is to customize the permalink of your mini site i.e {{config('app.url').'/slug'}} for easy access</p>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Mini Site
                                </button>
                            </div>
                        </div>
						
						</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

