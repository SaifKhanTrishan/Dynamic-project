<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Meal Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1CA9C9;
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        .header-banner {
            background: linear-gradient(135deg, #1CA9C9 0%, #0077B6 100%);
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .header-banner h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }

        .header-banner p {
            margin: 10px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .nav-section {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .nav-section a,
        .nav-section button {
            display: inline-block;
            background-color: #0077B6;
            color: #fff;
            border: none;
            padding: 12px 20px;
            margin: 8px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-section a:hover,
        .nav-section button:hover {
            background-color: #023E8A;
            transform: translateY(-2px);
        }

        .logout-btn {
            background-color: #dc3545 !important;
        }

        .logout-btn:hover {
            background-color: #c82333 !important;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 700;
            margin: 0 auto 20px;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .profile-name {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .profile-email {
            font-size: 16px;
            opacity: 0.8;
            margin: 0;
        }

        .profile-info {
            margin-top: 40px;
        }

        .info-section {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .info-section h3 {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 500;
            opacity: 0.8;
        }

        .info-value {
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-card {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #28a745;
            margin: 10px 0;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.8;
        }

        .success-message {
            background-color: rgba(40, 167, 69, 0.2);
            border: 1px solid #28a745;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 30px 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="header-banner">
        <h1>🍽️ My Profile</h1>
        <p>Manage your account and track your progress</p>
    </div>

    <!-- Navigation Links -->
    <div class="nav-section">
        <a href="/">🏠 Home</a>
        <a href="/goals">📋 My Goals</a>
        <a href="/mealplans">📅 My Meal Plans</a>
        <a href="/usermetrics">📊 Track Metrics</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </div>

    <div class="profile-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <h2 class="profile-name">{{ Auth::user()->name }}</h2>
            <p class="profile-email">{{ Auth::user()->email }}</p>
        </div>

        <div class="profile-info">
            <div class="info-section">
                <h3>📋 Account Information</h3>
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email Address</span>
                    <span class="info-value">{{ Auth::user()->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Member Since</span>
                    <span class="info-value">{{ Auth::user()->created_at->format('F j, Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Last Updated</span>
                    <span class="info-value">{{ Auth::user()->updated_at->format('F j, Y') }}</span>
                </div>
            </div>

            <div class="info-section">
                <h3>📊 Your Activity Statistics</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total Meal Plans</div>
                        <div class="stat-number">{{ Auth::user()->mealPlans()->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Active Goals</div>
                        <div class="stat-number">{{ Auth::user()->goals()->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Tracked Metrics</div>
                        <div class="stat-number">{{ Auth::user()->userMetrics()->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
