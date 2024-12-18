<?php

namespace App\Controllers;

use Exception;
use KobeniFramework\Cache\Caching;
use KobeniFramework\Log\Log;
use KobeniFramework\Validation\Exceptions\ValidationException;
use KobeniFramework\Validation\Validator;
use PDOException;

class ApiController extends MainController
{
    public function index()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT 
                    id, 
                    name, 
                    created_at,
                    updated_at 
                FROM example 
                ORDER BY created_at DESC
            ");
            $stmt->execute();

            $examples = $stmt->fetchAll();

            return $this->json([
                'status' => 'success',
                'data' => $examples
            ]);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT 
                    id, 
                    name, 
                    created_at,
                    updated_at 
                FROM example 
                WHERE id = ?
            ");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                $example = $stmt->fetch();
                return $this->json([
                    'status' => 'success',
                    'data' => $example
                ]);
            }

            return $this->json([
                'status' => 'error',
                'message' => 'Record not found'
            ], 404);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store()
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO example (name) 
                VALUES (?)
            ");

            $stmt->execute([$this->req['name']]);

            $row = $stmt->fetch();

            return $this->json([
                'data' => $row
            ]);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update($id)
    {
        try {
            $data = $this->getRequestData();

            $stmt = $this->db->prepare("
                UPDATE example 
                SET name = ?,
                    updated_at = CURRENT_TIMESTAMP
                WHERE id = ?
            ");

            $stmt->execute([
                $this->req['name'],
                $id
            ]);

            if ($stmt->rowCount() > 0) {
                return $this->show($id);
            }

            return $this->json([
                'status' => 'error',
                'message' => 'Record not found'
            ], 404);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("
                DELETE FROM example 
                WHERE id = ?
            ");

            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                return $this->json([
                    'status' => 'success',
                    'message' => 'Record deleted successfully'
                ]);
            }

            return $this->json([
                'status' => 'error',
                'message' => 'Record not found'
            ], 404);
        } catch (PDOException $e) {
            return $this->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function test()
    {
        return $this->json([
            'message' => 'Test route works!'
        ]);
    }

    public function testing()
    {
        try {
            $validator = Validator::make($this->req);

            if(!$validator->validate([
                'name' => required()->string()->min(3)->max(255)->unique('role'),
                'descrip' => optional()->string()->max(1000)
            ])){
                throw new ValidationException($validator->getErrors());
            }

            $user = $this->kobeni->create('role', [
                'name' => $this->req->name,
                'description' => $this->req['descrip']
            ], ['return' => true]);

            // Caching::remember('roles', 3600, function () use ($user) {
            //     return $user;
            // });

            Log::info('something happend! bro');
            return $this->json([
                'status' => true,
                'message' => 'success',
                'data' => $user
            ]);
        } catch (ValidationException $e) {
            return $this->json([
                'status' => false,
                'errors' => $e->getErrors()
            ], 422);
        } catch (Exception $e) {
            return $this->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}