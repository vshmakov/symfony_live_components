<?php

declare(strict_types=1);

namespace App\Components;

use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

trait WithRerenderTriggerTrait
{
    #[LiveProp]
    public int $rerenderCount = 0;

    #[LiveListener(Events::RERENDER_COMPONENT->name)]
    public function handleRerenderEvent(): void
    {
        ++$this->rerenderCount;
    }
}
