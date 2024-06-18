<?php
include_once(__DIR__ . '/../Models/User.php'); // Include your User model file
use Models\Book;

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch list of books
$books = Book::getAllBooks(); // Assuming you have a method to fetch all books in your Book model
?>
<?php include_once("header.php"); ?>


                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Books</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Title</th>
                <th>Author</th>
                <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Title</th>
                <th>Author</th>
                <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                        // Assuming $result variable is defined elsewhere and holds book data
                        if (isset($books) && !empty($books)) {
                            foreach($books as $book) {
                                echo "<tr>";
                                echo "<td>" . $book["Title"] . "</td>";
                                echo "<td>" . $book["Author"] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-primary btn-sm' onclick='openCreateModal(" . $book["Book_id"] . ")'>Create</button> ";
                                echo "<button class='btn btn-info btn-sm' onclick='openReadModal(" . $book["Book_id"] . ")'>Read</button> ";
                                echo "<button class='btn btn-warning btn-sm' onclick='openUpdateModal(" . $book["Book_id"] . ")'>Update</button> ";
                                echo "<button class='btn btn-danger btn-sm' onclick='deleteReview(" . $book["Book_id"] . ")'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No books found</td></tr>";
                        }
                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="createModalBody">
                <!-- Content loaded dynamically via AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- Read Review Modal -->
<div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="readModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readModalLabel">Read Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="readModalBody">
                <!-- Reviews will be displayed here -->
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="updateModalBody">
                <!-- Content loaded dynamically via AJAX -->
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteModalBody">
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>