<?php

namespace Red5g\Clients\domain\repository;

use Red5g\Clients\domain\entity\Client;

interface ClientRepository
{
    public function save(Client $client): void;

}
