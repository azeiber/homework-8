<?php

namespace app\controllers;
use app\models\Post;

class PostController
{
    public function getPosts() {
        $params = [
            //ternary shorthand, if left if true assign it, and if not assign right
            'title' => $_GET['title'] ?: null,
        ];
        $userModel = new Post();
        $users = $userModel->getAllUsersByName($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        //get post data from our form post
        $title = $_POST['title'] ?: null;
        $id = $_POST['id'] ?: null;
        $errors = [];

        //validate and sanitize name
        if ($title) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code
            $title = htmlspecialchars($title);

//            echo htmlspecialchars($name);

            //validate text length
            if (strlen($title) < 2) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }

        //numbers
        if ($age) {
            if ($age < 0 || $age > 120 || !intval($age)) {
                $errors['id'] = 'id is invalid';
            }
        } else {
            $errors['id'] = 'id is required';
        }

        //email via regular expressions
        if ($email) {
            //regex for valid email
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['email'] = 'email is invalid';
            }
        } else {
            $errors['email'] = 'email is required';
        }

        //if we have errors
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        //we could save the data off to be saved here

        $returnData = [
            'title' => $title,
            'id' => $id,
        ];
        echo json_encode($returnData);
        exit();

    }

}