<?php

namespace Red5g\SavingAccounts\domain\repository;

use Red5g\SavingAccounts\domain\entity\SavingAccount;

interface SavingAccountRepository
{
    public function save(SavingAccount $savingAccount): void;
//    public function search(SavingAccountNumber $savingAccountNumber): ?SavingAccount;
}
