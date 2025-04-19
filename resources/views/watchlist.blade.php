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
                <li><a href="http://localhost/tunify/songs.php">Movies</a></li>
                <li><a href="http://localhost/tunify/album.php">Series</a></li>
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
            <div class="subscription-container">
                
                <div class="subscription">
                    <h2>Free</h2>
                    <p>Price: <strong>0 TAKA</strong></p>
                    <ul>
                        <li>Access to basic features</li>
                        <li>Ads included</li>
                        <li>Limited skips</li>
                    </ul>
                    <form method="post" action="update_subscription.php">
                        <button type="submit" name="plan" value="free">Select Free Plan</button>
                    </form>
                </div>

               
                <div class="subscription">
                    <h2>Individual</h2>
                    <p>Price: <strong>100 TAKA/month</strong></p>
                    <ul>
                        <li>Ad-free music</li>
                        <li>Unlimited skips</li>
                        <li>Offline listening</li>
                    </ul>
                    <form method="post" action="update_subscription.php">
                        <button type="submit" name="plan" value="individual">Select Individual Plan</button>
                    </form>
                </div>

                
                <div class="subscription">
                    <h2>Family</h2>
                    <p>Price: <strong>250 TAKA/month</strong></p>
                    <ul>
                        <li>Ad-free music</li>
                        <li>Unlimited skips</li>
                        <li>Offline listening</li>
                        <li>For up to 6 accounts</li>
                    </ul>
                    <form method="post" action="update_subscription.php">
                        <button type="submit" name="plan" value="family">Select Family Plan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
