<?php

function getDeliveries()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=JCskipper;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->query('SELECT Portdeparture, Portarrival, Distance, Journeytime, Cost, Yachtname, Yachttype, Yachtlength, Yachtyear, Yachtcountry, Datedeparture, Datearrival FROM Deliveries');
    //$deliveries=$callDeliveries -> fetch();

    return $req;
}

function getSkippers()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=JCskipper;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->query('SELECT Firstname, Lastname, category FROM user WHERE category="skipper"');

    return $req;
}
