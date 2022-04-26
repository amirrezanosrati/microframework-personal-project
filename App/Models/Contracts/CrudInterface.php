<?php
 
 namespace App\Models\Contracts;

 interface CrudInterface{

    #crate (insert)
     public function create(array $data) : int ;

     #read (select) single | multiple

     public function find($id) : object ;
     public function getAll() : array ;
     public function get(array $columns ,array $where) : array ;


     #update records 
     public function update(array $data,array $where) : int ;

     #Delete
     public function delete(array $where) : int ;
 }