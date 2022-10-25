<?php

namespace Controllers;

use Services\DatabaseService;
use Helpers\HttpRequest;
use LDAP\Result;

class DatabaseController
{

    private string $table;
    private string $pk;
    private ?string $id;
    private array $body;
    private string $action;

    public function __construct(HttpRequest $request)
    {
        $this->table = $request->route[0];
        $this->pk = "Id_" . $this->table;
        $this->id = $request->route[1];
        $request_body = file_get_contents('php://input');
        $this->body = json_decode($request_body, true) ?: [];
        $this->action = $request->method;
    }

    /**
     * Retourne le résultat de la méthode ($action) exécutée
     */
    public function execute(): ?array
    {
        $result = self::get();
        return $result;
    }
    /**
     * Action exécutée lors d'un GET
     * Retourne le résultat du selectWhere de DatabaseService
     * soit sous forme d'un tableau contenant toutes le lignes (si pas d'id)
     * soit sous forme du tableau associatif correspondant à une ligne (si id)
     */
    private function get(): ?array
    {
        $dbs = new DatabaseService($this->table);
        if(!isset($this->id)){
            return $dbs->selectWhere();        }
     return $dbs->selectWhere("$this->pk = ?", [$this->id]);
    }
}
?>
