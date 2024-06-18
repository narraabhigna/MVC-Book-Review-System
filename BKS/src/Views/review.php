<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($action === 'create'): ?>
            <?php if (isset($reviewExists) && $reviewExists): ?>
                <p>Review already exists for this book. Go update it.</p>
            <?php else: ?>
                <form id="createReviewForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=create">
                    <input type="hidden" id="createBookId" name="book_id" value="<?php echo htmlspecialchars($_GET['book_id']); ?>">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            <?php endif; ?>
        <?php elseif ($action === 'read'): ?>
            <?php if (!empty($reviews)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Rating</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reviews as $review): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($review['User_id']); ?></td>
                                <td><?php echo htmlspecialchars($review['Rating']); ?></td>
                                <td><?php echo htmlspecialchars($review['Review']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No reviews found for this book.</p>
            <?php endif; ?>
        <?php elseif ($action === 'update') : ?>
            <?php if (empty($review)) : ?>
                <p>No review found for this book. Please add a review first.</p>
            <?php else : ?>
                <form id="updateReviewForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=update">
                    <input type="hidden" id="updateBookId" name="book_id" value="<?php echo htmlspecialchars($book_id); ?>">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" value="<?php echo htmlspecialchars($rating); ?>" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" required><?php echo htmlspecialchars($review); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Review</button>
                </form>
            <?php endif; ?>
         <?php endif; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>