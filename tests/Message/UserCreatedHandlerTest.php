<?php

namespace App\Tests\Message;

use App\Message\UserCreated;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class UserCreatedHandlerTest extends TestCase
{
    public function testHandle()
    {
        $bus = $this->createMock(MessageBusInterface::class);
        $bus->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(UserCreated::class));

        $message = new UserCreated('amanullahsahil299@gmail.com', 'Aman', 'Ullah');
        $bus->dispatch($message);
    }
}
