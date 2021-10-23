<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>CRUD</title>
    <style>
        
    </style>
</head>
<body>
    <div style='width: 900px;' class="container max-w-full mx-auto pt-5">
        <form method='POST' action="/posts/{{ $post -> id }}">
         @method('PUT')
         @csrf
         <label class='text-500' for="title"><h3>Title</h3></label>
            <input class='input-group' type="text" id='title' name='title'  value='{{ $post -> title}}'>
            <label for="content"><h3>Content</h3></label>
            <input  class='input-group' type="text" id='content' name='content' value='{{ $post -> content}}'>
            <button class='btn btn-success mt-3'>Update</button>
            <a class='btn btn-secondary mt-3' href="/posts">Cancel</a></button>
        </form>
        
    </div>
</body>
</html>