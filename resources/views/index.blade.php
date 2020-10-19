@extends('layout')

@section('content')
    <div class="container">
        <ul class="list-unstyled">
            @foreach($news as $item)
            <li class="media mb-3">
                @if(!empty($item->thumb))
                <img class="mr-3" src="{{$item->thumb}}" alt="{{$item->title}}">
                @else
                    <img class="mr-3" src="https://via.placeholder.com/200x200.png?text=No+News" alt="{{$item->title}}">
                @endif
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><a href="{{$item->url}}"> {{$item->title}} </a></h5>
                   <p>{{$item->body}}</p>
                </div>
            </li>
            @endforeach
        </ul>

    </div>

@endsection
