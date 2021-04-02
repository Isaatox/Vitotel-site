<!DOCTYPE html PUBLIC >
<html lang="fr-fr">
  <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="https://w3schools.com/w3css/4/w3.css"> -->
  <script src="https://w3schools.com/lib/w3.js"></script>
  <title>Contact</title>
</head>

  <div class="navbar">
          <a href="index.html">Accueil</a>
          <a href="association.html">Les amis de Vitotel</a>
          <a href="index.html#photos">Photos</a>
    <div class="dropdown">
      <button class="dropbtn">Histoire
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <div class="row">
          <div class="column">
            <h3>L'Histoire</h3>
            <a href="histoire.html">Histoire de Vitotel</a>
            <a href="regnerv2.html">Vitotel en 1913</a>
          </div>
        </div>
      </div>
    </div>
    <a href="saintmichel.html">Saint Michel de Vitotel</a>
    <a href="saintclair.html">Saint Clair</a>
    <a href="expositions.html">Expositions</a>
    <a href="contact.php">Contact</a>

<span style="    
    float: right;
    font-size: 18px;
    color: rgb(230, 230, 230);
    text-align: center;
    font-style: bold;
    text-decoration: none;">
    <img src="Photos/logovitotel.jpg" class=logo><br>
     Amis de Vitotel
  </div>

<body style="background-color: rgb(97, 96, 96);">
   
    <div class="container2">
      <div style="text-align:center">
        <h2>Nous Contacter</h2>
        <p>Ce formulaire permet de contacter Vitotel :</p>
      </div>
      <div class="row2">
        <div class="column2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14756.073513607587!2d0.8848788890878899!3d49.1715304296085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e110307c1369e5%3A0x40c14484fbb8a30!2s27110%20Vitot!5e0!3m2!1sfr!2sfr!4v1615310696405!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>        </div>
        <div class="column2">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <span class="error">* <?php echo $FnameErr; ?></span> 
          <label for="fname">Prénom</label>
            <input type="text" id="Fname" name="Fname" placeholder="Votre Prénom.." required><span class="error">* <?php echo $LnameErr; ?></span>
            <label for="lname">Nom</label>
            <input type="text" id="Lname" name="Lname" placeholder="Votre nom de famille.." required><span class="error">* <?php echo $mailErr; ?></span>
            <label for="mail">E-mail :</label>
            <input type="email" id="mail" name="mail" placeholder="Inscrivez votre adresse E-mail.." required><span class="error">*</span>
            <label for="subject">Sujet</label>
            <textarea id="subject" name="subject" placeholder="Votre sujet.." style="height:170px" required></textarea>
            <input type="submit" value="Envoyer">
          </form>
        </div>
      </div>
    </div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  $FnameErr = $LnameErr = $mailErr = "";
  $Fname = $Lname = $mail = $subject = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Fname"])) {
    $FnameErr = "Prénom est requis";
  } else {
    $Fname = test_input($_POST["Fname"]);
  }print $FnameErr;

  if (empty($_POST["Lname"])) {
    $LnameErr = "Nom est requis";
  } else {
    $Lname = test_input($_POST["Lname"]);
  }print $LnameErr;

  if (empty($_POST["email"])) {
    $emailErr = "Email est requis";
  } else {
    $email = test_input($_POST["mail"]);
  }print $mailErr;

  if (empty($_POST["subject"])) {
    $subject = "Le sujet est vide";
  } else {
    $subject = test_input($_POST["subject"]);
  }
  }


  $Fname = test_input($_POST["Fname"]);
  if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $Fname)) {
    $FnameErr = "Seuls les lettres et les espaces blancs sont autorisés";
  }

  $Lname = test_input($_POST["Lname"]);
  if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $Lname)) {
    $LnameErr = "Seuls les lettres et les espaces blancs sont autorisés";
  }

  $mail = test_input($_POST["mail"]);
  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $mailErr = "Format d'email invalide";
  }

  $subject = test_input($_POST["subject"]);

if ($FnameErr == "" && $LnameErr == "" && $mailErr == "") {
    $emailTo = 'laurent.bouquet@joliciel.org';
    $sujet = '[Les Amis de Vitotel] - Un message de ' . $Fname . " " . $Lname;

    $message = "\r\n";
    $message = $message . "Bonjour,\r\n";
    $message = $message . "\r\n";
    $message = $message . 'Voici un message de la part de ' . $Fname . " " . $Lname ."\r\n";
    $message = $message . 'Adresse email : ' . $mail . "\r\n";
    $message = $message . 'Sujet : ' . $subject . "\r\n";
    $message = $message . "\r\n";
    $message = $message . "Cordialement \r\n";
    $message = $message . "\r\n";
    $message = $message . "Mail automatique, généré par le site Internet \r\n";

    $headers = "MIME-Version: 1.0\n";
    $headers = "Content-type: text/html; charset=utf-8\n";
    $headers = "From:" . $mail;
    $error = !mail($emailTo, $sujet, $message, $headers);
    print($error);
    }
}
?>
 

<footer>
<div class="footer">
<div id="button"></div>
<div id="container">
<div id="cont">
<div class="footer_center">
    <h4>&copy; Contact : <a href="mailto:contact@vitotel.fr">contact@vitotel.fr</a><br>
    Les amis de Vitotel, association loi 1901<br>
    License : <a href="http://www.creativecommons.org/licenses/by-nc-sa/2.0/">Creative
      Commons</a><br>
      <a href="Mention-legales.html">Mentions Légales </a></h4>
</div>
</div>
</div>
</div>
</footer>
</body>
</html>