@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <ul class="list-group">
                    @foreach($keywords as $keyword)
                        <li class="list-group-item">{{$keyword->tag}}</li>
                    @endforeach
                </ul>
                {{ $keywords->links() }}
            </div>
            <div class="col">
                <form method="post" action="{{url('/keywords')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keyword</label>
                        <input type="text" name="tag" class="form-control"  placeholder="Enter keyword">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
