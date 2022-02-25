<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\AddNewComment;
use Illuminate\Http\Request;

use App\Http\Requests\Comment\CreateRequest;


class ApiCommentControler extends Controller
{
    public function store (CreateRequest $request){
        AddNewComment::dispatch($request['subject'], $request['body'], $request['article_id']);
        return response()->json([
            'status' => 'success'
        ], 201);
    }
}
