# Script

## création du projet

composer create-project symfony/skeleton project
mv project/* project/.* .
rmdir project/

## twig

composer require annotations
composer require twig

## twig et debug

composer require symfony/asset
composer require --dev symfony/profiler-pack
composer require --dev symfony/var-dumper
composer require --dev symfony/debug-bundle
composer require --dev symfony/maker-bundle

## doctrine

composer require symfony/orm-pack
composer require --dev orm-fixtures

## formulaires

composer require symfony/form
composer require symfony/validator
composer require symfony/doctrine-bridge

## make:crud

## Security

composer require security-csrf

composer require symfony/security-bundle

## pagination

composer require knplabs/knp-paginator-bundle

## pages login

bin/console make:auth

## Error templates

composer require symfony/twig-pack

## annotations de groupes (API)

composer require symfony/serializer
