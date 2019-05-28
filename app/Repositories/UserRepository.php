<?php
namespace App\Repositories;

use App\models\User;


class UserRepository
{

  public function all()
  {
    return User::paginate(15);
  }

  public function get($id)
  {
    return User::find($id);
  }

  public function getByName($name)
  {
    return User::where("username", $name)->first();
  }

  public function update($id, $data)
  {
    $user = User::find($id);
    $user->update($data);
    return $user->save();
  }

  public function create($request)
  {
    return  User::create(

      [

        'full_name' => $request->full_name, 'avatar' => $request->avatar_file,
        'website' => $request->website, 'phone' => $request->phone, 'country_id' => $request->country,
        'status' => 'active', 'social_account' => $request->social_account,
        'level_id' => 1, 'points' => 0, 'username' => $request->username, 'email' => $request->email, 'password' =>$request->password
      ]
    );
  }
}
