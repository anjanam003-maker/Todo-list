<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ config('app.name', 'ToDo') }}</title>

        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">

        <style>
            body, html {
                margin: 0;
                padding: 0;
            }

            h1 {
                font-family: 'Cormorant Garamond', serif;
                font-size: 82px;
                font-weight: 600;
                letter-spacing: 1.5px;
                line-height: 1.2;
                color: #ffffff;
                text-shadow: 0 4px 12px rgba(0,0,0,0.15);
                margin: 0 0 10px;
            }

            .top-section {
                position: relative;
                background: #e36d9b;
                height: 70vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-align: center;
                z-index: 2;
            }

            .content {
                position: relative;
                z-index: 3;
                padding: 0 18px;
            }

            .divider {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                overflow: hidden;
                line-height: 0;
                z-index: 1;
            }

            .divider svg {
                position: relative;
                display: block;
                width: calc(100% + 1.3px);
                height: 150px;
            }

            .divider .shape-fill {
                fill: #FFFFFF;
            }

            .bottom-section {
                background: #FFFFFF;
                height: 40vh;
                z-index: 0;
            }

            .actions {
                display: flex;
                gap: 12px;
                justify-content: center;
                align-items: center;
                margin-top: 18px;
                flex-wrap: wrap;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #e36d9b;
                border: 2px solid rgba(255, 255, 255, 0.35);
                border-radius: 10px;
                color: #FFFFFF;
                text-decoration: none;
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                transition: transform 0.15s ease, opacity 0.15s ease;
                cursor: pointer;
            }

            .btn.secondary {
                background: rgba(255, 255, 255, 0.15);
            }

            .btn:hover {
                transform: translateY(-1px);
                opacity: 0.95;
            }

            .top-links {
                position: absolute;
                top: 18px;
                right: 18px;
                z-index: 5;
                display: flex;
                gap: 10px;
            }

            .top-links a {
                color: #fff;
                text-decoration: none;
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                font-size: 14px;
                opacity: 0.9;
            }

            .top-links a:hover { opacity: 1; }
        </style>
    </head>
    <body>
        @if (Route::has('login'))
            <div class="top-links">
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Sign up</a>
                    @endif
                @endauth
            </div>
        @endif

        <section class="top-section">
            <div class="content">
                <h1>My List</h1>
                <p>Make your day done.</p>

                <div class="actions">
                    @auth
                        <a class="btn" href="{{ route('dashboard') }}">Go to My ToDo</a>
                    @else
                        @if (Route::has('register'))
                            <a class="btn" id="getStarted" href="{{ route('register') }}">Get Started</a>
                        @endif
                        <a class="btn secondary" href="{{ route('login') }}">Log in</a>
                    @endauth
                </div>
            </div>

            <div class="divider">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C0,0,10.68,1.65,31.38,4.31,162,21.07,243.4,70.88,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <section class="bottom-section"></section>

        <script>
            const link = document.getElementById('getStarted');
            if (link) {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    document.body.style.opacity = '0';
                    document.body.style.transition = '0.4s';
                    setTimeout(() => window.location.href = link.href, 350);
                });
            }
        </script>
    </body>
</html>

