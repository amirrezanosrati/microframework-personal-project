<?php

namespace App\Controllers;

use App\Models\User;

class PostController
{
    public function single()
    {
        global $request;
       
        $user=new User(11);
        $user->name ='amir';
        $user->email ='amir@gmail.com';
        $user->save();
        $slug = $request->get_route_param('slug');
        echo "slug:$slug";
    }
    public function comment()
    {
        global $request;
        $slug = $request->get_route_param('slug');
        $cid = $request->get_route_param('cid');
        echo "slug:$slug <br> cid:$cid";
    }
}
