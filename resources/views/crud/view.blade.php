<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <script>

        function check(){
        return confirm('Are you sure you want to delete this entry');
        }

    </script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">Crud System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('view') }}">View</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1>Crud System :: VIEW</h1>
            <h3>Basic Crud System using Laravel 5</h3>
        </div>
    </div>
    <div class="container">

        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <th>{{ $student->first_name }}</th>
                    <th>{{ $student->last_name }}</th>
                    <th>{{ $student->email }}</th>
                    <th><a href="{{ URL::to('/edit/'.$student->id) }}">Edit</a> | <a onclick="return check()" href="{{ URL::to('/delete/'.$student->id) }}">Delete</a></th>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>