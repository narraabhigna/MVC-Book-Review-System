<?php

namespace Models;

require __DIR__ . '/../../config/database.php';

class Book
{
    public static function getAllBooks()
    {
        global $connection;
        
        // Query to fetch all books
        $sql = "SELECT * FROM books";
        $result = mysqli_query($connection, $sql);

        $books = [];

        // Fetch each row as an associative array
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }

        // Free result set
        mysqli_free_result($result);

        return $books;
    }
}

?>