<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

final class ContextFilterPipeline implements ContextFilterInterface
{
    /** @var array<ContextFilterInterface> */
    private array $filter;

    public function __construct(ContextFilterInterface ...$filter)
    {
        $this->filter = $filter;
    }

    public function __invoke(): bool
    {
        foreach ($this->filter as $filter) {
            if (($filter)() === false) {
                return false;
            }
        }
        return true;
    }
}
