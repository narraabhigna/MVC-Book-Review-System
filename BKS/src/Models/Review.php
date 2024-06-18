<?php

namespace Models;

class Review
{
    public static function insertReview($user_id, $book_id, $rating, $review)
    {
        global $connection;
        $stmt = $connection->prepare("INSERT INTO review (User_id, Book_id, Rating, Review) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siis', $user_id, $book_id, $rating, $review);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public static function checkExistingReview($user_id, $book_id)
    {
        global $connection;
        $stmt = $connection->prepare("SELECT * FROM review WHERE User_id = ? AND Book_id = ?");
        $stmt->bind_param('si', $user_id, $book_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $review = $result->fetch_assoc();
        $stmt->close();
        return $review;
    }

    public static function getReviewsByBookId($book_id)
    {
        global $connection;
        $stmt = $connection->prepare("SELECT * FROM review WHERE Book_id = ?");
        $stmt->bind_param('i', $book_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = [];
        while ($review = $result->fetch_assoc()) {
            $reviews[] = $review;
        }
        $stmt->close();
        return $reviews;
    }

    public static function getReview($book_id, $user_id)
    {
        global $connection;
        $stmt = $connection->prepare("SELECT * FROM review WHERE Book_id = ? AND User_id = ?");
        $stmt->bind_param('is', $book_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $review = $result->fetch_assoc();
        $stmt->close();
        return $review;
    }

    public static function updateReview($user_id, $book_id, $rating, $review)
    {
        global $connection;
        $stmt = $connection->prepare("UPDATE review SET Rating = ?, Review = ? WHERE User_id = ? AND Book_id = ?");
        $stmt->bind_param('issi', $rating, $review, $user_id, $book_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public static function deleteReview($book_id, $user_id)
    {
        global $connection;
        $stmt = $connection->prepare("DELETE FROM review WHERE Book_id = ? AND User_id = ?");
        $stmt->bind_param('is', $book_id, $user_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
