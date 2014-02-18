Installer composer :
curl -s https://getcomposer.org/installer | php

Installer symfony avec vendor via composer :
php composer.phar create-project symfony/framework-standard-edition /path/to/webroot/Symfony 2.3.*

Creer un bundle:
php app/console generate:bundle --namespace=Acme/HelloBundle --format=yml

Cree le shema depuis une base existante:
1)php app/console doctrine:mapping:convert yml ./src/Acme/BlogBundle/Resources/config/doctrine/metadata/orm --from-database --force
2)php app/console doctrine:mapping:import AcmeBlogBundle annotation
3)php app/console doctrine:generate:entities AcmeBlogBundle
