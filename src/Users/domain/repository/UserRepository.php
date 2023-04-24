<?php

namespace Red5g\Users\domain\repository;

use Red5g\Users\domain\entity\User;

interface UserRepository
{
    public function save(User $user): \App\Models\User;
}
