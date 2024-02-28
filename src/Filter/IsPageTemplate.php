<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Context\Filter;

use WP_Post;

use function get_page_template_slug;
use function is_page;

class IsPageTemplate implements ContextFilterInterface
{
    public function __construct(protected readonly string $pageTemplate)
    {
    }

    public function __invoke(?WP_Post $post = null): bool
    {
        return self::check($this->pageTemplate, $post);
    }

    /**
     * @param string   $pageTemplate
     * @param ?WP_Post $post
     *
     * @return bool
     */
    public static function check(string $pageTemplate, ?WP_Post $post = null): bool
    {
        if (
            ($post === null && !is_page())
            || ($post !== null && $post->post_type !== 'page')
        ) {
            return false;
        }

        return get_page_template_slug($post) === $pageTemplate;
    }
}
