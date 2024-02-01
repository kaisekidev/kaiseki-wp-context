<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use function array_map;
use function in_array;

class ContentContainsBlock implements ContextFilterInterface
{
    public function __construct(protected readonly string $name, protected readonly string $namespace = '')
    {
    }

    public function __invoke(?\WP_Post $post = null): bool
    {
        return self::check($this->name, $this->namespace);
    }

    public static function check(string $name, string $namespace = '', ?\WP_Post $post = null): bool
    {
        $post = $post ?? get_post();

        if (!($post instanceof \WP_Post)) {
            return false;
        }

        \Safe\preg_match_all(
            '/<!--\s+(?P<closer>\/)?wp:(?P<namespace>[a-z][a-z0-9_-]*\/)?(?P<name>' . $name . ')/',
            $post->post_content,
            $matches
        );

        if (!isset($matches['name'])) {
            return false;
        }

        if ($namespace === '') {
            return true;
        }

        $namespaces = array_map(
            static fn (string $namespace): string => untrailingslashit($namespace),
            $matches['namespace']
        );

        return in_array($namespace, $namespaces, true);
    }
}
