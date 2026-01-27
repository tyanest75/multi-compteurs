<?php
// get.php - retourne le contenu JSON des compteurs
header('Content-Type: application/json');
readfile('data.json');
