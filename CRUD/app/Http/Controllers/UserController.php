<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index(Request $request) {
        return view('clients.users.list');
    }
    public function add() {
        return view('clients.users.add');
    }
}