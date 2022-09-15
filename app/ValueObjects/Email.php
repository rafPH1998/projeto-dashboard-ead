<?php 
declare(strict_types=1);

namespace App\ValueObjects;
use DomainException;

class Email {
    
    public function __construct(
        protected string $email
    )
    {
       if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('O campo e-mail deve ser um endereço de e-mail válido!'); 
       }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}