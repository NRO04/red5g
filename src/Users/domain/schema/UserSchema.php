<?php

namespace Red5g\Users\domain\schema;

use Red5g\Users\application\command\CreateUserCommand;

interface UserSchema
{
    public function hashPassword(string $password): string;

}
