<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriptions - Tunify</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">StreamHive</div>

        <form class="search-bar" action="search_results.php" method="GET">
            <input type="text" name="query" placeholder="Search for songs, artists, or albums" required>
            <button type="submit">Search</button>
        </form>

        <nav>
            <ul class="nav-links">
                <li><a href="{{route('UI')}}">Home</a></li>
                <li><a href="{{route('movies')}}">Movies</a></li>
                <li><a href="{{route('series')}}">Series</a></li>
                <li><a href="{{route('watchlist')}}">Watchlist</a></li>
                <li><a href="{{route('subscription')}}">Subscriptions</a></li>
            </ul>
        </nav>

        <details class="user-menu">
            <summary>
                <img src="{{asset('images/user-icon.png')}}" alt="User" class="user-icon">
                <span class="dropdown-icon">&#x25BC;</span>
            </summary>
            <div class="dropdown">
                <a href="profile.php">Profile</a>
                <form action="/logout" method="POST">
                    @csrf
                    <input type="hidden"> 
                    <button type="submit" class="dropdown-button-item">Logout</button>
                </form>
            </div>
        </details>
    </header>
    
    <main>
        <section id="subscriptions">
            <h1>Choose Your Subscription Plan</h1>             
                <div class="subscription">
                    <div class="s_type">
                        <h2>Individual</h2>
                        <p>Price: <strong>100 TAKA/month</strong></p>
                        <ul>
                            <li>Ad-free Streaming</li>
                            <li>Add to watchlist option</li>
                            <li>Offline download</li>
                        </ul>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="/subscription" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden"  name="status" value="Individual">
                            <button type="submit" class="s_plan">Select Individual Plan</button>
                        </form>
                    </div>
                </div>

                <div class="subscription">
                    <div class="s_type">
                        <h2>Family</h2>
                        <p>Price: <strong>250 TAKA/month</strong></p>
                        <ul>
                            <li>Ad-free Streaming</li>
                            <li>Add to watchlist option</li>
                            <li>Offline download</li>
                            <li>Family sharing</li>
                        </ul>
                        <form action="/subscription" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Family">
                            <button type="submit" class="s_plan">Select Family Plan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer style="text-align: center; padding: 20px; background-color: #1a1a1a; color: white;margin-top: 20px;bottom:0; width: 100%;">
        <p>StreamHive &copy; 2024</p>
        <p>&copy; 2024 StreamHive. All rights reserved.</p>
    </footer>
</body>
</html>