<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js"></script>
    <script>
        $(function(){
            $("#visible1").click(function() {
                $("#invisible1").toggleClass("show");
            });

            $("#visible2").click(function() {
                $("#invisible2").toggleClass("show");
            });
        });
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .hide {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.5s ease, max-height 0.5s ease;
        }
        .show {
            opacity: 1;
            max-height: 200px;
            transition: opacity 0.5s ease, max-height 0.5s ease;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">StreamHive</div>

        <form class="search-bar" action="{{route('search')}}" method="GET">
            <input type="text" name="search" value="" placeholder="Search for songs, artists, or albums" required>
            <button type="submit">Search</button>
        </form>

        <nav>
            <ul class="nav-links">
                <li><a href="{{route('UI')}}">Home</a></li>
                <li><a href="{{route('movies')}}">Movies</a></li>
                <li><a href="{{route('series')}}">Series</a></li>
                <li><a href="{{route('watchlist')}}">Watchlist</a></li>
                <li><a href="{{route('subscription')}}">Subscriptions</a></li>
                <li><a href="{{route('feedback')}}">Feedback</a></li>  <!-- Feedback Button sha -->
            </ul>
        </nav>

        <details class="user-menu">
            <summary>
                <img src="{{asset('images/user-icon.png')}}" alt="User" class="user-icon">
                <span class="dropdown-icon">&#x25BC;</span>
            </summary>
            <div class="dropdown">
                <form action="/profile" method="GET">
                    @csrf
                    <input type="hidden"> 
                    <button type="submit" class="dropdown-button-item">Profile</button>
                </form>
                <form action="/logout" method="POST">
                    @csrf
                    <input type="hidden"> 
                    <button type="submit" class="dropdown-button-item">Logout</button>
                </form>
            </div>
        </details>
    </header>
<body>
    <main style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #1a1a1a;">
        <div class="container" style="width: 100%; max-width: 500px; background-color: #2a2a2a; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
            <form class="feedback-form" action="/store" method="POST">
                @csrf
                <h1 style="text-align: center; color: #fff;">Rate Our Website</h1>
    
                @if(session('success'))
                    <div class="alert alert-success" style="text-align: center; color: #4caf50; margin-bottom: 1rem;">{{ session('success') }}</div>
                @endif
    
                <!-- Display the average rating -->
                @if(isset($averageRating))
                    <div class="average-rating" style="text-align: center; margin-bottom: 1rem;">
                        <p style="font-size: 1.2rem; color: #fff;">Website Rating: <strong>{{ number_format($averageRating, 1) }}</strong> / 5</p>
                    </div>
                @endif
    
                <label for="rating" class="form-label" style="color: #fff;">Rating (out of 5)</label>
                <select name="rating" id="rating" class="form-control" required style="width: 100%; padding: 0.75rem; margin-bottom: 1rem; border: 1px solid #444; border-radius: 4px; background-color: #333; color: #fff;">
                    <option value="">Select a rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
    
                <label for="comments" class="form-label" style="color: #fff;">Feedback</label>
                <textarea name="comments" id="comments" class="form-control" rows="4" placeholder="Write your feedback here..." style="width: 100%; padding: 0.75rem; margin-bottom: 1rem; border: 1px solid #444; border-radius: 4px; background-color: #333; color: #fff;"></textarea>
    
                <button type="submit" class="btn-primary" style="width: 100%; padding: 0.75rem; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Submit Feedback</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 StreamHive. All rights reserved.</p>
    </footer>
</body>
</html>