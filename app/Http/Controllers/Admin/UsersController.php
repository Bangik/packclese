<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
  public function index()
  {
    $listUser = User::all()->sortDesc();
    return view('admin.user.index', compact('listUser'));
  }

  public function delete($id)
  {
    $user = User::find($id);
    $user->delete();
    // toastr()->success('Data has been deleted successfully!');
    return redirect()->route('index-user');
  }
}
