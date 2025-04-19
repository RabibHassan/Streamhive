<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunify - Music Streaming Site</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
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
                <li><a href="ui.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="series.php">Series</a></li>
                <li><a href="watchlist.php">Watchlist</a></li>
                <li><a href="subscription.html">Subscriptions</a></li>
            </ul>
        </nav>

        <details class="user-menu">
            <summary>
                <img src="user-icon.png" alt="User" class="user-icon">
                <span class="dropdown-icon">&#x25BC;</span>
            </summary>
            <div class="dropdown">
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </details>
    </header>

    <section id="hero">
        <div class="hero-content">
            <h1>Discover Your Watchlist</h1>
            <p>Stream your favorite movies and explore new series.</p>
            <a href="songs.php" class="btn">Start Watching</a>
        </div>
    </section>

<?php /**PATH C:\Users\RABIB\Desktop\StreamHive\resources\views/UI.blade.php ENDPATH**/ ?>