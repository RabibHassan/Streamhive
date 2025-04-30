<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - StreamHive</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/background.png') }}') no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            font-size: 3rem;
            color: purple;
            font-weight: bold;
            font-family: Impact, sans-serif;
            margin-bottom: 20px;
            text-shadow: none;
        }

        .signup-container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 50px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .signup-container input {
            width: 96%;
            padding: 11px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .signup-container button {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            background: linear-gradient(45deg, #1db954, #1aa34a);
            color: white;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            box-shadow: 0 0 10px #1db954;
        }

        .signup-container button:hover {
            transform: scale(1.05);
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="header">StreamHive</div>
        <h1>Sign Up</h1>
        <form action="/signup" method="POST">
            @csrf
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="int" id="age" name="age" placeholder="Age" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm-password" placeholder="Confirm Password" required>
            <div class="error-message" id="error-message"></div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="login">
            <p>Already have an account? <a href="{{route('login')}}">Log in</a></p>
        </div>
    </div>
    <script>
        const form = document.getElementById('signup-form');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const errorMessage = document.getElementById('error-message');

        form.addEventListener('submit', function(event) {
            if (passwordInput.value !== confirmPasswordInput.value) {
                event.preventDefault();
                errorMessage.textContent = "Passwords do not match";
            } else {
                errorMessage.textContent = "";
            }
        });
    </script>
</body>
</html>