
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meal Planner Home</title>
    <!-- Google Fonts for Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1CA9C9; /* Sea Blue */
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

        .nav-section .primary-btn {
            background-color: #28a745;
            font-size: 16px;
            font-weight: 700;
        }

        .nav-section .primary-btn:hover {
            background-color: #218838;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 900px;
            margin: 0 auto 40px auto;
        }

        li {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        li span {
            flex: 1;
            min-width: 200px;
        }

        form {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        form input[type="date"],
        form input[type="number"] {
            padding: 8px 12px;
            border-radius: 4px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 14px;
        }

        form input[type="date"]::placeholder,
        form input[type="number"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        form input[type="text"] {
            display: none; /* Hide recipe_id input */
        }

        form button {
            background-color: #0077B6;
            color: #fff;
            border: none;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        form button:hover {
            background-color: #023E8A;
        }

        #suggestions {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .suggestion-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .suggestion-btn {
            background-color: #0077B6 !important;
            color: white !important;
            border: none !important;
            padding: 10px 16px !important;
            border-radius: 6px !important;
            cursor: pointer !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
        }

        .suggestion-btn:hover {
            background-color: #023E8A !important;
            transform: translateY(-2px) !important;
        }

        @media (max-width: 768px) {
            li {
                flex-direction: column;
                align-items: flex-start;
            }

            form {
                width: 100%;
            }

            .suggestion-buttons {
                flex-direction: column;
            }

            .suggestion-btn {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>

    <div class="header-banner">
        <h1>🍽️ Meal Planner</h1>
        <p>Track your nutrition, manage your goals, and discover recipes aligned with your dietary needs</p>
    </div>

    <!-- Navigation Links -->
    <div class="nav-section">
        <a href="/profile">👤 My Profile</a>
        <a href="/goals">📋 My Goals</a>
        <a href="/mealplans">📅 My Meal Plans</a>
        <a href="/usermetrics">📊 Track Metrics</a>
        <a href="/recipes/smart-suggest" class="primary-btn">💡 Smart Suggestions</a>
    </div>

    <h2>All Recipes</h2>
    <ul>
        @foreach($recipes as $recipe)
            <li>
                <span><strong>{{ $recipe->name }}</strong> — Calories: {{ $recipe->calories }} | Protein: {{ $recipe->protein }}g | Carbon: {{ $recipe->carbon_footprint }} kg CO₂</span>
                <form action="{{ route('mealplans.store') }}" method="POST"> <!-- route to store meal plan  and post method -->
                    @csrf <!-- CSRF token for security --> <!--Laravel blocks requests without this token to prevent cross-site request forgery.-->
                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                    <input type="date" name="date" required>
                    <input type="number" name="servings" value="1" min="1" max="10" placeholder="Servings">
                    <button type="submit">Add to Plan</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h2>Quick Suggestions</h2>
    <div class="suggestion-buttons">
        <button class="suggestion-btn" onclick="suggest('protein','up')">🔼 High Protein</button>
        <button class="suggestion-btn" onclick="suggest('protein','down')">🔽 Low Protein</button>
        <button class="suggestion-btn" onclick="suggest('carbs','up')">🔼 High Carbs</button>
        <button class="suggestion-btn" onclick="suggest('carbs','down')">🔽 Low Carbs</button>
        <button class="suggestion-btn" onclick="suggest('fat','up')">🔼 High Fat</button>
        <button class="suggestion-btn" onclick="suggest('fat','down')">🔽 Low Fat</button>
        <button class="suggestion-btn" onclick="suggest('fiber','up')">🔼 High Fiber</button>
        <button class="suggestion-btn" onclick="suggest('calories','down')">🔽 Low Calories</button>
    </div>
    <div id="suggestions"></div>

    <script>
        function suggest(nutrient, direction) {
            fetch(`/recipes/suggest?nutrient=${nutrient}&direction=${direction}`)
                .then((res) => res.text())
                .then(
                    (html) => (document.getElementById("suggestions").innerHTML = html)
                );
        }
    </script>

</body>
</html>