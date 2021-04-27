<?php
namespace App\Http\Services;

use App\Models\Comment;

class CommentService
{

    public function getAllComments() {

        $comments = Comment::all()->groupBy("parent_id");

        if (count($comments) > 0) {

            $comments['root_node'] = $comments[""];

            unset($comments[""]);
        }

        if (! $comments) {
            throw new \Exception("Unable to retrieve comments", 404);
        }

        return $comments;

    }

    public function createNewComment($request)
    {
        $request->validated();

        $newComment = Comment::create($request->toArray());

        if (! $newComment) {
            throw new \Exception("Unable to add comment.", 500);
        }

        return $newComment;
    }
}
