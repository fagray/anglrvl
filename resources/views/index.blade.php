<!doctype html>
<html ng-app="todoApp">
<head>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- Scripts -->
   <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
</script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
<style>
    .done-true {
      text-decoration: line-through;
      color: grey;
  }
  #content {

    margin-top:80px;
}
</style>

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel 5.4 + Angular 1.6 Starter Template </a>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container " id="content">

        <h2>Todo</h2>
        <div ng-controller="TodoListController as todoList">

          <form ng-submit="todoList.addTodo()">


            <div class="form-group col-md-6">
                <label class="sr-only" for="">Todo Name</label>
                <input class="form-control" type="text" ng-model="todoList.todoText"  size="30"
                placeholder="add new todo here">
            </div>

            

            <button type="submit" class="btn btn-primary">Submit</button>



        </form>
        <br/>
        <span> @{{ todoList.remaining() }} of @{{ todoList.todos.length }} remaining</span>
        [ <a href="" ng-click="todoList.archive()">archive</a> ]
        <ul class="unstyled">
            <li ng-repeat="todo in todoList.todos">
              <label class="checkbox">
                <input type="checkbox" ng-model="todo.done">
                <span class="done-@{{todo.done}}"> @{{todo.text}}</span>
            </label>
        </li>
    </ul>

    @can('manage-user-permissions')

    <h3>Hi admin</h3>
    <p> Configure Roles and Permissions </p><br/>

    <a href="/">  </a>

    <table class="table">
        <thead>
            <tr>
                <th> User </th>

                <th> Permissions </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td> {{ $user->name }} </td>
                <td>
                    @foreach($user->roles as $role)

                    @foreach($role->permissions as $permission)

                    {{ $permission->label }},

                    @endforeach

                    @endforeach
                    
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    @endcan

</div>

<script src=" {{ elixir('js/app.js') }}  "></script>

</body>
</html>