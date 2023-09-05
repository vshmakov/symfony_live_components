<?php

namespace App\Components;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class TaskComponent
{
    use DefaultActionTrait;

    public ?string $description = null;
    public ?\DateTimeImmutable $dueDate = null;

    public function setTask(Task $task): void
    {
        $this->description = $task->getDescription();
        $this->dueDate = $task->getDueDate();
    }
}
