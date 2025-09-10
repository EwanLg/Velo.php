<?php
class Course
{
    /**
    * Nom de la course
    * @var string
    */
   private $nom;
   /**
    * Lieu de la course
    * @var string
    */
   private $lieu;
   /**
    * Date de départ de la course
    * @var date
    */
   private $dateDepart;
   /**
    * Heure de départ de la course
    * @var time
    */
   private $heureDepart;
   /**
    * Distance de la course
    * @var float
    */
   private $distance;
   /**
    * Cout de l'inscription à la course
    * @var int
    */
   private $prix;
   /**
    * Cette course participe-t-elle au challenge ?
    * @var boolean
    */
   private $challenge;
   
   function __construct($nom, $lieu, $dateDepart, $heureDepart, $distance, $prix, $challenge)
   {
       $this->nom = $nom;
       $this->lieu = $lieu;
       $this->dateDepart = $dateDepart;
       $this->heureDepart = $heureDepart;
       $this->distance = $distance;
       $this->prix = $prix;
       $this->challenge = $challenge;
   }
   
   // Les fonctions sont publiques par défaut
   function getNom(): string
   {
       return $this->nom;
   }
   function getLieu(): string
   {
       return $this->lieu;
   }
   function getDateDepart(): date
   {
       return $this->dateDepart;
   }
   function getHeureDepart(): time
   {
       return $this->heureDepart;
   }
   function getDistance(): float
   {
       return $this->distance;
   }
   function getPrix(): int
   {
       return $this->prix;
   }
   function getChallenge(): bool
   {
       return $this->challenge;
   }

   function setNom(string $nom): void
   {
       $this->nom = $nom;
   }
   function setLieu(string $lieu): void
   {
       $this->lieu = $lieu;
   }
   function setDateDepart(date $dateDepart): void
   {
       $this->dateDepart = $dateDepart;
   }
   function setHeureDepart(time $heureDepart): void
   {
       $this->heureDepart = $heureDepart;
   }
   function setDistance(float $distance): void
   {
       $this->distance = $distance;
   }
   function setPrix(int $prix): void
   {
       $this->prix = $prix;
   }
   function setChallenge(bool $challenge): void
   {
       $this->challenge = $challenge;
   }
}
// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!