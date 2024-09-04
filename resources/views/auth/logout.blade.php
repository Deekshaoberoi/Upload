@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Logout Confirmation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p>{{ __('Are you sure you want to logout?') }}</p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Logout') }}
                                </button>

                                <a class="btn btn-link" href="{{ url('/') }}">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
