<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHive</title>
    <style>
        body {
            margin: 0;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            font-size: 3rem;
            color: rgb(60, 132, 214);
            font-weight: bold;
            font-family: Impact, sans-serif;
            margin-bottom: 20px;
            text-shadow: none;
        }

        .container {
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 50px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            z-index: 1; 
        }
        .container input {
            width: 96%;
            padding: 11px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .container button {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            background: linear-gradient(45deg, #1a71a3, #1a71a3);
            color: white;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            box-shadow: 0 0 10px #1a71a3;
        }

        .container button:hover {
            transform: scale(1.05);
        }

        .error-message {
            color: red;
        }

            .hero {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh; 
        overflow: hidden;
        }

        #bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; 
        z-index: -1; 
        }
        .signup {
            margin-top: 20px;
            color: white;
        }  
    </style>
</head>
<body>
    <div class="hero">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('images/bg1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <div class="header">StreamHive</div>
        <form action="/login" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="button" id="toggle-password">Show Password</button>
            <button type="submit" name="login">Log In</button>
        </form>
        <div class="signup">
            <p>Don't have an account? <a href="{{route('signup')}}">Sign up</a></p>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('toggle-password');

        togglePasswordButton.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.textContent = 'Hide Password';
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.textContent = 'Show Password';
            }
        });
    </script>
</body>
</html>