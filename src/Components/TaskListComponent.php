<?php


namespace App\Components;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class TaskListComponent
{
    use DefaultActionTrait;

    public function __construct(
        private TaskRepository $taskRepository,
    )
    {
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->taskRepository
            ->findAll();
    }
}
