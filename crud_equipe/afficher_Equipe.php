<?php
include_once "../databese.php";
include_once "index.php";
// include "../headerEquipe.html";

$newequip = new equipe(null,null,null, $connection);
$data = $newequip->getAll();
    
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des équipes</title>
  <link rel="stylesheet" href="../css.css">
  <style>
/* ===== Reset ===== */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}

/* ===== Body + Background ===== */
body {
  min-height: 100vh;
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  color: #fff;
  display: flex;
  flex-direction: column;
  padding: 30px 20px;
}

/* ===== Container ===== */
.container {
  max-width: 1400px;
  margin: auto;
}

/* ===== Page Title ===== */
h1 {
  text-align: center;
  margin-bottom: 40px;
  font-size: 36px;
  text-shadow: 0 2px 8px rgba(0,0,0,0.5);
}

/* ===== Teams Grid - 4 cards per row ===== */
.teams {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 cards فالصف */
  gap: 30px;
}

/* ===== Team Card ===== */
.team-card {
  background: rgba(255,255,255,0.05);
  border-radius: 20px;
  backdrop-filter: blur(10px);
  padding: 25px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border: 2px solid rgba(255,255,255,0.1);
  transition: transform 0.4s, box-shadow 0.4s, background 0.4s;
}
.team-card:hover {
  transform: translateY(-10px) scale(1.04);
  box-shadow: 0 25px 50px rgba(0,0,0,0.6), 0 0 25px rgba(255,255,255,0.25);
  background: linear-gradient(135deg, #ff6a00, #ee0979);
  border-color: rgba(255,255,255,0.2);
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
  text-shadow: 0 1px 4px rgba(0,0,0,0.5);
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
  border: 1px solid rgba(255,255,255,0.3);
  transition: transform 0.3s, box-shadow 0.3s, background 0.3s, color 0.3s;
  animation: bounce 1.2s infinite;
}

/* ===== Badge Colors + Icons ===== */
.team-badge.gold { background: #FFD7001A; color: #B8860B; }
.team-badge.gold::before { content: "🥇 "; }

.team-badge.silver { background: #C0C0C01A; color: #A9A9A9; }
.team-badge.silver::before { content: "🥈 "; }

.team-badge.bronze { background: #CD7F321A; color: #8B4513; }
.team-badge.bronze::before { content: "🥉 "; }

/* ===== Badge Hover ===== */
.team-badge:hover {
  transform: scale(1.2);
  box-shadow: 0 6px 16px rgba(255,255,255,0.5);
  background: rgba(0,0,0,0.3);
  color: #fff;
}

/* ===== Bounce Animation ===== */
@keyframes bounce {
  0%,100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}

/* ===== Footer ===== */
footer {
  background: rgba(255,255,255,0.95);
  text-align: center;
  padding: 15px 20px;
  box-shadow: 0 -4px 8px rgba(0,0,0,0.1);
  color: #1e3c72;
  font-weight: bold;
  border-radius: 0 0 15px 15px;
  margin-top: auto;
}

/* ===== Responsive ===== */
@media (max-width: 1200px) {
  .teams { grid-template-columns: repeat(3, 1fr); } /* 3 cards فالصف */
}
@media (max-width: 992px) {
  .teams { grid-template-columns: repeat(2, 1fr); } /* 2 cards فالصف */
}
@media (max-width: 600px) {
  .teams { grid-template-columns: 1fr; } /* 1 card فالصف */
  .team-card { flex-direction: column; align-items: flex-start; gap: 15px; }
  .team-badge { align-self: flex-end; }
}
@media (max-width: 480px) {
  h1 { font-size: 28px; }
  .team-name { font-size: 20px; }
  .team-badge { font-size: 28px; padding: 6px 12px; }
}
/* ===== Header ===== */
header {
  background: linear-gradient(135deg, #1e3c72, #2a5298);
  padding: 40px 0;
  color: white;
  text-align: center;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  margin-bottom: 40px;
}

header .container {
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
}

header h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 10px;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
}

header p {
  font-size: 18px;
  margin-top: 10px;
  font-weight: 400;
  color: rgba(255, 255, 255, 0.7);
}

  </style>
</head>
<body>
      <header>
    <h1>ApexMercato Admin</h1>
    <nav>
      <a href="../index.php">Accueil</a>
      <a href="../admin_dashboard.php">Dashboard</a>
      <a href="logout.php">Déconnexion</a>
      <!-- <a href="crud_equipe/afficher_Equipe.php">Tous les l'équipe </a> -->
    </nav>
  </header>

<main class="container">
  <h1>🏆 Liste des équipes</h1>
  
  <div class="teams">
    <?php foreach($data as $row){ ?>
      <div class="team-card">
        <div class="team-info">
            <h3 class="team-name"><?=$row['id'] ?></h3>
          <h3 class="team-name"><?=$row['name'] ?></h3>
          <h4 class="manager-name">Manager: <?=$row['manager_name'] ?></h4>
        </div>
        
            
        <?= $row['badget'] ?>

    </h1>
      </div>
    <?php }?>
  </div>
</main>


</body>
</html>
