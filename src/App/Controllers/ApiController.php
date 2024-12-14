<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;
use PDOException;

class ApiController extends Controller
{
    public function index()
    {
        try {
            return $this->json([
                'status' => 'success',
                'message' => 'Hello World!'
            ]);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getUser($id = 1)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch();
                return $this->json([
                    'status' => 'success',
                    'data' => $user
                ]);
            }

            return $this->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage()
            ], 500);
        }
    }
}