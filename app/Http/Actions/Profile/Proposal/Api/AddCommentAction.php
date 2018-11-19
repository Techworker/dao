<?php

namespace App\Http\Actions\Proposal\Api;

use App\Comment;
use App\Http\AbstractAction;
use App\Proposal;

class AddCommentAction extends AbstractAction
{
    public function __invoke(\App\Http\Requests\Comment $request, Proposal $proposal) {
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->proposal_id = $proposal->id;
        $comment->description = $request->get('description');
        $comment->save();

        return response()->json(['success' => true]);
    }
}