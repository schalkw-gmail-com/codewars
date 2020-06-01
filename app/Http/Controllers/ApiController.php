<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Users;

class ApiController extends Controller
{
    protected $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        // Get all the post
        $users = $this->user->all();

        return view('someview', compact('users'));
    }

    public function show($id)
    {
        $users = $this->user->findById($id);
        dd($users);
    }
}
