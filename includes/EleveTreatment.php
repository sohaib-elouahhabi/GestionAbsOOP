<?php
include_once "DataAccess.php";
require "Eleve.php";
class EleveTreatment
{
static function InsertEleve(Eleve $insert){
    $req="insert into eleve (cne,nom,prenom,groupe) values('{$insert->getCne()}','{$insert->getNom()}','{$insert->getPrenom()}','{$insert->getPrenom()}')";
    $r=Dataaccess::update($req);
    return $r;
}
static function display(){
    $req="select * from eleve";
    $cur=Dataaccess::selection($req);
    return $cur;
}
static function Update($data){

    $req="update eleve set nom='{$data['nom']}',prenom='{$data['prenom']}',groupe='{$data['groupe']}' where cne='{$data['cne']}'";
    $r=Dataaccess::update($req);
    return $r;
}
static function delete($id){
    $req="delete  from eleve where cne='$id'";
    $r=Dataaccess::update($req);
    return $r;
}
static function search($id){
    $req="select * from eleve where cne='$id'";
    $r=Dataaccess::selection($req);
    return $r;
}
}