<?php

namespace App\Controllers;

use Exception;
use KobeniFramework\Controllers\Controller;
use PDOException;

class WebController extends Controller
{
    public function index()
    {
        try {
            $examples = $this->db->query("SELECT * FROM example ORDER BY created_at DESC");

            return $this->view('examples/index', [
                'examples' => $examples
            ]);
        } catch (PDOException $e) {
            return $this->view('error', [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function create()
    {
        return $this->view('examples/create');
    }

    public function store()
    {
        try {
            $data = $this->getRequestData();

            if (empty($data['name'])) {
                throw new Exception('Name is required');
            }

            $stmt = $this->db->prepare("INSERT INTO example (name) VALUES (?)");

            $stmt->execute([$data['name']]);

            $message = urlencode('Record created successfully');
            $this->redirect("/examples?message=$message");
        } catch (PDOException $e) {
            return $this->view('examples/create', [
                'error' => $e->getMessage(),
                'old' => $data 
            ]);
        } catch (Exception $e) {
            return $this->view('examples/create', [
                'error' => $e->getMessage(),
                'old' => $data
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM example WHERE id = ?");

            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                $example = $stmt->fetch();
                return $this->view('examples/edit', [
                    'example' => $example
                ]);
            }

            $this->redirect('/examples?error=Record not found');
        } catch (PDOException $e) {
            return $this->view('error', [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update($id)
    {
        try {
            $data = $this->getRequestData();

            $stmt = $this->db->prepare("UPDATE example SET name = ? WHERE id = ?");

            $stmt->execute([$data['name'] , $id]);

            if ($stmt->rowCount() > 0) {
                $this->redirect('/examples?message=Record updated successfully');
            }

            $this->redirect('/examples?error=Record not found');
        } catch (PDOException $e) {
            return $this->view('examples/edit', [
                'error' => $e->getMessage(),
                'example' => $data
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM example WHERE id = ?");

            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                $this->redirect('/examples?message=Record deleted successfully');
            }

            $this->redirect('/examples?error=Record not found');
        } catch (PDOException $e) {
            $this->redirect('/examples?error=' . urlencode($e->getMessage()));
        }
    }

    public function comp(){
        return $this->view('component');
    }
}
