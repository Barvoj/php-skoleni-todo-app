<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\TodoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TodoController extends AbstractController
{
    public function __construct(private TodoService $service)
    {
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
        $this->service->addTodo($todoText);
        return $this->redirect('/');
    }
}
