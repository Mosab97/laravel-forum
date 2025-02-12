@extends('layouts.app')

@section('content')




    @foreach($discussions as $discussion )
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{Gravatar::src($discussion->author->email)}}"
                             style="border-radius: 50%; width: 40px;height: 40px" alt="gravatar img">
                        <strong class="ml-2">{{$discussion->author->name}}</strong>

                    </div><!-- end first flex item -->
                    <div class="div">
                        <a href="{{route('discussions.show',$discussion->slug)}}"
                           class="btn btn-success btn-sm">view</a>
                    </div>
                </div><!-- end flex items -->

            </div><!-- end card header -->

            <div class="card-body">
                {{$discussion->title}}
            </div><!--  end card body -->
        </div> <!-- enc card -->
    @endforeach

    {{$discussions->links()}}
@endsection
