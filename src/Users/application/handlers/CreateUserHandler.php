<?php

namespace Red5g\Users\application\handlers;

use Red5g\Users\application\command\CreateUserCommand;
use Red5g\Users\domain\factories\UserFactory;
use Red5g\Users\domain\repository\UserRepository;
use Red5g\Users\domain\schema\UserSchema;

class CreateUserHandler
{
    public function __construct(private UserRepository $userRepository, private UserSchema $userService, private UserFactory $userFactory )
    {
    }

    public function handle(CreateUserCommand $command): \App\Models\User
    {
        $request_password = $command->getPassword();
        $hash_password = $this->userService->hashPassword($request_password);

        $user = $this->userFactory->create(
            $command->getNames(),
            $command->getEmail(),
            $hash_password,
            $command->getDocumentNumber(),
            $command->getPhone(),
            $command->getAge(),
            $command->getUserName()
        );

        return $this->userRepository->save($user);
    }
}
