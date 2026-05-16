<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show Login Page
     * 
     * @return void
     */
    public function login()
    {
        \loadView('users/login');
    }

    /**
     * Show Create Page
     * 
     * @return void
     */
    public function create()
    {
        \loadView('users/create');
    }
    /**
     * Store user to db
     * 
     * @return void
     */

    public function store()
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['passwordConfirmation'];

        $errors = [];

        //Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be 2 and 50 characters';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 and 50 characters';
        }

        if (!Validation::match($password, $passwordConfirmation)) {
            $errors['passwordConfirmation'] = 'Password do not match';
        }

        if (!empty($errors)) {
            \loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state
                ]
            ]);
            exit;
        } else {
            \inspectAndDie('Store');
        }
    }
}
