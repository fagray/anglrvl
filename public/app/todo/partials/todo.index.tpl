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
        <span> {{ todoList.remaining() }} of {{ todoList.todos.length }} remaining</span>
        [ <a href="" ng-click="todoList.archive()">archive</a> ]
        <ul class="unstyled">
            <li ng-repeat="todo in todoList.todos">
              <label class="checkbox">
                <input type="checkbox" ng-model="todo.done">
                <span class="done-{{todo.done}}"> {{todo.text}}</span>
            </label>
        </li>
    </ul>