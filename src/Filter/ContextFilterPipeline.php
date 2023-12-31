<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class ContextFilterPipeline implements ContextFilterInterface
{
    /** @var array<ContextFilterInterface> */
    protected array $filters;

    public function __construct(ContextFilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function __invoke(): bool
    {
        foreach ($this->filters as $filter) {
            if (($filter)() === false) {
                return false;
            }
        }
        return true;
    }
}
