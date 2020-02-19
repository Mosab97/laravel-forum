<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateReplyRequest;
use App\Reply;
use App\User;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
       public function index()
           {

           }//end of index

           public function create()
           {
               //
           }//end of create


           public function store(CreateReplyRequest $request,Discussion $discussion)
           {
//               dd(55);
               Reply::create([
                       'content' => $request->content,
                   'discussion_id' => $discussion->id,
                   'user_id' => self::getAuthUser()->id,
               ]);
               session()->flash('success','Reply added.');
               return redirect()->back();
           }//end of store


           public function show($id)
           {
               //
           }//end of show


           public function edit($id)
           {
               //
           }//end of edit


           public function update(Request $request, $id)
           {
               //
           }//end of update


           public function destroy($id)
           {
               //
           }//end of destroy
}
