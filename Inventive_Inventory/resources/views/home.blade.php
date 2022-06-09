@extends('layout/home_layout')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{$user = Auth::user()->FirstName}}
                    {{$user = Auth::user()->LastName;}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
