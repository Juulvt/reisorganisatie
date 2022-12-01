@include('layouts.head')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
                </div>
                <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px">
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </div>

                    <div class="text-sm">
                    @if (Route::has('password.request'))
                    <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                    </div>
                </div>

                <div>
                    <x-button class="ml-3">
                    {{ __('Log in') }}
                    </x-button>
                </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
