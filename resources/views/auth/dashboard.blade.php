@extends('layout.master')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Gender') }}</th>
                            <td>{{ ucfirst($user->gender) }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Age') }}</th>
                            <td>{{ $user->age }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Birth Date') }}</th>
                            <td>{{ $user->birth_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Address') }}</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </table>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">{{ __('Logout') }}</button>
                    </form>

                    <a href="{{ route('export') }}" class="btn btn-success mt-3 ml-3">{{ __('Export Data') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
