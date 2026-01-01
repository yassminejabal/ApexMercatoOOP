<?php
include "../databese.php";
include "../traitModifierBadget.PHP";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* ===== Reset ===== */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    /* ===== Body with Animated Background ===== */
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        padding: 0;
        margin: 0;
        background: linear-gradient(45deg, #1e3c72, #2a5298, #67b26f);
        background-size: 600% 600%;
        animation: gradientShift 10s ease infinite;
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    /* ===== Background Animation ===== */
    @keyframes gradientShift {
        0% {
            background: linear-gradient(45deg, #1e3c72, #2a5298, #67b26f);
        }

        25% {
            background: linear-gradient(45deg, #ff6a00, #ee0979, #ffb400);
        }

        50% {
            background: linear-gradient(45deg, #4c6ef5, #ff72d1, #8e44ad);
        }

        75% {
            background: linear-gradient(45deg, #1e3c72, #2a5298, #67b26f);
        }

        100% {
            background: linear-gradient(45deg, #ff6a00, #ee0979, #ffb400);
        }
    }

    /* ===== Container ===== */
    .container {
        max-width: 1400px;
        margin: auto;
        padding: 30px;
    }

    /* ===== Page Title ===== */
    h1 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 36px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        animation: fadeIn 2s ease-out;
    }

    /* ===== Teams Grid - 4 cards per row ===== */
    .teams {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        animation: fadeInUp 1.5s ease-out;
    }

    /* ===== Team Card ===== */
    .team-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid rgba(255, 255, 255, 0.1);
        transition: transform 0.4s, box-shadow 0.4s, background 0.4s;
        animation: slideIn 1.5s ease-out;
    }

    .team-card:hover {
        transform: translateY(-10px) scale(1.04);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6), 0 0 25px rgba(255, 255, 255, 0.25);
        background: linear-gradient(135deg, #ff6a00, #ee0979);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* ===== Team Info ===== */
    .team-info {
        display: flex;
        flex-direction: column;
    }

    .team-name {
        font-size: 24px;
        margin-bottom: 8px;
        color: #fff;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.5);
    }

    .manager-name {
        color: #cfd8dc;
        font-size: 14px;
    }

    /* ===== Team Badge ===== */
    .team-badge {
        font-size: 36px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px;
        border-radius: 14px;
        text-align: center;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: transform 0.3s, box-shadow 0.3s, background 0.3s, color 0.3s;
        animation: bounce 1.2s infinite;
    }

    /* ===== Badge Colors + Icons ===== */
    .team-badge.gold {
        background: #FFD7001A;
        color: #B8860B;
    }

    .team-badge.gold::before {
        content: "🥇 ";
    }

    .team-badge.silver {
        background: #C0C0C01A;
        color: #A9A9A9;
    }

    .team-badge.silver::before {
        content: "🥈 ";
    }

    .team-badge.bronze {
        background: #CD7F321A;
        color: #8B4513;
    }

    .team-badge.bronze::before {
        content: "🥉 ";
    }

    /* ===== Badge Hover ===== */
    .team-badge:hover {
        transform: scale(1.2);
        box-shadow: 0 6px 16px rgba(255, 255, 255, 0.5);
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
    }

    /* ===== Bounce Animation ===== */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    /* ===== Formulaire ===== */
    form {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: 0.3s;
        animation: fadeInUp 2s ease-out;
    }

    form:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    /* Form Group */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        font-weight: 600;
        color: #1e3c72;
        margin-bottom: 8px;
        display: block;
    }

    input {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 14px;
        color: #333;
        transition: 0.3s;
    }

    input:focus {
        outline: none;
        border-color: #2a5298;
        box-shadow: 0 0 8px rgba(42, 82, 152, 0.2);
    }

    /* Button */
    button {
        padding: 12px 20px;
        background-color: #1e3c72;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        animation: buttonBounce 0.8s infinite alternate;
    }

    button:hover {
        background-color: #2a5298;
    }

    /* ===== Button Bounce Animation ===== */
    @keyframes buttonBounce {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.1);
        }
    }

    /* ===== Footer ===== */
    footer {
        background: rgba(255, 255, 255, 0.95);
        text-align: center;
        padding: 15px 20px;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        color: #1e3c72;
        font-weight: bold;
        border-radius: 0 0 15px 15px;
        margin-top: auto;
        animation: fadeInUp 2s ease-out;
    }

    /* ===== Animations ===== */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== Responsive ===== */
    @media (max-width: 1200px) {
        .teams {
            grid-template-columns: repeat(3, 1fr);
        }

        /* 3 cards per row */
    }

    @media (max-width: 992px) {
        .teams {
            grid-template-columns: repeat(2, 1fr);
        }

        /* 2 cards per row */
    }

    @media (max-width: 600px) {
        .teams {
            grid-template-columns: 1fr;
        }

        /* 1 card per row */
        .team-card {
            flex-direction: column;
        }
    }
</style>

<body>
    <form action="  " method="POST">
        <div class="form-group">
            <label for="team-name">enter id de l'équipe</label>
            <input type="text" id="team-name" name="id" placeholder="Entrez le id de l'équipe">
        </div>

        <div class="form-group">
            <label for="badge">Badge de l'équipe</label>
            <input type="number" id="badge" name="badge" placeholder="Entrez le badge">
        </div>

        <button type="submit">Ajouter l'équipe</button>
    </form>

</body>

</html>

<?php
$id = $_POST['id'];
    $newbadge = $_POST['badge'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($id) || empty($newbadge)) {
        exit();
    }
    else{

        modoferbadget($id,$newbadge,$connection);
    }
}
?>