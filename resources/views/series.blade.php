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

        <form class="search-bar" action="/search" method="GET">
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
    <h2 class="section-title">Series</h2>
    <div class="grid-container">
        @foreach($records as $record)
            <div class="grid-item">
                <img src="{{ asset($record->img) }}" alt="">
                <div class="overlay">
                    <h1>{{$record->s_name}}</h1>
                    <p>{{$record->s_description}}</p>
                    <details class="user-menu">
                        <summary>
                            <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                            <span class="dropdown-icon">&#x25BC;</span>
                        </summary>
                        <div class="dropdown">
                            <form action="/addwatchlist" method="POST">
                                @csrf
                                <input type="hidden" name="m_name" value="{{$record->s_name}}"> 
                                <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                            </form>
                            <a href="profile.php">Watch now</a> 
                        </div>
                    </details>
                </div>
            </div>
        @endforeach
    </div>
    {{-- </div>
        <div class="grid-item">
            <img src="{{ asset('images/breaking_bad.jpeg') }}" alt="Breaking Bad">
            <div class="overlay">
                <h1>Breaking Bad</h1>
                <p>A high school chemistry teacher diagnosed with cancer turns to manufacturing and selling methamphetamine to secure his family's future.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Breaking Bad"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/the_witcher.jpg') }}" alt="The Witcher">
            <div class="overlay">
                <h1>The Witcher</h1>
                <p>Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Witcher"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/game_of_thrones.jpg') }}" alt="Game of Thrones">
            <div class="overlay">
                <h1>Game of Thrones</h1>
                <p>Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Game of Thrones"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/peaky_blinders.webp') }}" alt="Peaky Blinders">
            <div class="overlay">
                <h1>Peaky Blinders</h1>
                <p>A gangster family epic set in Birmingham, England, following a gang who sew razor blades in the peaks of their caps.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Peaky Blinders"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/the_boys.jpg') }}" alt="The Boys">
            <div class="overlay">
                <h1>The Boys</h1>
                <p>A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="The Boys"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/ozark.jpg') }}" alt="Ozark">
            <div class="overlay">
                <h1>Ozark</h1>
                <p>A financial advisor drags his family from Chicago to the Missouri Ozarks, where he must launder money to appease a drug boss.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Ozark"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/mindhunter.jpg') }}" alt="Mindhunter">
            <div class="overlay">
                <h1>Mindhunter</h1>
                <p>In the late 1970s, two FBI agents expand criminal science by delving into the psychology of murder and getting uneasily close to all-too-real monsters.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Mindhunter"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/dark.jpg') }}" alt="Dark">
            <div class="overlay">
                <h1>Dark</h1>
                <p>A family saga with a supernatural twist, set in a German town where the disappearance of two young children exposes the relationships among four families.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Dark"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('images/succession.jpg') }}" alt="Succession">
            <div class="overlay">
                <h1>Succession</h1>
                <p>The Roy family is known for controlling the biggest media and entertainment company in the world. However, their world changes when their father steps down from the company.</p>
                <form action="/addwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="m_name" value="Succession"> 
                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                </form>
            </div>
        </div>
    </div> --}}

    <footer style="text-align: center; padding: 20px; background-color: #1a1a1a; color: white;margin-top: 20px;bottom:0; width: 100%;">
        <p>StreamHive &copy; 2024</p>
        <p>&copy; 2024 StreamHive. All rights reserved.</p>
    </footer>
    @if (session('underage'))
        <script>
            alert('You must be 18 or older to add movies to your watchlist.');
        </script>
    @endif

</body>
</html>