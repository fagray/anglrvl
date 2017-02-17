/*------------------------------------------------------------------------------------------------------------------
 *																													*
 * AngularJS 1.6.x.x and Laravel 5.4 Starter Template 																*
 * 																													*
 * @author : Raymund Santillan																						*
 * @github : http://www.github.com/fagray																			*
 * 																													*
 * Under MIT License 																								*
 * 																													*
 * Copyright 2017																									*
 *																													*
 *-------------------------------------------------------------------------------------------------------------------
 */


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


var app = angular.module('todoApp', ['ngResource','ui.router']);
	
	/* Manage App Configurations */

	app.config(function($stateProvider, $urlRouterProvider) {

	 $urlRouterProvider.otherwise('/home');

	   var todoState = {
	    name: 'todo-app',
	    url: '/todo-app',
	    templateUrl: './app/todo/partials/todo.index.tpl'
	  
	  
	  }

	   var homeState = {
	    name: 'home',
	    url: '/home',
	    templateUrl: './app/partials/home.tpl'
	  
	  
	  }

	  // register the url states
	  $stateProvider.state(todoState);
	  $stateProvider.state(homeState);


	});

/*
 *	Its much more wiser if we include our controller files in a seperate file
 *	and register all the controllers in controllers.js file found on the under
 *	the components directory of the app folder then register the controllers.js
 *	file as a dependency on the module declaration above. 
 *	
 *	But for the sake of simplicity, I just included here on the same file
 *  You are free to tweak it or re-structure based on your needs.
 *
 */

	app.controller('TodoListController', function() {

    var todoList = this;
    todoList.todos = [
      {text:'Buy milk', done:true},
      {text:'Kiss my wife', done:false}];
 
    todoList.addTodo = function() {
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todoText = '';
    };
 
    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };
 
    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
    };
  });

