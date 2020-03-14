ARG PHP_IMAGE
FROM ${PHP_IMAGE} as base

ARG DEMO_VERSION

RUN composer create-project symfony/symfony-demo:${DEMO_VERSION} symfony-demo --no-progress
CMD php -S 0.0.0.0:8000 -t /var/www/symfony-demo/public

EXPOSE 8000