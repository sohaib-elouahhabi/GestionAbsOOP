<?php
include_once "DataAccess.php";
require "Absence.php";

class AbsenceTreatment
{
    static function AfficherAbsEleve($id){
        $req = "SELECT semain, nbr_abs from absence c  where c.cne ='$id'  order by nbr_abs";
        $r=Dataaccess::selection($req);
        return $r;
    }
    static function AfficherAbs($semaine,$id){
        $req="select * from absence c where semain=$semaine and cne=$id";
        $r=Dataaccess::selection($req);
        return $r;
    }
    static function Afficher(){
        $req = "SELECT * from absence  order by cne";
        $r=Dataaccess::selection($req);
        return $r;
    }
    static function delete($id,$semaine){
        $req="delete from absence where cne='$id' and semain='$semaine'";
        $r=Dataaccess::update($req);
        return $r;
    }
    static function search($semaine){
        $req="select c.cne ,c.nbr_abs, e.nom,e.prenom from absence c ,eleve e where  e.cne=c.cne and semain='$semaine' order by cne ";
        $cur=Dataaccess::selection($req);
        return $cur;
    }
    static function add(Absence $insert)
    {
        $req="insert into absence(semain,cne,nbr_abs) values('{$insert->getSemain()}','{$insert->getCne()}','{$insert->getNbrAbs()}')";
        $r=Dataaccess::update($req);
        return $r;
    }
    static function edit($data)
    {
        $req="update absence set nbr_abs='{$data['nbr_abs']}' where semain= '{$data['semain']}' and cne='{$data['cne']}'";
        $r=Dataaccess::update($req);
        return $r;
    }

}