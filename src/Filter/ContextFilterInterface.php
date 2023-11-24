<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

interface ContextFilterInterface
{
    public function __invoke(): bool;
}
