<?php

namespace App\DTO;

class CustomerValueData implements DataTransferObjectContract
{
    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly string $email,
        public readonly string $document,
        public readonly string $type,
        public readonly string $password
    ) {
    }

    public static function fromRequest($request)
    {
        return new self(
            $request['firstname'],
            $request['lastname'],
            $request['email'],
            $request['document'],
            $request['type'],
            $request['password'],
        );
    }

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'document' => $this->document,
            'type' => $this->type,
            'password' => $this->password,
        ];
    }
}
