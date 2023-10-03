<?php
require_once APP_ROOT . '/app/services/ArticleService.php';
require_once APP_ROOT . '/app/services/AuthorService.php';
require_once APP_ROOT . '/app/services/CategoryService.php';
class HomeController
{
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticleService();
        //Render du lieu lay duoc ra HomePage
        include APP_ROOT . '/app/views/home/index.php';
    }
    public function detail($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM baiviet 
            WHERE ma_bviet = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
            }
        }
        $articleService = new ArticleService();
        $article = $articleService->getByArticleId($result['ma_bviet']);
        $authorService = new AuthorService();
        $author = $authorService->getByAuthorId($result['ma_tgia']);
        $categoryService = new CategoryService();
        $category = $categoryService->getByCategoryId($result['ma_tloai']);
        //Render du lieu lay duoc ra HomePage
        include APP_ROOT . '/app/views/home/detail.php';
    }
}