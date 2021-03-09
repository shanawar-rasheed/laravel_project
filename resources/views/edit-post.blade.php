<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Post</title>
</head>
<body>
 
<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Edit Posts</div>
                        <div class="card-body">
                        @if(Session::has('post_updated'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('post_updated')}}
                            </div>
                        @endif        
                            <form method="POST" action="{{route('post.update')}}">
                                @csrf 
                                <input type="hidden"name="id" value="{{$post->id}}">
                                    <div class=" form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" name="title"class="form-control"  value="{{$post->title}}" >
                                    </div>
                                    <div class=" form-group">
                                    <label for="body">Post Description</label>
                                    <textarea name="body" class=" form-control" rows="10">{{$post->body}}</textarea>
                                    </div>
                                    <button class="btn btn-success mt-2" type="submit">Update Post</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 