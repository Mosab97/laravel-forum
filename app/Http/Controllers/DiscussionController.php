<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateDiscussionReqeust;
use App\Reply;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth')->only('store', 'create');
    }

    public function index()
    {
        return view('discussions.index', [
            'discussions' => Discussion::paginate(2)
        ]);
    }


    public function create()
    {
        return view('discussions.create');
    }

    public function store(CreateDiscussionReqeust $request)
    {
        Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel,
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->title)

        ]);
        session()->flash('success', 'Discussion Created successfully.');
        return redirect(route('discussions.index'));
    }


    public function show(Discussion $discussion)
    {
        return view('discussions.show', [
            'discussion' => $discussion
        ]);
    }

    public function reply(Discussion $discussion,Reply $reply)
    {



        $discussion->markAsBestReply($reply);
        session()->flash('success','Marked as a best reply.');
        return redirect()->back();
    }//end of reply
}
