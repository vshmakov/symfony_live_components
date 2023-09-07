<?php

declare(strict_types=1);

namespace App\Components;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class TaskListComponent
{
    use DefaultActionTrait;
    use WithRerenderTriggerTrait;

    public function __construct(
        private TaskRepository $taskRepository,
    ) {
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->taskRepository
            ->findBy([], ['dueDate' => 'asc'])
        ;
    }
}
