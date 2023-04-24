<?php

namespace Red5g\Users\domain\services;

use Red5g\Users\domain\schema\UserSchema;

class UserService implements UserSchema
{
    public function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

