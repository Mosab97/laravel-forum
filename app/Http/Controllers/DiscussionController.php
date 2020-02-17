<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateDiscussionReqeust;
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
        return view('discussions.show',[
            'discussion'=>$discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
