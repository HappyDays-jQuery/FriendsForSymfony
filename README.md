JqueryTokyo.E
=============

A Symfony project created on June 25, 2016, 9:27 am.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/badges/build.png?b=master)](https://scrutinizer-ci.com/g/HappyDays-jQuery/FriendsForSymfony/build-status/master)
[![Build Status](https://travis-ci.org/HappyDays-jQuery/FriendsForSymfony.svg?branch=master)](https://travis-ci.org/HappyDays-jQuery/FriendsForSymfony)

CREATE Bundole

```shell
php bin/console generate:bundle --namespace=Acme/StoreBundle
```

CREATE DB

```shell
php bin/console doctrine:database:create
```

CREATE Entity AND REPOSITORY

```shell
php app/console doctrine:generate:entity --entity="AcmeStoreBundle:Product" --fields="name:string(255) price:float description:text"
```

Entityクラスを自動生成しない場合、以下でsetter/getter作成
```shell
php app/console doctrine:generate:entities Acme/StoreBundle/Entity/Product
```

EntityをベースにDBにschema作成
```shell
php app/console doctrine:schema:update --force
```
