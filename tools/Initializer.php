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
            if (! unlink($tableFile)) {
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

            foreach ($tables as $table) {
                $const = strtoupper($table);
                $fileContent.="\tconst $const ='$table';\r\n";
            }
            $fileContent.="\r\n\r\n}";

            file_put_contents($tableFile, $fileContent);
        }
        return $tables;
    }


    /**
* Exécute la méthode writeTableFile
* Renvoie true si l'exécution s'est bien passée, false sinon
*/
public static function start(HttpRequest $request): bool
    {
        $isForce = count($request->route) > 1 && $request->route[1] == 'force';
        try {
            $writeTable = Initializer::writeTableFile($isForce);
            Initializer::writeSchemasFiles($writeTable, $isForce);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

/**
* Génère une classe schema (crée le fichier) pour chaque table présente dans $tables
* décrivant la structure de la table à l'aide de DatabaseService getSchema()
* Si $isForce vaut false et que la classe existe déjà, elle n'est pas réécrite
* Si $isForce vaut true, la classe est supprimée (si elle existe) et réécrite
*/
private static function writeSchemasFiles(array $tables, bool $isForce): void
{
    foreach ($tables as $table) {
        $className = ucfirst($table);
        $schemaFile = "src/Schemas/$className.php";
        if (file_exists($schemaFile) && $isForce) {
            //???
            //Supprimer le fichier s’il existe
            //Si la suppression ne fonctionne pas déclenche une Exception
            if (!unlink($schemaFile)) {
                throw new ErrorException("non_okay");
            }
        }
        if (!file_exists($schemaFile)) {
            //???
            //Créer le fichier (voir exemple ci dessous)
            //Si l’écriture ne fonctionne pas déclenche une Exception
            $dbs = new DatabaseService($table);
            $schemas = $dbs->getSchema();

            $fileContent = "<?php namespace Schema:\r\n\r\n";
            $fileContent .= "class $className {";
            $fileContent .= "const Columns {";
            // foreach ($variable as $key => $value) {
            // }
            $bp = true;
            $fileContent .= "}";
            $fileContent .= "}";
            file_put_contents($schemaFile, $fileContent);
        }
    }
}
}
?>