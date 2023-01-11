<?php

class Eleve
{
 private  $cne,$nom,$prenom,$groupe;

    /**
     * @param $cne
     * @param $nom
     * @param $prenom
     * @param $groupe
     */
    public function __construct($cne, $nom, $prenom, $groupe)
    {
        $this->cne = $cne;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->groupe = $groupe;
    }

    /**
     * @return mixed
     */
    public function getCne()
    {
        return $this->cne;
    }

    /**
     * @param mixed $cne
     */
    public function setCne($cne)
    {
        $this->cne = $cne;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }


}