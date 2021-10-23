<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('document').ready(function(){
            setTimeout(() => {
                $('.alert').remove();
            }, 2000);
        })
    </script>
   <style>
       a{
        text-decoration: none;
       }
       .msg-alert{
        position: absolute;
        right: 1rem;
        top: 0.7rem;
       }
       .alert{
        position: absolute;
        right: 4rem;
        bottom: 2rem;
       }
   </style>
    <title>CRUD</title>
</head>
<body>
    <div style='width: 900px;' class="container max-w-full mx-auto pt-5 ">
     @if(Session('msg'))
       <div class="alert alert-success" id='msg' role='alert'>{{Session::get('msg')}}
       </div>
     @endif
     @if(Session('update'))
       <div class="alert alert-warning" role='alert'>{{Session::get('update')}}
       </div>
     @endif
     @if(Session('delete'))
       <div class="alert alert-danger" role='alert'>{{Session::get('delete')}}
        </div>
     @endif
      <a href="/posts/create" class='btn btn-success'>Create A Post</a>  
      <hr>
      <div class='row'>
     @foreach($posts as $post)
        <div class='col-4 mt-2'>
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href='/posts/{{$post->id}}/edit' class='text-xl font-bold text-gray-700'>{{$post -> title}}</a></h5>
            <p class="card-text">{{$post -> content}}</p>
            <a class='btn btn-danger' href="/delete-post/{{$post -> id}}">Delete</a>
        </div>
        </div>
        </div>
     @endforeach
     
     </div>
    </div>
</body>
</html>