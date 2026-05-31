# kaiseki/wp-context

Composable WordPress context filters (current user, post type, page template, content).

A context filter is any object implementing `ContextFilterInterface` —
`__invoke(?WP_Post $post = null): bool`. It answers a yes/no question about the current request
(or a given post): "is this a page?", "can the current user edit posts?", "does the content contain
this block?". `ContextFilterPipeline` ANDs several filters together (and is itself a filter, so
pipelines nest), which makes it easy to gate behavior on a combination of conditions.

## Installation

```bash
composer require kaiseki/wp-context
```

Requires PHP 8.2 or newer.

## Usage

```php
use Kaiseki\WordPress\Context\Filter\ContextFilterPipeline;
use Kaiseki\WordPress\Context\Filter\CurrentUserCan;
use Kaiseki\WordPress\Context\Filter\IsPostType;

$filter = new ContextFilterPipeline(
    new IsPostType('page'),
    new CurrentUserCan('edit_pages'),
);

if ($filter($post)) {
    // the request is a 'page' AND the current user can edit pages
}
```

Each filter is invokable on its own and accepts an optional `WP_Post`; when omitted it resolves the
current post / global context. `ContextFilterPipeline` returns `false` as soon as one filter fails.

## Included filters

| Filter (and its negation) | True when |
| --- | --- |
| `ContextFilterPipeline` | every contained filter passes |
| `IsPostType` / `IsNotPostType` | the post matches the given post type |
| `IsFrontPage` | the post is the configured front page |
| `IsPageTemplate` / `IsNotPageTemplate` | the post uses the given page template |
| `IsPageTemplateFileName` / `IsNotPageTemplateFileName` | the post's page template matches the given file name |
| `IsUserLoggedIn` / `IsUserNotLoggedIn` | a user is logged in |
| `CurrentUserCan` / `CurrentUserCanNot` | the current user has the given capability |
| `CurrentUserHasRole` / `CurrentUserHasNotRole` | the current user has the given role |
| `CurrentUserHasEmail` / `CurrentUserHasNotEmail` | the current user has the given email |
| `CurrentUserIsAdmin` / `CurrentUserIsNotAdmin` | the current user is an administrator |
| `ContentContainsBlock` / `ContentDoesNotContainBlock` | the post content contains the given block |
| `ContentContainsRegex` / `ContentDoesNotContainRegex` | the post content matches the given pattern |

Write your own by implementing `ContextFilterInterface`:

```php
use Kaiseki\WordPress\Context\Filter\ContextFilterInterface;
use WP_Post;

final class IsSticky implements ContextFilterInterface
{
    public function __invoke(?WP_Post $post = null): bool
    {
        return $post !== null && is_sticky($post->ID);
    }
}
```

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
