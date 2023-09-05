<?php

namespace App\Components;

use App\Entity\Task;
use App\Form\TaskComponentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[AsLiveComponent]
class TaskComponent extends AbstractController
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(writable: true)]
    #[Assert\Valid]
    public Task $task;

    #[LiveProp]
    public bool $isEditing = false;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(TaskComponentType::class, $this->task);
    }

    #[LiveAction]
    public function activateEditing(): void
    {
        $this->isEditing = true;
    }

    #[LiveAction]
    public function save(EntityManagerInterface $entityManager): void
    {
        $this->validate();

        $this->isEditing = false;

        $entityManager->flush();
    }
}

