<?php

namespace App\Services\Interfaces;

interface IUserService
{
    public function register(array $request) : array;

    public function getUsers() : array;
}