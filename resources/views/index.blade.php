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
                    <a ui-sref="home" ui-sref-active="active">Home</a>
                </li>
                 <li>
                    <a ui-sref="todo-app" ui-sref-active="active">Todo App</a>
                </li>
              
            </ul>
        </div>
    </nav>
    <div class="container " id="content">

      <h3> Basic Angular 1.x.x.x and Laravel Starter </h3>


     <ui-view></ui-view>

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