<?php

namespace App\Tests\Repository;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
    public function testUserRepository()
    {
        self::bootKernel();
        $container = self::$container;
        $userRepository = $container->get('doctrine')->getRepository(User::class);

        $user = new User();
        $user->setEmail('amanullahsahil299@gmailcom');
        $user->setFirstName('Aman');
        $user->setLastName('Ullah');

        $em = $container->get('doctrine')->getManager();
        $em->persist($user);
        $em->flush();

        $foundUser = $userRepository->findOneBy(['email' => 'amanullahsahil299@gmailcom']);
        $this->assertNotNull($foundUser);
        $this->assertEquals('John', $foundUser->getFirstName());
    }
}
