<?php

namespace Red5g\Users\domain\factories;

use Red5g\Users\domain\entity\User;

class UserFactory
{
    public function create(
        string $names,
        string $email,
        string $hash_password,
        string $documentNumber,
        string $phone,
        int $age,
        string $userName
    ): User {
        return new User($names, $email, $hash_password, $documentNumber, $phone, $age, $userName);
    }
}
