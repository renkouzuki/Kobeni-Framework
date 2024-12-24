<?php

namespace App\Controllers;

use Exception;
use KobeniFramework\Auth\Exceptions\AuthenticationException;

class AuthController extends KobeniController
{

    public function register()
    {
        try {
            $data = $this->validate([
                'name' => required()->string()->min(3)->max(255),
                'email' => required()->string()->email()->max(255)->unique('user'),
                'password' => required()->string()->min(8)->max(255)
            ]);

            $this->kobeni->create('user', [
                'name' => $data->name,
                'email' => $data->email,
                'password' => password_hash($data->password, PASSWORD_BCRYPT),
            ]);
            
            $result = $this->auth->attempt([
                'email' => $data->email,
                'password' => $data->password
            ]);

            return $this->response($result);
        } catch (Exception $e) {
            return $this->error($e->getCode(), $e->getMessage());
        }
    }

    public function login()
    {
        try {
            $data = $this->validate([
                'email' => required()->string()->email(),
                'password' => required()->string()
            ]);

            $result = $this->auth->attempt([
                'email' => $data->email,
                'password' => $data->password
            ]);

            return $this->response($result);
        } catch (Exception $e) {
            return $this->error($e->getCode(), $e->getMessage());
        }
    }

    public function user()
    {
        try {
            if (!$this->auth->check()) {
                throw new AuthenticationException('Unauthenticated');
            }

            $user = $this->auth->user();

            unset($user['password']);

            return $this->response($user);
        } catch (Exception $e) {
            return $this->error($e->getCode(), $e->getMessage());
        }
    }

    public function logout()
    {
        try {
            $this->auth->logout();
            return $this->response(['message' => 'Successfully logged out']);
        } catch (Exception $e) {
            return $this->error($e->getCode(), $e->getMessage());
        }
    }
}
