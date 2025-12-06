<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Meal Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1CA9C9;
            color: #fff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border-radius: 6px;
            border: 2px solid transparent;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 15px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.25);
            border-color: #fff;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #28a745;
            color: white;
        }

        .btn-primary:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }

        .btn-secondary {
            background-color: #0077B6;
            color: white;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #023E8A;
        }

        .error-message {
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success-message {
            background-color: rgba(40, 167, 69, 0.2);
            border: 1px solid #28a745;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.3);
        }

        .divider span {
            background: rgba(255, 255, 255, 0.1);
            padding: 0 15px;
            position: relative;
            font-size: 14px;
            opacity: 0.8;
        }

        .password-hint {
            font-size: 12px;
            opacity: 0.8;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .register-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="header">
            <h1>🍽️ Join Us</h1>
            <p>Create your Meal Planner account</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
                <div class="password-hint">Minimum 8 characters</div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>

        <div class="divider">
            <span>OR</span>
        </div>

        <a href="{{ route('login') }}" style="text-decoration: none;">
            <button type="button" class="btn btn-secondary">Already have an account? Login</button>
        </a>
    </div>
</body>
</html>
