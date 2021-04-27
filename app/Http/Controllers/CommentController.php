<?php

namespace App\Http\Controllers;

use App\Http\Services\CommentService;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        try {

            $comments = (new CommentService)->getAllComments();

        } catch (\Exception $e) {

            return response(['message' => $e->getMessage(), 'code' => $e->getCode()], 422);

        }

        return response(
            [
                'message' => 'Successfully retrieve all comments.',
                'comments' => $comments,
                'error' => false,
            ],
            201
        );
    }

    public function store(CommentFormRequest $request)
    {
        try {

            $newComment = (new CommentService)->createNewComment($request);

        } catch (\Exception $e) {

            return response(['message' => $e->getMessage(), 'code' => $e->getCode()], 422);

        }

        return response(
            [
                'message' => 'Successfully added new comment.',
                'comments' => $newComment,
                'error' => false,
            ],
            201
        );
    }
}
