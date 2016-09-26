<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HW2</title>
    </head>
    <body>
        <div class = "container">
            <div class="content">
                <h2> Trainers List</h2>
                @foreach($trainers as $trainer)
                <p>{{$trainer->user->name}}</p>
                @endforeach
            </div>
        </div>
    </body>
</html>
