<?php

namespace App\Controllers;

use KobeniFramework\Routing\Router;
use PDO;
use Exception;

class ApiController
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = (new Router())->connectDatabase();
    }

    public function getUser()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM users WHERE id = 1");
            if ($stmt->rowCount() > 0) {
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($users);
            } else {
                return json_encode(["message" => "No users found"]);
            }
        } catch (Exception $e) {
            return json_encode(["error" => "Database query failed: " . $e->getMessage()]);
        }
    }
}
