<?php

namespace Red5g\Users\infrastructure\database;

use Red5g\Users\domain\entity\User;
use Red5g\Users\domain\repository\UserRepository;

class EloquentUser implements UserRepository
{
    public function save(User $user): \App\Models\User
    {
      $user_model = new \App\Models\User();
        $user_model->names = $user->getNames();
        $user_model->email = $user->getEmail();
        $user_model->password = $user->getPassword();
        $user_model->document_number = $user->getDocumentNumber();
        $user_model->phone = $user->getPhone();
        $user_model->age = $user->getAge();
        $user_model->user_name = $user->getUserName();
        $user_model->save();
        return $user_model;
    }

}
