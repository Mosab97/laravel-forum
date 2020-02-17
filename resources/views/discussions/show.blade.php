@extends('layouts.app')

@section('content')


    <div class="card">
       @include('partials.discussion-header')
        <div class="card-body">
            <div class="text-center">
           <strong>{{$discussion->title}}</strong>
            </div>
            <hr>
            {!! $discussion->content !!}
        </div><!--  end card body -->
    </div> <!-- enc card -->

    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">

             @auth

                <form method="post" action="{{route('replies.store',$discussion->slug)}}">
                    @csrf
                    <input id="reply" type="hidden" name="reply">
                    <trix-editor input="reply"></trix-editor>

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
