#
# docker build . -t abenevaut/laravel-kite:test --no-cache
# docker run --rm -v $(pwd):/var/task -w /var/task abenevaut/laravel-kite:test php vendor/bin/phpunit
#
FROM ghcr.io/abenevaut/vapor-ci:php82
