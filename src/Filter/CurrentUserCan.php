<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

class CurrentUserCan implements ContextFilterInterface
{
    public function __construct(protected readonly string $capability)
    {
    }

    public function __invoke(): bool
    {
        return self::check($this->capability);
    }

    public static function check(string $capability): bool
    {
        return current_user_can($capability);
    }
}
