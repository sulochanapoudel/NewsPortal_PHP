<?php


namespace App\Controllers;


use App\Models\Comment;
use System\Core\BaseController;

class CommentsController extends BaseController
{
public function __construct()
{
    auth(url('login'));
}
public function index()
{
    $paginate = (new Comment)->orderBy('created_at', 'DESC')->paginate();

    $comments = $paginate['data'];

    view('cms/comments/index.php', compact('comments', 'paginate'));
}

public function destroy($id)
{
    $comment = new Comment($id);
    $comment->delete();

    set_message('Comment removed.', 'success');

    redirect(url('comments'));
}
}