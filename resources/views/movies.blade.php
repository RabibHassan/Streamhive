<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHive</title>
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">StreamHive</div>

        <form class="search-bar" action="search_results.php" method="GET">
            <input type="text" name="query" placeholder="Search for movies, series, or albums" required>
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
                    <button type="submit" class="dropdown-button-item">Logout</button>
                </form>
            </div>
        </details>
    </header>
    
    <!-- Movies Section -->
    <h2 class="section-title">Movies</h2>
    <div class="grid-container">
        @foreach($records as $record)
            <div class="grid-item">
                <img src="{{ asset($record->img) }}" alt="">
                <div class="overlay">
                    <h1>{{$record->m_name}}</h1>
                    <p>{{$record->m_description}}</p>
                    <details class="user-menu">
                        <summary>
                            <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                            <span class="dropdown-icon">&#x25BC;</span>
                        </summary>
                        <div class="dropdown">
                            <form action="/addwatchlist" method="POST">
                                @csrf
                                <input type="hidden" name="m_name" value="{{$record->m_name}}"> 
                                <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                            </form>
                            <a href="profile.php">Watch now</a> 
                        </div>
                    </details>
                </div>
            </div>
        @endforeach
    </div>
        {{-- <div class="grid-item">
            <img src="{{ asset('images/avengers.jpg') }}" alt="Avengers">
            <div class="overlay">
                <h1>Avengers</h1>
                <p>Earth's mightiest heroes unite to stop an alien invasion led by Loki.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Avengers"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/joker.jpg') }}" alt="Joker">
            <div class="overlay">
                <h1>Joker</h1>
                <p>A troubled loner descends into madness and becomes the infamous clown-faced symbol of chaos.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Joker"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/inception.jpeg') }}" alt="Inception">
            <div class="overlay">
                <h1>Inception</h1>
                <p>A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Inception"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/interstellar.jpeg') }}" alt="Interstellar">
            <div class="overlay">
                <h1>Interstellar</h1>
                <p>A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Interstellar"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/dark_knight.jpg') }}" alt="The Dark Knight">
            <div class="overlay">
                <h1>The Dark Knight</h1>
                <p>Batman faces his greatest challenge as the Joker wreaks havoc on Gotham City with his psychological warfare.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Dark Knight"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/matrix.jpeg') }}" alt="The Matrix">
            <div class="overlay">
                <h1>The Matrix</h1>
                <p>A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Matrix"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/pulp_fiction.jpg') }}" alt="Pulp Fiction">
            <div class="overlay">
                <h1>Pulp Fiction</h1>
                <p>The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Pulp Fiction"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/shawshank_redemption.jpg') }}" alt="The Shawshank Redemption">
            <div class="overlay">
                <h1>The Shawshank Redemption</h1>
                <p>Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Shawshank Redemption"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/godfather.jpg') }}" alt="The Godfather">
            <div class="overlay">
                <h1>The Godfather</h1>
                <p>The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Godfather"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/fight_club.jpeg') }}" alt="Fight Club">
            <div class="overlay">
                <h1>Fight Club</h1>
                <p>An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much more.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Fight Club"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
    </div> --}}


    @if (session('underage'))
        <script>
            alert('You must be 18 or older to add movies to your watchlist.');
        </script>
    @endif

    <footer>
        <p>&copy; 2024 StreamHive. All rights reserved.</p>
    </footer>
</body>
</html>