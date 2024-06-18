<?php

namespace Controllers;

use Models\Review;

class ReviewController
{
    public function create($requestMethod)
    {
        $action = 'create';

        // Determine the request method from the parameters
        // $requestMethod = $_REQUEST['request_method'] ?? 'GET';

        if ($requestMethod === "GET" && isset($_GET['book_id'])) {
          $book_id = $_GET['book_id'];
          $user_id = $_SESSION['user_id']?? null;

          if(!$user_id){
            echo "User ID not found in session.";
          }

          $reviewExists = Review::checkExistingReview($user_id, $book_id);
            if ($reviewExists) {
                echo "Review already exists. Please update it.";
                exit;
            }
       }

        if ($requestMethod === "POST") {
            $book_id = $_POST['book_id'];
            $user_id = $_SESSION['user_id'] ?? null;
            $rating = $_POST['rating'];
            $review = $_POST['review'];  
         
            $insertResult = Review::insertReview($user_id, $book_id, $rating, $review);
            if ($insertResult) {
                    echo "success";
                } else {
                     echo "error";
                 }
                exit();
        }
        include __DIR__ . '/../Views/review.php';
    }

    public function read($book_id)
    {
        $action = 'read';
        $reviews = Review::getReviewsByBookId($book_id);
        include __DIR__ . '/../Views/review.php';
    }

    public function update($book_id,$requestMethod)
    {
        $action="update";
        // if (!isset($_SESSION['user_id'])) {
        //     header("Location: login.php");
        //     exit();
        // }
        //  $requestMethod = $_REQUEST['request_method'] ?? 'GET';

        if ($requestMethod === "GET" && isset($_GET['book_id'])) {
          $book_id = $_GET['book_id'];
          $user_id = $_SESSION['user_id']?? null;

          if(!$user_id){
            echo "User ID not found in session.";
          }

          $reviewExists = Review::checkExistingReview($user_id, $book_id);
            if (!$reviewExists) {
                echo "Review doesn't exist. Please create it.";
                exit;
            }
       }

        if ($requestMethod === "POST") {
            $user_id = $_SESSION['user_id'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];

            $updateResult = Review::updateReview($user_id, $book_id, $rating, $review);
            // if ($updateResult) {
            //     header('Location: /BKS/public/index.php');
            //     exit();
            // } else {
            //     $error = "Error updating review.";
            // }
              if ($updateResult) {
                    echo 'success';
                } else {
                     echo "error";
                 }
                exit();
        }
        $review = Review::getReview($book_id, $_SESSION['user_id']);
        // Set default values if review is not found
         if (!$review) {
            $rating = null;
            $review = null;
         } else {
            // Extract rating and review from existing review
          $rating = $review['Rating'];
          $review = $review['Review'];
         }

        include __DIR__ . '/../Views/review.php';
    }

    public function delete($book_id)
    {
       
        $user_id = $_SESSION['user_id'];
        $deleteResult = Review::deleteReview($book_id, $user_id);
        if ($deleteResult) {
            echo json_encode(array('success' => 'Review deleted successfully.'));
            
        } else {
            echo json_encode(array('error' => 'Review not found.'));
        }
        exit();
    }
}
?>
