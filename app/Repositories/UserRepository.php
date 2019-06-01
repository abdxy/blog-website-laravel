<?php
namespace App\Repositories;

use App\models\User;


class UserRepository
{
  private $userModel;

  public function __construct(User $userModel)
  {
    $this->userModel = $userModel;
  }

  public function all()
  {
    return $this->userModel->latest()->paginate(15);
  }

  public function get($data)
  {
    return $this->userModel->findOrFail($data);
  }

  public function getByName($data)
  {
    return $this->userModel->where("username", $data)->firstOrFail();
  }

  public function getById($data)
  {
    return $this->userModel->where("id", $data)->firstOrFail();
  }

  public function update($id, $data)
  {
    $user = $this->userModel->findorfail($id);


    $user->full_name = $data->full_name;
    $user->avatar = $data->avatar_file;

    if (isset($data->password)) {
      $user->password = $data->password;
    }
    $user->save();
    return $user;
  }

  public function create($request)
  {
    $user = new $this->userModel;

    $user->full_name = $request->full_name;
    $user->avatar = $request->avatar_file;
    $user->website = $request->website;
    $user->phone = $request->phone;
    $user->country_id = $request->country;
    $user->status =  $user->active;
    $user->social_account = $request->social_account;
    $user->level_id = 1;
    $user->points = 0;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();

    return $user;
  }
}
