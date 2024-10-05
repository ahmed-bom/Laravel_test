<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Header</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f3f3;
        }

        /* Custom header styling */
        .header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            padding: 15px 30px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.25);
            border-bottom: 3px solid #1b3ba7;
        }

        .header .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 26px;
            font-weight: 600;
            color: #fff;
        }

        .header .navbar-brand img {
            height: 50px;
            margin-right: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .header .nav-link {
            color: white !important;
            margin-left: 25px;
            font-size: 17px;
            position: relative;
            transition: color 0.4s ease;
        }

        .header .nav-link::before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: white;
            transition: all 0.4s ease;
        }

        .header .nav-link:hover {
            color: #fffcf7 !important;
        }

        .header .nav-link:hover::before {
            width: 100%;
        }

        /* Icons styling */
        .nav-icons svg {
            width: 28px;
            height: 28px;
            fill: white;
            margin-left: 25px;
            cursor: pointer;
            transition: transform 0.3s ease, fill 0.3s ease;
        }

        .nav-icons svg:hover {
            transform: scale(1.3);
            fill: #ffe100;
        }

        .nav-icons svg:active {
            transform: scale(1.15);
            fill: #ff4747;
        }

        /* Responsive Button */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3e%3cpath stroke="rgba%2855, 55, 55, 0.5%29" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/%3e%3c/svg%3e');
        }

        /* Add subtle shadow to navigation links on mobile view */
        @media (max-width: 991.98px) {
            .nav-link {
                margin-bottom: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <!-- Brand Logo and Name -->
                <a class="navbar-brand" href="#">
                    <img src="https://via.placeholder.com/50" alt="Logo">
                    MyWebsite
                </a>

                <!-- Responsive Toggler Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Favorites</a>
                        </li>
                    </ul>

                    <!-- Icon Buttons (SVGs) -->
                    <div class="nav-icons d-flex align-items-center">
                        <!-- Profile Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
                        </svg>

                        <!-- Favorites Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>

                        <!-- Logout Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
