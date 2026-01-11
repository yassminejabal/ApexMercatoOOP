<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert Joueur confirmé</title>
    <link rel="stylesheet" href="success-joueur.css">
    <style>
        /* ===== BODY Animated Background ===== */
        body {
            min-height: 100vh;
            margin: 0;

            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(135deg,
                    #0f2027,
                    #203a43,
                    #2c5364,
                    #1abc9c,
                    #2ecc71);

            background-size: 500% 500%;
            animation: gradientMove 12s ease infinite;

            font-family: 'Segoe UI', Arial, sans-serif;
            overflow: hidden;
        }

        /* ===== Gradient animation ===== */
        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            25% {
                background-position: 50% 100%;
            }

            50% {
                background-position: 100% 50%;
            }

            75% {
                background-position: 50% 0%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* ===== Glow overlay ===== */
        body::before {
            content: "";
            position: fixed;
            inset: -50%;
            background: radial-gradient(circle,
                    rgba(255, 255, 255, 0.08),
                    transparent 65%);
            animation: rotateGlow 25s linear infinite;
            z-index: -1;
        }

        @keyframes rotateGlow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* ===== Success Container ===== */
        .success-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);

            padding: 35px 30px;
            border-radius: 22px;
            text-align: center;
            width: 90%;
            max-width: 420px;

            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.3);
            animation: fadeUp 1s ease forwards;
        }

        /* ===== Football Icon ===== */
        .success-check {
            width: 85px;
            height: 85px;
            margin: 0 auto 18px;

            border-radius: 50%;
            background: linear-gradient(135deg, #2ecc71, #1abc9c);

            color: #fff;
            font-size: 42px;
            font-weight: bold;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow: 0 8px 22px rgba(46, 204, 113, 0.6);
            animation: popBall 0.8s ease;
        }

        /* ===== Text ===== */
        .success-container h2 {
            color: #1abc9c;
            margin-bottom: 10px;
        }

        .success-container p {
            color: #555;
            font-size: 15px;
            margin-bottom: 25px;
        }

        /* ===== Button ===== */
        .success-btn {
            display: inline-block;
            padding: 12px 28px;

            background: linear-gradient(90deg, #1abc9c, #2ecc71);
            color: #fff;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;

            transition: 0.3s;
        }

        .success-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(26, 188, 156, 0.4);
        }

        /* ===== Animations ===== */
        @keyframes popBall {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }

            70% {
                transform: scale(1.2) rotate(10deg);
                opacity: 1;
            }

            100% {
                transform: scale(1) rotate(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== Mobile tweaks ===== */
        @media (max-width: 480px) {
            .success-container {
                padding: 28px 22px;
            }

            .success-check {
                width: 70px;
                height: 70px;
                font-size: 34px;
            }

            .success-container h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <div class="success-container">
        <div class="success-check">⚽</div>

        <h2>Transfert du joueur réussi</h2>

        <p>
            Le joueur a été transféré avec succès vers sa nouvelle équipe.
        </p>

        <a href="../html/admin_dashboard.php" class="success-btn">
            Continuer
        </a>
    </div>

</body>

</html>