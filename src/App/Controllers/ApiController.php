<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;
use KobeniFramework\Database\Kobeni;
use PDOException;

class ApiController extends Controller
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
            $data = $this->getRequestData();

            $stmt = $this->db->prepare("
                INSERT INTO example (name) 
                VALUES (?)
            ");

            $stmt->execute([$data['name']]);

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
                $data['name'],
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
        try{
            $db = new Kobeni();

            $data = $this->getRequestData();

            $user = $db->update('role' ,['id' => '359f3a55-bbfc-11ef-8a05-54bf649bdd45 '], [
                'description' => $data['descrip']
            ],['return' => true]);
        
            return $this->json($user);
        }catch(PDOException $e){
            return $this->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}


// $user = $db->findMany(
//     'role',
//     [], ///// this just my condition param
//     [
//         'select' => [
//             'id',
//             'name',
//             'description'
//         ],
//         'include' => [
//             'user' => [
//                 'select' => [
//                     'id',
//                     'name',
//                     'email',
//                     'role_id'
//                 ],
//                 'include' => [
//                     'post' => [
//                         'where' => [
//                             'OR' => [
//                                 ['id' => '77ec9414-bbda-11ef-8a05-54bf649bdd45']
//                             ]
//                         ],
//                         'select' => [
//                             'id',
//                             'title',
//                             'content',
//                             'user_id',
//                             'published_at'
//                         ]
//                     ] 
//                 ]
//             ]
//         ]
//     ]
// );

// $user = $db->findUnique(
//     'role',
//     ['id' => $id],
//     [
//         'select' => [
//             'id',
//             'name',
//             'description'
//         ],
//         'include' => [
//             'user' => [
//                 'select' => [
//                     'id',
//                     'name',
//                     'email',
//                     'role_id'
//                 ],
//                 'include' => [
//                     'post' => [
//                         'select' => [
//                             'id',
//                             'title',
//                             'content',
//                             'user_id',
//                             'published_at'
//                         ]
//                     ] 
//                 ]
//             ]
//         ]
//     ]
// );