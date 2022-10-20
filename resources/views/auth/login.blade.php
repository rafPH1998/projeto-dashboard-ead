<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>

        <a
            href="{{route('register')}}"
            type="button"
            class="mt-4 inline-flex items-center px-4 
            py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white 
            uppercase tracking-widest hover:bg-gray-700 
            active:bg-gray-900 focus:outline-none focus:border-gray-900 
            focus:ring ring-gray-300 disabled:opacity-25 transition 
            ease-in-out duration-150"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light">
            <p class="ml-2">Cadastrar</p>
        </a><br/>

        <a href="{{ route('auth.social.redirect', ['driver' => 'google'])  }}" class="mt-4 inline-flex items-center px-4 
            py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white 
            uppercase tracking-widest hover:bg-gray-700 
            active:bg-gray-900 focus:outline-none focus:border-gray-900 
            focus:ring ring-gray-300 disabled:opacity-25 transition 
            ease-in-out duration-150">
            <img src="/images/google.svg" alt="" style="width: 18px;">
            <p class="ml-2">Login com o google</p>
        </a><br/>

        <a href="{{ route('auth.social.redirect', ['driver' => 'github'])  }}" class="mt-2 inline-flex items-center px-4 
            py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white 
            uppercase tracking-widest hover:bg-gray-700 
            active:bg-gray-900 focus:outline-none focus:border-gray-900 
            focus:ring ring-gray-300 disabled:opacity-25 transition 
            ease-in-out duration-150">
            <img src="/images/github.svg" alt="" style="width: 18px;">
            <p class="ml-2">Login com o github</p>
        </a>

    </x-auth-card>
</x-guest-layout>
