<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunify - Music Streaming Site</title>
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
    
        <div class="glider-container" id="homescroll">
            <div class="glider">
                <div class="slide">
                    <img src="{{ asset('images/thor.jpg') }}" alt="Image 1">
                    <div class="overlay">
                        <h1>Thor</h1>
                        <p>A banished god learns humility on Earth to prove he's worthy of his mighty hammer.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Thor"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/avengers.jpg') }}" alt="Image 4">
                    <div class="overlay">
                        <h1>Avengers</h1>
                        <p>Earth's mightiest heroes unite to stop an alien invasion led by Loki.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Avengers"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/guardian_of_the_galaxy.jpg') }}" alt="Image 2">
                    <div class="overlay">
                        <h1>Guardian Of The Galaxy</h1>
                        <p>A band of misfits teams up to protect a powerful orb—and the galaxy—from a ruthless villain.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Guardian Of The Galaxy"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/joker.jpg') }}" alt="Image 3">
                    <div class="overlay">
                        <h1>Joker</h1>
                        <p>A troubled loner descends into madness and becomes the infamous clown-faced symbol of chaos.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Joker"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/ironman.jpg') }}" alt="Image 3">
                    <div class="overlay">
                        <h1>Ironman</h1>
                        <p>A genius billionaire builds a high-tech suit to escape captivity and becomes a heroic armored Avenger.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Ironman"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/ironman2.jpg') }}" alt="Image 3">
                    <div class="overlay">
                        <h1>Ironman 2</h1>
                        <p>Tony Stark battles a vengeful inventor and government pressure while struggling with his own mortality.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Ironman 2"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/ironman3.jpg') }}" alt="Image 3">
                    <div class="overlay">
                        <h1>Ironman 3</h1>
                        <p>Haunted by past battles, Tony faces a mysterious terrorist and discovers what truly makes him Iron Man.</p>
                        <details class="user-menu">
                            <summary>
                                <button id="visible1" class="option-icon" style="font-size:15px, ">Options</button>
                                <span class="dropdown-icon">&#x25BC;</span>
                            </summary>
                            <div class="dropdown">
                                <form action="/addwatchlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="m_name" value="Ironman 3"> 
                                    <button type="submit" class="dropdown-button-item">Add to Watchlist</button>
                                </form>
                                <a href="profile.php">Watch now</a> 
                            </div>
                        </details>
                    </div>
                </div>
            </div>
            <button class="glider-prev">«</button>
            <button class="glider-next">»</button>
            <div id="dots"></div>
        </div>
    <details class="dropdown">
        <summary>Options</summary>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item">Add to Watchlist</a>
        </div>
    </details>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js"></script>
        <script>
            new Glider(document.querySelector('.glider'), {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: '#dots',
                draggable: true,
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        </script>
    </section>
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

