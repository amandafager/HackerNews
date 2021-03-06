<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['post_id'], $_POST['comment_id'])) {
    $postId = $_POST['post_id'];
    $commentId = $_POST['comment_id'];

    deleteCommentLikes($pdo, (int)$commentId);
    deleteCommentAndAllChildren($pdo, $commentId);

    $_SESSION['success'] = "Your comment has been deleted.";
    redirect('../../comments.php?id=' . $postId);
}

if (isset($_POST['id'])) {
    $postId = $_POST['id'];
    $userId = $_SESSION['user']['id'];
    $username = $_SESSION['user']['username'];

    deletePostAndAlldataConected($pdo, $postId, (int)$userId);

    redirect('/../../profile.php?username=' . $username);
}
