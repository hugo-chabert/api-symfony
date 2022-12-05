<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use DateTimeImmutable;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserProcessor implements ProcessorInterface
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher, private EntityManagerInterface $manager){

    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if($data instanceof User === false){
            return;
        }

        $data->setPassword($this->passwordHasher->hashPassword($data, $data->getPassword()));

        if($operation->getName() === '_api_/users{._format}_post'){
            $data->setCreatedAt(new DateTimeImmutable());
        }

        $this->manager->persist($data);
        $this->manager->flush();
    }
}
