<x-guest-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #0f2027; /* fallback */
            background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
            height: 100vh;
            overflow: hidden;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
            top: 0;
            left: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 2rem;
            width: 350px;
            box-shadow: 0px 8px 30px rgba(0,0,0,0.3);
            color: white;
            animation: fadeIn 1s ease-in-out;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .login-box input {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: white;
        }

        .login-box input:focus {
            background: rgba(255, 255, 255, 0.25);
            outline: none;
            box-shadow: 0 0 5px #00ffcc;
        }

        .login-box button {
            width: 100%;
            background: linear-gradient(to right, #00ffcc, #0099ff);
            border: none;
            padding: 0.7rem;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .login-box button:hover {
            background: linear-gradient(to right, #0099ff, #00ffcc);
            transform: scale(1.05);
        }

        .login-box a {
            color: #00ffcc;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>


    <div id="particles-js"></div>

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Remember -->
                <div class="mb-3 flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me" class="ms-2">{{ __('Remember me') }}</label>
                </div>

                <!-- Forgot -->
                <div class="mb-3 text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    @endif
                </div>

                <!-- Button -->
                <div>
                    <button type="submit">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80, "density": { "enable": true, "value_area": 800 } },
                "color": { "value": "#00ffcc" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.5 },
                "size": { "value": 3, "random": true },
                "line_linked": { "enable": true, "distance": 150, "color": "#00ffcc", "opacity": 0.4, "width": 1 },
                "move": { "enable": true, "speed": 4 }
            }
        });
    </script>
</x-guest-layout>
