<?php
class Dataaccess {
    //1-methode connection
    public static  function connection()
    {
        try  {
            $bdd = new PDO('mysql:host=localhost;dbname=gestion_abs;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            return $bdd;
        }
        catch (Exception $e)
        {
            echo('Erreur : ' . $e->getMessage());
        }
    }

//2-Methode update
    public static function update($req)
    {
        try  {
            $bdd= Dataaccess::connection() ;
            $maj=$bdd->exec($req);
            return $maj;
        }
        catch (Exception $e)
        {
            echo('Erreur : ' . $e->getMessage());
        }  $bdd=null;
    }

//3-Methode selection

    public static function selection($req)
    {
        try{
            $bdd=self::connection() ;
            $rep=$bdd->query($req);
            return $rep ;
        }
        catch (Exception $e)
        {
            echo('Erreur : ' . $e->getMessage());
        }  $bdd=null;
    }
}
?>