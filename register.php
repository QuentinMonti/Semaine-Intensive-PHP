<?php
require_once 'assets/config/bootstrap.php';

// Traitement du formulaire d'inscription
if (isset($_POST['register'])) {

  if (empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['mdp'])) {
    echo 'Tous les champs doivent être remplis';
  }
    // Le username doit contenir entre 3 et 15 caractère 
  elseif (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20) {
    echo 'Le nom d\'utilisateur doit contenir entre 3 & 20 caractères';
  }
    // Vérifier si l'email est valide
  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'adresse email invalide';
  }
    // Vérifier la longeur du mdp
  elseif (strlen($_POST['mdp']) < 3 || strlen($_POST['mdp']) > 20) {
    echo 'Le MDP doit contenir entre 3 & 20 caractères';
  }
  else{
    // Enregistrer l'utilisateur dans la bdd
    $req = $pdo->prepare(
      'INSERT INTO utilisateur
      VALUES(
        "",
        :pseudo,
        :email,
        :mdp,
        "user"
      )
      '
    );
    $req->execute(array(
      'pseudo'=>$_POST['pseudo'],
      'email'=>$_POST['email'],
      'mdp'=>password_hash($_POST['mdp'], PASSWORD_DEFAULT),
      ));

        // Rechercher l'utilisateur sur mySQL
      $req = $pdo->prepare(
    'SELECT *
    FROM utilisateur
    WHERE email = :email'
  );
  $req->bindParam(':email', $_POST['email']);
  $req->execute();

  $user = $req->fetch(PDO::FETCH_ASSOC);

      //puis rediriger 
      unset($user['mdp']);
      $_SESSION['user'] = $user;
      session_write_close();

      header('Location: index.php');


  }


}



?>


<?php 
$page_title='Inscription';
include 'assets/inc/header.php';?>

<div class=" container border mt4-4 p-4">
  <h1><?=$page_title?></h1>




  <form action="register.php" method="post">

    <label>Pseudo</label>
    <input type="text" class="form-control" name="pseudo">

    <label>Email</label>
    <input type="text" class="form-control" name="email">


    <label>Mot de passe</label>
    <input type="password" class="form-control" name="mdp">

    <input type="submit" name="register" class="btn btn-primary" value="S'incrire">
  </form>

</div>

<?php include 'assets/inc/footer.php'; ?>