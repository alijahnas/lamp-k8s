<html>
<head>
</head>
<body>
<h1>Hello, world !</h1>
<?php
  echo "<p>\n";
  echo "Nous nous trouvons sur l'instance <b>".gethostname()."</b>.\n";
  echo "</p>\n";

  echo "<p>\n";
  echo "Lancement de la boucle de calcul... ";

  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $start = $time;

//  for($i = 0; $i < 10; $i++) {
  for($i = 0; $i < 100000000; $i++) {
     $a = log1p(cosh(log1p($i)));
  }

  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $finish = $time;
  $total_time = round(($finish - $start), 3);

  echo "boucle de calcul terminée à ".date('H:i:s')." en ".$total_time."s !\n";
  echo "</p>\n";

//-----------------------------------------------------------------------------
//--------- Modifiez ici le code pour l'accès au stockage objet local ---------
//-----------------------------------------------------------------------------

echo "<p>\n";
require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;

    $bucket = 'testndc';
    $fichier = 'stockage_objet_NDC.txt';
    $clef_API = 'AKIAUOZA2GTLUGR4NUYF';
    $secret_API = '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';

try {
    $s3 = new S3Client([
        'region' => 'eu-west-3',
        'version' => '2006-03-01',
        'credentials' => [
            'key'    => $clef_API ,
            'secret' => $secret_API ,
        ],
    ]);
    $contenu = $s3->getObject(array(
	'Bucket' => $bucket,
	'Key' => $fichier,
    ));
} catch (Exception $e) {
    $contenu = $e->getMessage() . "\n";
} 

echo "Contenu du stockage objet :\n".$contenu['Body']." :)\n";
echo "</p>\n";

//------------------------------------------------------------------------------
//--------- Fin de modification du code pour l'accès au stockage objet ---------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------- Modifiez ici le code pour l'accès à la base de données -----------
//------------------------------------------------------------------------------

echo "<p>\n";
$serveur = 'localhost';
$user = 'testndcuser';
$password = 'fluctuat';
$base = 'testndc';

// Create connection
$mysql = new mysqli($serveur, $user, $password, $base);

// Check connection
if ($mysql->connect_error) {
    echo ("Connexion BDD KO : " . $mysql->connect_error);
} else {
    echo "Connexion BDD OK !<br />\n";
    $mysql->real_query("SELECT prenom, nom FROM contenu_base_testndc");
    $resultat = $mysql->use_result();

    echo "Contenu de la base SQL :<br />\n";
    while ($row = $resultat->fetch_assoc()) {
        echo $row['prenom']." ".$row['nom']."<br />\n";
    }
}
echo "</p>\n";

//-----------------------------------------------------------------------------
//------- Fin de modification du code pour l'accès à la base de données -------
//-----------------------------------------------------------------------------

?>
</body>
</html>

