<?php


namespace App\Libraries;


class Post
{

    /*public function getPost(array $params = [])
    {
        return view('incs/post', ['post' => $params['post']]);
    }*/

    public function getPost($post)
    {
        return view('incs/post', ['post' => $post]);
    }

    public function getOnePost($post)
    {
        return view('incs/one_post', ['post' => $post]);
    }

    public function lastPosts(int $limit)
    {
        $data = ['Post 1', 'Post 2', 'Post 3', 'Post 4', 'Post 5',];
        return view('incs/last_posts', ['posts' => array_slice($data, 0, $limit)]);
    }

}