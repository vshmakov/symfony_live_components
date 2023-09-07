<?php

declare(strict_types=1);

namespace App\Components;

use function Symfony\Component\String\u;

trait ComponentToolsTrait
{
    use \Symfony\UX\LiveComponent\ComponentToolsTrait;

    public function rerender(string $component): void
    {
        $componentName = u($component)
            ->afterLast('\\')
            ->toString()
        ;
        $this->emit(Events::RERENDER_COMPONENT->name, componentName: $componentName);
    }
}
