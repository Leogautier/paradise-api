<?php

namespace Tools;

use ErrorException;
use Services\DatabaseService;
use Helpers\HttpRequest;
use Exception;

class Initializer
{
    /**
     * Génère la classe Schemas\Table (crée le fichier)
     * qui liste toutes les tables en base de données
     * sous forme de constante
     * Renvoie la liste des tables sous forme de tableau
     * Si $isForce vaut false et que la classe existe déjà, elle n'est pas réécrite
     * Si $isForce vaut true, la classe est supprimée (si elle existe) et réécrite
     */
    public static function writeTableFile(bool $isForce = false): array
    {
        $tables = DatabaseService::getTables();
        $tableFile = "src/schemas/Table.php";
        if (file_exists($tableFile) && $isForce) {
            //???
           if( ! unlink($tableFile)){
             throw new ErrorException("non_okay");
        
        }

            //Supprimer le fichier s’il existe
            //Si la suppression ne fonctionne pas déclenche une Exception
        }
        if (!file_exists($tableFile)) {

            //???
            //Créer le fichier (voir exemple ci dessous)
            //Si l’écriture ne fonctionne pas déclenche une Exception
           $fileContent =" <?php namespace Schemas;\r\n\r\n"; 
           $fileContent.=" class Table {\r\n\r\n";

            foreach($tables as $table){
                $const = strtoupper($table);
                $fileContent.="\tconst $const ='$table';\r\n";
            
            }
            $fileContent.="\r\n\r\n}";
        
            file_put_contents($tableFile , $fileContent);
            
        }
        return $tables;
    }


    /**
* Exécute la méthode writeTableFile
* Renvoie true si l'exécution s'est bien passée, false sinon
*/
public static function start(HttpRequest $request) : bool
{
$isForce = count($request->route) > 1 && $request->route[1] == 'force';
try{
//??? 
Initializer::writeTableFile($isForce);

}
catch(Exception $e){
return false;
}
return true;
}

}

