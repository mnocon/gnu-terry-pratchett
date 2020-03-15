ARG PHP_IMAGE
FROM ${PHP_IMAGE} as base

ARG DEMO_VERSION

RUN composer create-project symfony/symfony-demo:${DEMO_VERSION} symfony-demo --no-progress || true

ENTRYPOINT  cd symfony-demo; composer config repositories.test path "../project" ; \ 
            composer require "mnocon/gnu-terry-pratchett:*@dev" ; \ 
            sed -i "s/];/MNocon\\\GnuTerryPratchettBundle\\\GnuTerryPratchettBundle::class => ['all' => true], ];/g" config/bundles.php ; \
            php -S 0.0.0.0:8000 -t /var/www/symfony-demo/public ;

HEALTHCHECK --start-period=60s CMD curl -f http://0.0.0.0:8000/ || exit 1

EXPOSE 8000