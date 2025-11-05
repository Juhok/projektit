<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <title>PHP Joulukuusi lumisateessa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="tausta">
  <!-- Lumihiutaleet -->
  <?php
  for ($i = 0; $i < 40; $i++) {
      $vasen = rand(0, 100);        // sijainti vaakasuunnassa taustassa
      $viive = rand(0, 100) / 10;   // animaation aloitusviive
      $kesto = rand(8, 18);         // eri nopeudet
      $koko = rand(10, 20);         // hiutaleen koko
      $läpinakyvyys = rand(5, 10) / 10; // opacity 0.5–1.0
      echo "<div class='flake' style='left: {$vasen}%; animation-delay: {$viive}s; animation-duration: {$kesto}s; font-size: {$koko}px; opacity: {$läpinakyvyys};'>❄️</div>";
  }
  ?>

  <!-- Kuusi -->
  <div class="kuusi">
  <?php
  $korkeus = 7;

  echo "<div class='tähtirivi'><span class='latvatähti'>★</span></div>";

  for ($i = 1; $i <= $korkeus; $i++) {
      echo "<div class='rivi'>";
      echo str_repeat("<span class='space'></span>", $korkeus - $i);
      echo str_repeat("<span class='oksa'>*</span>", $i * 2 - 1);
      echo "</div>";
  }

  echo "<div class='runko'>||</div>";
  ?>
  </div>

</div>

  <!-- Background music (place winter.mp3 in same folder or change src to a URL) -->
  <audio id="bg-audio" src="winter.mp3" loop></audio>
  <button id="audio-toggle" aria-label="Play background music">▶️ Play music</button>

  <script>
    // Try autoplay; if blocked, user can press the button
    const audio = document.getElementById('bg-audio');
    const btn = document.getElementById('audio-toggle');
    audio.volume = 0.6;

    audio.play().then(() => {
      btn.textContent = '🔊 Music on';
    }).catch(() => {
      btn.textContent = '▶️ Play music';
    });

    btn.addEventListener('click', () => {
      if (audio.paused) {
        audio.play();
        btn.textContent = '🔊 Music on';
      } else {
        audio.pause();
        btn.textContent = '🔈 Music off';
      }
    });
  </script>

</body>
</html>