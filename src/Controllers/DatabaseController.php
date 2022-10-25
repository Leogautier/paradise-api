<?php

namespace Controllers;

use Services\DatabaseService;
use Helpers\HttpRequest;

class DatabaseController
{
    private string $table;
    private string $pk;
    private ?string $id;
    private array $body;
    private string $action;

    public function __construct(HttpRequest $request)
    {
        /* initialiser les 5 variables de la classe */
        $this->table = $request->route[0];
        $this->pk = "Id_" . $this->table;

        if (array_key_exists(1, $request->route)) {
            $this->id = $request->route[1];
        }

        $request_body = file_get_contents('php://input');
        $this->body = json_decode($request_body, true) ?: [];
        $this->action = $request->method;
    }

    public function execute(): ?array
    {
        $result = self::get();
        return $result;
    }


    private function get(): ?array
    {
        $dbs = new DatabaseService($this->table);
        if (!isset($this->id )) {
            return        $dbs->selectWhere();
        }
        return $dbs->selectWhere("$this->pk = ?", [$this->id]);
    }
}
?>