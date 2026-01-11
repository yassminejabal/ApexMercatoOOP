<?php
session_start();
$_SESSION['role'] = $_SESSION['role'] ?? 'journaliste'; // juste pour test
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Body animation */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            animation: backgroundColor 10s infinite alternate;
        }

        @keyframes backgroundColor {
            0% {
                background-color: #ff9a9e;
            }

            50% {
                background-color: #fad0c4;
            }

            100% {
                background-color: #fbc2eb;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: -220px;
            top: 0;
            width: 220px;
            height: 100%;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            transition: left 0.5s ease;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: block;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .sidebar ul li a:hover {
            transform: translateX(10px);
            color: #ffd700;
        }

        /* Sidebar show on hover (optional) */
        body:hover .sidebar {
            left: 0;
        }

        /* Content */
        .content {
            margin-left: 20px;
            padding: 50px;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="content">
        <h1>Bienvenue, <?php echo $_SESSION['role']; ?>!</h1>
        <p>Voici votre dashboard avec animation de background et sidebar.</p>
    </div>

</body>

</html>