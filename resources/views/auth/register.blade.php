@extends('layout.master')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select id="gender" class="form-control" name="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="birth_date">{{ __('Birth Date') }}</label>
                            <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea id="address" class="form-control" name="address" required>{{ old('address') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
