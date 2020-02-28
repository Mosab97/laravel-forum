@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">Notifications</div>

        <div class="card-body">

         <ul class="list-group">
             @foreach($notifications as $notification)
                 <li class="list-group-item">
                     @if($notification->type === 'App\Notifications\NewReplyAdded')
                         A new reply was added to your discussion
                         <strong>
                             {{$notification->data['discussion']['title']}}
                         </strong>
                         <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="btn btn-info float-right btn-sm ">View Disucssion</a>
                         @endif
                 </li>
                 @endforeach
         </ul>
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
