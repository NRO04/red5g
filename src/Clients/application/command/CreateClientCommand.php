<?php

namespace Red5g\Clients\application\command;

class CreateClientCommand
{
    private string $names;
    private string $email;
    private string $password;

    private string $document_number;

    private string $phone;

    private string $age;

    private string $user_name;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
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
