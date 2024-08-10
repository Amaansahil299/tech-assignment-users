<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\UserCreated;
use App\Model\UserModel;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="create_user", methods={"POST"})
     * @param Request $request
     * @param MessageBusInterface $bus
     * @param UserModel $userModel
     * @return Response
     */
    public function createUser(
        Request $request,
        MessageBusInterface $bus,
        UserModel $userModel
    ): Response {
        $data = json_decode($request->getContent(), true);
        $user = $userModel->createUser($data);
        $bus->dispatch(
            new UserCreated(
                $user->getEmail(),
                $user->getFirstName(),
                $user->getLastName()
            )
        );

        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
    }
}
