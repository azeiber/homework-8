<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
        //in future these will come from the database

        $allPosts = [
            [
                'id' => '1',
                'title' => 'rosie'
            ],
            [
                'id' => '2',
                'title' => 'alexa'
            ],
        ];

        if (!empty($params['name'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                if ($user['title'] === $params['title']) {
                    return $user;
                };
                return null;
            });
        }

        return $allPosts;
    }

    public function savePosts() {
        //in future this will save a user to the database
    }
}