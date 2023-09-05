<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture
{
    private const TASKS = [
        'Wash my car',
        'Fix the laptop',
        'Buy a turtle',
    ];

    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        foreach (self::TASKS as $key => $description) {
            $task = new Task();
            $task->setDescription($description);
            $task->setDueDate($now->add(
                new \DateInterval(
                    sprintf(
                        'P%sD',
                        $key + 1
                    )
                ),
            ));
            $manager->persist($task);
        }

    $manager->flush();
    }
}
