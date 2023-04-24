<?php

namespace Red5g\Users\domain\entity;

class User
{

    public function __construct(
        private readonly string $names,
        private readonly string $email,
        private readonly string $password,
        private readonly string $document_number,
        private readonly string $phone,
        private readonly string $age,
        private readonly string $user_name,
    ) {
    }

    /**
     * @return string
     */
    public function getNames(): string
    {
        return $this->names;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDocumentNumber(): string
    {
        return $this->document_number;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

}
