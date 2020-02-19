@extends('layouts.app')

@section('content')


    <div class="card">
       @include('partials.discussion-header')
        <div class="card-body">
            <div class="text-center">
           <strong>{{$discussion->title}}</strong>
            </div>
            <hr>
{{--            {!! $discussion->content !!}--}}
        </div><!--  end card body -->
    </div> <!-- end card -->

{{--    here's a list of replies for our discussion--}}
@foreach($discussion->replies()->paginate(3) as $reply )
<div class="card my-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <img width="40px" height="40px" style="border-radius: 50%;" src="{{Gravatar::src($reply->owner->email)}}" alt="Gravatar">
                <span>{{$reply->owner->name}}</span>

            </div>

        </div>
    </div><!-- end of card header -->

    <div class="card-body">
        {!! $reply->content !!}
    </div>
</div><!-- end of card  -->
@endforeach
{{$discussion->replies()->paginate(3)->links()}}

    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">

             @auth

                <form method="post" action="{{route('replies.store',$discussion->slug)}}">
                    @csrf
                    <input id="content" type="hidden" name="content" >
                    <trix-editor input="content" ></trix-editor>

                    <button type="submit" class="btn btn-success my-2">Add Reply</button>
                </form><!-- end form -->
              @else
                <a href="{{route('login')}}" class="btn btn-info">sign in to add a reply</a>
              @endauth
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('js')
    <script src=https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
