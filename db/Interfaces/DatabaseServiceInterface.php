<?php

namespace DB\Interfaces;

use \Model\User;

interface DatabaseServiceInterface {
    public function loginUser(User $user): bool;

    public function registration(User $user): int;

    public function emailExists(string $email): bool;

}
