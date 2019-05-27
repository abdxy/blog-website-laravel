<?php
namespace App\Repositories;

class UserRepository
{

  public function all()
  {
    return App\Models\User::all();
  }

  public function get($id)
  {
    return App\Models\User::find($id);
  }

  public function update($id, $data)
  {
    $user = App\Models\User::find($id);
    $user->update($data);
    return $user->save();
  }


  
}
