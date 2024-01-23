<?php
    // ...


    use App\Models\User;
    use App\Http\Controllers\Controller;
    // ...
    class UserController extends Controller{
        public function index(){
    $users = User::orderBy('created_at');
    return view('users.index',['users' => $users]);
    }
    //...
    public function show(User $user){
    return view('users.show',['user'=>$user]);
}
    }