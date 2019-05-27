<?php 

//Savoir si un utilisateur est connecté

function isConnected() : bool
{
  return isset($_SESSION['user']);
}

// Récuperer une information de l'utilisateur
function getUserInfo(string $info) : string
{
  // si ca n'existe pas renvoyer null
  return $_SESSION['user'][$info] ?? null;
}




