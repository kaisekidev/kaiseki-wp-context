<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function array_map;
use function in_array;

final class ContentContainsBlock implements ContextFilterInterface
{
    public function __construct(private readonly string $name, private readonly string $namespace = '')
    {
    }

    public function __invoke(): bool
    {
        $post = get_post();

        if (!($post instanceof \WP_Post)) {
            return false;
        }

        \Safe\preg_match_all(
            '/<!--\s+(?P<closer>\/)?wp:(?P<namespace>[a-z][a-z0-9_-]*\/)?(?P<name>' . $this->name . ')/',
            $post->post_content,
            $matches
        );

        if (!isset($matches['name'])) {
            return false;
        }

        if ($this->namespace === '') {
            return true;
        }

        $namespaces = array_map(
            static fn (string $namespace): string => untrailingslashit($namespace),
            $matches['namespace']
        );

        return in_array($this->namespace, $namespaces, true);
    }
}
