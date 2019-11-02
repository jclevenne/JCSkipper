<?php

require('model/frontend.php');

function home()
{
    require('view/frontend/homeView.php');
    require('view/frontend/template.php');
}

function simulateDelivery()
{
    //TODO : Test if find DeliveryRoute
    require('view/frontend/addDeliveryView.php');
    require('view/frontend/template.php');
}

function addDelivery()
{
    //TODO: verify all post and password, redirect on actual page, review structure of MVC, ajout tracé trajet
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=JCskipper;charset=utf8', 'root', 'root');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}

	// TODO : Add statut
	$req = $bdd->prepare('INSERT INTO `Deliveries` (`Portdeparture`, `Portarrival`, `Distance`, `Journeytime`, `Cost`,`Yachtname`, `Yachttype`, `Yachtlength`, `Yachtyear`, `Yachtcountry`, `Datedeparture`, `Datearrival`, `Comment`) VALUES(:Portdeparture, :Portarrival, :Distance, :Journeytime, :Cost, :Yachtname, :Yachttype, :Yachtlength, :Yachtyear, :Yachtcountry, :Datedeparture, :Datearrival, :Comment)');
	$req->execute(array(
		'Portdeparture'=>htmlentities($_POST['Portdeparture']),
		'Portarrival'=>htmlentities($_POST['Portarrival']),
		'Distance'=>htmlentities($_POST['Distance']),
		'Journeytime'=>htmlentities($_POST['Journeytime']),
		'Cost'=>htmlentities($_POST['Cost']),
		'Yachtname'=>htmlentities($_POST['Yachtname']),
		'Yachttype'=>htmlentities($_POST['Yachttype']),
		'Yachtlength'=>htmlentities($_POST['Yachtlength']),
		'Yachtyear'=>htmlentities($_POST['Yachtyear']),
		'Yachtcountry'=>htmlentities($_POST['Yachtcountry']),
		'Datedeparture'=>htmlentities($_POST['Datedeparture']),
		'Datearrival'=>htmlentities($_POST['Datearrival']),
		'Comment'=>htmlentities($_POST['Comment']),
	));
}

function addUser()
{
	//TODO: verify all post and password, redirect on actual page, review structure of MVC
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=JCskipper;charset=utf8', 'root', 'root');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}

	// Hachage du mot de passe
	$pass_hache = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

	// TODO : Add statut
	$req = $bdd->prepare('INSERT INTO `user` (`Firstname`, `Lastname`, `email`, `company`, `category`, `password`) VALUES(:firstname, :lastname, :email, :company, :category, :password)');
	$req->execute(array(
		'firstname'=>htmlentities($_POST['firstname']),
		'lastname'=>htmlentities($_POST['lastname']),
		'email'=>htmlentities($_POST['email']),
		'company'=>htmlentities($_POST['company']),
		'category'=>htmlentities($_POST['category']),
		'password'=>$pass_hache,
	));
}

function login()
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=JCskipper;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	//  Récupération de l'utilisateur et de son pass hashé
	$req = $bdd->prepare('SELECT ID, password FROM user WHERE email = :email');
	$req->execute(array(
	    'email' => htmlentities($_POST['email'])));
	$resultat = $req->fetch();

	// Comparaison du pass envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

	if (!$resultat)
	{
	    echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{
	    if ($isPasswordCorrect) {
	        //session_start();
	        $_SESSION['ID'] = $resultat['ID'];
	        $_SESSION['pseudo'] = htmlentities($_POST['email']);

	        // Création des cookies TODO: créer uniquement si checkbox coché
	        setcookie('email', htmlentities($_POST['email']), time() + 365*24*3600, null, null, false, true);
	        setcookie('password', htmlentities($_POST['password']), time() + 365*24*3600, null, null, false, true);
	    }
	    else {
	        echo 'Mauvais identifiant ou mot de passe !';
	    }
	}
}

function logout()
{
	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();

	// Suppression des cookies de connexion automatique
	setcookie('email', '');
	setcookie('password', '');
}

function findDelivery()
{
	//require('model/frontend.php');

    $alldeliveries = getDeliveries();
    
	require('view/frontend/findDeliveryView.php');
	require('view/frontend/template.php');
}

function findSkipper()
{
	//require('model/frontend.php');

    $allskippers = getSkippers();
    
	require('view/frontend/findSkippers.php');
	require('view/frontend/template.php');
}