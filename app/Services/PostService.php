<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class PostService
{

    static public function getAll()
    {
       return PostRepository::all();
    }
    static public function getAllWithUsers()
    {
        $data['posts'] = PostRepository::all();
        $data['users'] = UserService::getAll();

        return (object) $data;
    }

    static public function getById($id)
    {
        return PostRepository::findById($id);
    }

    static public function getByUser($id)
    {
        return PostRepository::findByUser($id);
    }

    static public function getPreviousPost($id)
    {
        $previousId = PostRepository::findPreviousPost($id);

        return PostRepository::findById($previousId);
    }

    static public function getNextPost($id)
    {
        $nextId = PostRepository::findNextPost($id);

        return  PostRepository::findById($nextId);
    }

    static public function getAllAboutSinglePost($slug)
    {

        $id = extract_id_from_slug($slug);

        $data['post'] = self::getById($id);
        $data['posts'] = self::getAll();
        $data['previous'] = self::getPreviousPost($id);
        $data['next'] = self::getNextPost($id);

        return (object) $data;
    }

    static public function getByCategoryName($name)
    {
        $categoryId = CategoryService::getByName($name);

        $data['posts'] = PostRepository::findByCategory($categoryId);
        $data['users'] = UserService::getAll();

        return (object) $data;
    }

}
