<?php
// fichier : modele/DAO.class.php   (DAO : Data Access Object)
// Rôle : fournit les méthodes d'accès à la bdd FBCN au moyen de l'objet PDO
// modifié par Phl le 21/03/2022

// liste des méthodes :

// __construct() : le constructeur crée la connexion $cnx à la base de données
// __destruct() : le destructeur ferme la connexion $cnx à la base de données
// getCalendrier() : retourne le calendrier des courses

// inclusion des paramètres de l'application et de la classe Course
include_once ('parametres.php');
include_once ('Course.php');
include_once ('Resultat.php');


// début de la classe DAO (Data Access Object)
class DAO
{
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Membres privés de la classe ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    private $cnx;				// la connexion à la base de données
    
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Constructeur et destructeur ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
        try
        {	$this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD,
            $PARAM_USER,
            $PARAM_PWD);
        return true;
        }
        catch (Exception $ex)
        {
            echo ("Echec de la connexion a la base de donnees <br>");
            echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
            echo ("PARAM_HOTE = " . $PARAM_HOTE);
            return false;
        }
    }
    
    public function __destruct()
    {
        // ferme la connexion à MySQL :
        unset($this->cnx);
    }
    
    // ------------------------------------------------------------------------------------------------------
    // -------------------------------------- Méthodes d'instances ------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    // retourne le calendrier des courses sous forme de tableau d'objets
    public function getCalendrier()
    {
        // Tableau de courses
        $lesCourses = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "Select nom, lieu, date, heureDepart, distance, prix, challenge";
        $txt_req .= " from course";

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        // $req->bindValue("param1", $param1, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
            // création d'un objet Course (encodage pour la sécurité)
            //$unNom = utf8_encode($uneLigne->nom); // Obsolete depuis php 8.2
			$unNom = UConverter::transcode($uneLigne->nom, 'UTF8', 'ISO-8859-1');
            //$unLieu = utf8_encode($uneLigne->lieu); // Obsolete depuis php 8.2
			$unLieu = UConverter::transcode($uneLigne->lieu, 'UTF8', 'ISO-8859-1');
			//$uneDate = utf8_encode($uneLigne->date); // Obsolete depuis php 8.2
			$uneDate = UConverter::transcode($uneLigne->date, 'UTF8', 'ISO-8859-1');
            //$uneHeureDepart = utf8_encode($uneLigne->heureDepart); // Obsolete depuis php 8.2
			$uneHeureDepart = UConverter::transcode($uneLigne->heureDepart, 'UTF8', 'ISO-8859-1');
            //$uneDistance = utf8_encode($uneLigne->distance); // Obsolete depuis php 8.2
			$uneDistance = UConverter::transcode($uneLigne->distance, 'UTF8', 'ISO-8859-1');
            //$unPrix = utf8_encode($uneLigne->prix); // Obsolete depuis php 8.2
			$unPrix = UConverter::transcode($uneLigne->prix, 'UTF8', 'ISO-8859-1');
            //$unChallenge = utf8_encode($uneLigne->challenge); // Obsolete depuis php 8.2
			$unChallenge = UConverter::transcode($uneLigne->challenge, 'UTF8', 'ISO-8859-1');
             
            $uneCourse = new Course($unNom, $unLieu, $uneDate, $uneHeureDepart, $uneDistance, $unPrix, $unChallenge);
            $lesCourses[$i] = $uneCourse;
            $i++;
        }
        return $lesCourses;
    }
    // retourne la course sous forme d'objet
    public function getUneCourse(string $pnom)
    {

        // préparation de la requête de recherche
        $txt_req = "Select nom, lieu, date, heureDepart, distance, prix, challenge";
        $txt_req .= " from course";
        $txt_req .= " where nom = :nom";
        echo $txt_req;

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        $req->bindValue("nom", $pnom, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        // création d'un objet Course (encodage pour la sécurité)
        $unNom = utf8_encode($uneLigne->nom);
        $unLieu = utf8_encode($uneLigne->lieu);
        $uneDate = utf8_encode($uneLigne->date);
        $uneHeureDepart = utf8_encode($uneLigne->heureDepart);
        $uneDistance = utf8_encode($uneLigne->distance);
        $unPrix = utf8_encode($uneLigne->prix);
        $unChallenge = utf8_encode($uneLigne->challenge);

        $uneCourse = new Course($unNom, $unLieu, $uneDate, $uneHeureDepart, $uneDistance, $unPrix, $unChallenge);

        return $uneCourse;
    }

    public function getResultat()
    {

    $tabResultats = array();

    $txt_req = "SELECT nomCourse, nomCoureur, prenomCoureur, place, temps ";
    $txt_req .= "FROM courir ";
    $txt_req .= "ORDER BY nomCourse, place";

    $req = $this->cnx->prepare($txt_req);

    $req->execute();

    while ($uneLigne = $req->fetch(PDO::FETCH_OBJ)) {
        $result = new Resultat(utf8_encode($uneLigne->nomCourse),
                               utf8_encode($uneLigne->nomCoureur),
                               utf8_encode($uneLigne->prenomCoureur),
                               utf8_encode($uneLigne->place),
                               utf8_encode($uneLigne->temps));
        $tabResultats[] = $result;
    }
    return $tabResultats;
    }

    public function getResultatParCourse(string $pnomCourse)
    {

    $tabResultats = array();

    $txt_req = "SELECT nomCourse, nomCoureur, prenomCoureur, place, temps ";
    $txt_req .= "FROM courir ";
    $txt_req .= "WHERE nomCourse = :nomCourse ";
    $txt_req .= "ORDER BY place";

    $req = $this->cnx->prepare($txt_req);

    $req->bindValue("nomCourse", utf8_encode($pnomCourse), PDO::PARAM_STR);

    $req->execute();

    while ($uneLigne = $req->fetch(PDO::FETCH_OBJ)) {
        $result = new Resultat(utf8_encode($uneLigne->nomCourse),
                               utf8_encode($uneLigne->nomCoureur),
                               utf8_encode($uneLigne->prenomCoureur),
                               utf8_encode($uneLigne->place),
                               utf8_encode($uneLigne->temps));
        $tabResultats[] = $result;
    }
    return $tabResultats;
    }

}