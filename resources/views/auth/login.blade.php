
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration Form</title>
    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #009579;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 430px;
            width: 100%;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .container .registration {
            display: none;
        }

        #check:checked~.registration {
            display: block;
        }

        #check:checked~.login {
            display: none;
        }

        #check {
            display: none;
        }

        .container .form {
            padding: 2rem;
        }

        .form header {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form input {
            height: 60px;
            width: 100%;
            padding: 0 15px;
            font-size: 17px;
            margin-bottom: 1.3rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }

        .form input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }

        .form a {
            font-size: 16px;
            color: #009579;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form input.button {
            color: #fff;
            background: #009579;
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-top: 1.7rem;
            cursor: pointer;
            transition: 0.4s;
        }

        .form input.button:hover {
            background: #006653;
        }

        .signup {
            font-size: 17px;
            text-align: center;
        }

        .signup label {
            color: #009579;
            cursor: pointer;
        }

        .signup label:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 1rem;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Login</header>
            <form id="loginForm">
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <input type="submit" class="button" value="Login">
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <label for="check">Signup</label>
                </span>
            </div>
            <div class="error-message" id="loginError"></div>
        </div>
         {{-- resister form --}}
         <div class="registration form">
            <header>Signup</header>
            <form id="registerForm">
                @csrf
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <input type="email" id="Registeremail" name="email" placeholder="Enter your email" required>
                <input type="password" id="Registerpass" name="password" placeholder="Enter your password" required>
                <input type="submit" class="button" value="Signup">
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check">Login</label>
                </span>
            </div>
            <div id="response"></div> <!-- Added to show success/error messages -->
        </div>
        
    </div>

   <script>$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault();

        var email = $('#email').val().trim();
        var password = $('#password').val().trim();

        // Client-side validation
        if (!email || !password) {
            $('#loginError').html('Please fill in both email and password.');
            return;
        }

        // Clear previous error message
        $('#loginError').html('');

        // AJAX request to login API
        $.ajax({
            url: '/api/login',
            type: 'POST',
            data: JSON.stringify({
                email: email,
                password: password
            }),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                localStorage.setItem('accessToken', response.token);
                window.location.href = '/dashboard'; // Redirect to dashboard on successful login
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Login failed. Please try again.';
                $('#loginError').html(errorMessage); // Display error message
            }
        });
    });

    // Handle registration form submission (if needed)
    $('#registerForm').submit(function(event) {
        // Your registration form submission logic here
    });

    // Toggle between login and registration forms
    $('#check').change(function() {
        $('.registration').toggle();
        $('.login').toggle();
    });
});
</script>
</body>
</html>
