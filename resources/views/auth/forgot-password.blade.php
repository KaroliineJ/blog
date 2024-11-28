@extends('partials.layout') 

@section('content')
<div class="hero min-h-screen bg-gray-100"> 
    <div class="hero-content flex justify-center">
        <div class="card w-full max-w-md shadow-xl bg-white text-gray-800"> 
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center mb-4">{{ __('Forgot Password') }}</h1>
                <p class="text-center text-sm text-gray-600 mb-6">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
                <x-auth-session-status class="alert alert-success mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-control mb-4">
                        <label for="email" class="label">
                            <span class="label-text text-gray-700">{{ __('Email Address') }}</span>
                        </label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                               class="input input-bordered w-full bg-gray-50 text-gray-800 placeholder-gray-400" 
                               placeholder="Enter your email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-error" />
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="link link-primary text-sm">
                        {{ __('Already have an account? Login here') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
