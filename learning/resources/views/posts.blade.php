@extends('layout')

@section('content')
  <div>
  @foreach($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->id }}">
                {{ $post->title}}
            </a>
        </h1>
        <h3>Category: <a href="/categories/{{ $post -> category -> slug}}">{{ $post->category->name }}</a></h3>
        <h4>by author:
            <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a>
        </h4>        
        <div>
            {{$post->excerpt}}
        </div>
    </article>
   @endforeach
  </div>
@endsection
