<x-layout>

    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="post">
            @csrf
            {{-- Username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="" class="input" value="{{ old('username') }}">
                @error('username')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="input" value="{{ old('email') }}">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="input">

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="" class="input">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button class="primary-btn">Register</button>
        </form>
    </div>
</x-layout>
