<?php
require_once APP_ROOT . '/app/services/AuthorService.php';
require_once APP_ROOT . '/app/services/ArticleService.php';
require_once APP_ROOT . '/app/services/CategoryService.php';
require_once APP_ROOT . '/app/services/UserService.php';
class AdminController
{
    public function index()
    {
        $articleService = new ArticleService();
        $article = $articleService->getCount();
        $authorService = new AuthorService();
        $author = $authorService->getCount();
        $categoryService = new CategoryService();
        $category = $categoryService->getCount();
        $userService = new UserService();
        $user = $userService->getCount();
        include APP_ROOT . '/app/views/admin/index.php';
    }
    public function category($key)
    {
        $categoryService = new CategoryService();
        $categorys = $categoryService->getByCategoryCount($key);
        $categoryService = new CategoryService();
        $count = $categoryService->getCount();
        $key;
        include APP_ROOT . '/app/views/admin/category.php';
    }
    public function add_category()
    {
        $check_add = "";
        include APP_ROOT . '/app/views/admin/add_category.php';
    }
    public function category_add($ten_tloai)
    {
        $categoryService = new CategoryService();
        $check_add = $categoryService->addCategory($ten_tloai);
        if ($check_add == 'true') {
            $categoryService = new CategoryService();
            $categorys = $categoryService->getByCategoryCount(1);
            $categoryService = new CategoryService();
            $count = $categoryService->getCount();
            $key=1;
            include APP_ROOT . '/app/views/admin/category.php';
        } else {
            include APP_ROOT . '/app/views/admin/add_category.php';
        }
    }
    public function edit_category($id){
        $category_id = $id;
        $check_edit= "";
        include APP_ROOT . '/app/views/admin/edit_category.php';
    }
    public function category_edit($id, $ten_tloai){
        $categoryService = new CategoryService();
        $check_edit = $categoryService->editCategory($id,$ten_tloai);
        $category_id = $id;
        if ($check_edit == 'true') {
            $categoryService = new CategoryService();
            $categorys = $categoryService->getByCategoryCount(1);
            $categoryService = new CategoryService();
            $count = $categoryService->getCount();
            $key=1;
            include APP_ROOT . '/app/views/admin/category.php';
        } else {
            include APP_ROOT . '/app/views/admin/edit_category.php';
        }
    }
    public function delete_category($id){
        $categoryService = new CategoryService();
        $check_delete = $categoryService->deleteCategory($id);
        $category_id = $id;
        if ($check_delete == 'true') {
            $categoryService = new CategoryService();
            $categorys = $categoryService->getByCategoryCount(1);
            $categoryService = new CategoryService();
            $count = $categoryService->getCount();
            $key=1;
            include APP_ROOT . '/app/views/admin/category.php';
        } else {
            $categoryService = new CategoryService();
            $categorys = $categoryService->getByCategoryCount(1);
            $categoryService = new CategoryService();
            $count = $categoryService->getCount();
            $key=1;
            include APP_ROOT . '/app/views/admin/category.php';
        }
    }
    public function author($key)
    {
        $authorService = new AuthorService();
        $authors = $authorService->getByAuthorCount($key);
        $authorService = new AuthorService();
        $count = $authorService->getCount();
        $key;
        include APP_ROOT . '/app/views/admin/author.php';
    }
    public function add_author()
    {
        $check_add = "";
        include APP_ROOT . '/app/views/admin/add_author.php';
    }
    public function author_add($ten_tgia){
        $authorService = new AuthorService();
        $check_add = $authorService->addAuthor($ten_tgia);
        if ($check_add == 'true') {
            $authorService = new AuthorService();
            $authors = $authorService->getByAuthorCount(1);
            $authorService = new AuthorService();
            $count = $authorService->getCount();
            $key=1;
            include APP_ROOT . '/app/views/admin/author.php';
        } else {
            include APP_ROOT . '/app/views/admin/add_author.php';
        }
    }
}