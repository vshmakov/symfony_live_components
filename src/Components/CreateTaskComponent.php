<?php

declare(strict_types=1);

namespace App\Components;

use App\Entity\Task;
use App\Form\TaskComponentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class CreateTaskComponent extends AbstractController
{
    use ComponentToolsTrait;
    use ComponentWithFormTrait;
    use DefaultActionTrait;

    #[LiveProp]
    public bool $isCreating = false;

    protected function instantiateForm(): FormInterface
    {
        $task = new Task();
        $task->setDueDate(new \DateTimeImmutable());

        return $this->createForm(TaskComponentType::class, $task);
    }

    #[LiveAction]
    public function activateCreating(): void
    {
        $this->isCreating = true;
    }

    #[LiveAction]
    public function save(EntityManagerInterface $entityManager): void
    {
        $this->submitForm();

        $this->isCreating = false;

        $entityManager->persist(
            $this->getForm()->getData()
        );
        $entityManager->flush();
        $this->rerender(TaskListComponent::class);
    }
}
