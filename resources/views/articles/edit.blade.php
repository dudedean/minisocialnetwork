@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Article
                </div>

                <div class="panel-body">

                <form action="/articles/{{$article->id}}" method="POST">
                    {{--  to override POST method  --}}
                    {{method_field('PUT')}}
                    

                    {{csrf_field()}}
                    
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="content">Content</label>

                        <textarea name="content" class="form-control" id="content">{{$article->content}}</textarea>

                    </div>

                    <div class="checkbox">
                        <label for="live">
                            <input type="checkbox"  name="live" {{$article->live == 1 ? 'checked' : ''}}>Live
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="post_on">Post On </label>

                        <input type="datetime-local" name="post_on" value="{{$article->post_on->format('Y-m-d\TH:i:s')}}" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-success pull-right">
                </form>
                </div>    
            </div>
        </div>
    </div>
@endsection