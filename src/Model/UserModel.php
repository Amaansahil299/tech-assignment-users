<?php

namespace App\Model;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserModel
{
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $data
     * @return User
     */
    public function createUser($data): User
    {
        $user = new User();
        $user->setEmail($data['email']);
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);

        return $this->save($user);
    }

    /**
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}