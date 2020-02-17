@extends('layouts.app')

@section('content')




    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">

            <form method="post" action="{{route('discussions.store')}}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div><!-- end title control -->

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>

                </div><!--  end content control -->

                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select name="channel" id="channel" class="form-control">
                        @foreach($channels as $channel )
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                        @endforeach
                    </select>
                </div> <!-- end channel select list -->
                <button type="submit" class="btn btn-success">create Discussion</button>
            </form> <!-- end form -->
        </div> <!-- end card body -->
    </div> <!-- end card -->
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('js')
    <script src=https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
