<?php

class Absence
{
    private   $semain,$cne,$nbr_abs;

    /**
     * @param $semain
     * @param $cne
     * @param $nbr_abs
     */
    public function __construct($semain, $cne, $nbr_abs)
    {
        $this->semain = $semain;
        $this->cne = $cne;
        $this->nbr_abs = $nbr_abs;
    }

    /**
     * @return mixed
     */
    public function getSemain()
    {
        return $this->semain;
    }

    /**
     * @param mixed $semain
     */
    public function setSemain($semain)
    {
        $this->semain = $semain;
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
    public function getNbrAbs()
    {
        return $this->nbr_abs;
    }

    /**
     * @param mixed $nbr_abs
     */
    public function setNbrAbs($nbr_abs)
    {
        $this->nbr_abs = $nbr_abs;
    }



}