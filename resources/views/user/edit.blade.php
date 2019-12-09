@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edir Users</div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Items">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Items">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="role_id" id="m_select2_bookings">
                                    @foreach ($roles ?:[] as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected':'' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Is Active:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="is_active">
                                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Not Active</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                {{ csrf_field() }}
                                @component('shared.block.btn_submit_update') @endcomponent
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
