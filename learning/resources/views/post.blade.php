<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./app.css">
</head>
<body>
<div>
  <article>
        <h1>
            {{ $post->title}}
        </h1>
        <h3>
            Category: 
            <a href="/categories/{{ $post -> category -> slug}}">
                {{ $post->category->name }}
            </a>
        </h3>
        <h4>by author:
            <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a>
        </h4>    
        <div>
            {{$post->excerpt}}
        </div>
        <div>
            {{$post->body}}
        </div>
    </article>
    <a href="/">Go Back</a>
  </div>
</body>
</html>