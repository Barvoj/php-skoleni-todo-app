<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\TodoService;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TodoController extends AbstractController
{
    public function __construct(
        private TodoService $service,
        private UserRepository $userRepository,
    ) {
    }

    #[Route('/')]
    public function listOfTodos()
    {
        // Náčíst todo z uložiště
        $todos = $this->service->getListOfTodos();
        // Vypsat je do view
        return $this->render('todo/index.html.twig', [
            'todos' => $todos
        ]);
    }

    #[Route('/add', methods: ['POST'])]
    public function addTodo(Request $request)
    {
        $todoText = $request->request->get('text');
        $user = $this->userRepository->findOneBy(['email' => 'jan@novak.cz']);
        $this->service->addTodo($todoText, $user);
        return $this->redirect('/');
    }
}
