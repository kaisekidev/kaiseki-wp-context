<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

final class CurrentUserCan implements ContextFilterInterface
{
    public function __construct(private readonly string $capability)
    {
    }

    public function __invoke(): bool
    {
        return current_user_can($this->capability);
    }
}
