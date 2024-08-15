<x-layout>

    <h1 class="title">Login</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
            @csrf
            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="input">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="input">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <input type="checkbox" name="remember" id="">
                <label for="remember">Remember password</label>
            </div>
            @error('failed')
            <p class="error">{{ $message }}</p>
            @enderror
            <button class="primary-btn bg-emerald-800 hover:bg-emerald-900">Login</button>
        </form>
    </div>
</x-layout>
