<?php

namespace App\Controllers;
 
class TodoController{

    public function list(){
        $data =[
        'tasks'=>['task one','task two','task tree','task fore','task five' ],
        'title' =>'لیست تسک ها'
        ];

        views('todo.list' ,$data);
    }
}