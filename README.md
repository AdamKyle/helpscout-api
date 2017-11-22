# Helpscout API Library

[![Build Status](https://travis-ci.org/AdamKyle/helpscout-api.svg?branch=master)](https://travis-ci.org/AdamKyle/helpscout-api)
[![Packagist](https://img.shields.io/packagist/v/adambalan/helpscout-api.svg?style=flat)](https://packagist.org/packages/adambalan/helpscout-api)
[![Maintenance](https://img.shields.io/maintenance/yes/2018.svg)]()
[![Made With Love](https://img.shields.io/badge/Made%20With-Love-green.svg)]()

The core purpose of this library is to manage [Helpscout API](https://developer.helpscout.com/docs-api/). I built this as a separate tool for my company to be able to backup our documentation.

> ATTN!!
>
> At this time the only supported methods are GET based methods for articles, collections and categories to either get one or all documents.
> This is still a work in progress, PR's and issues are welcome.

## Installing

`composer install adambalan/helpscout-api`

## API's

All of the core API endpoint classes, which consist of `articles`, `collections` and `categories` live under `/Api/Get/`.

All of them take a GuzzleHttp client and a ApiKey Contract.

### Contracts

The contracts are interfaces which are basic value objects - get/set methods based on what the api at this time needs, the following contracts exist:

- `ApiKey`
- `Article`
- `Category`
- `Collection`

These are implemented and then passed to the Endpoint class.

For further documentation see [the generated documentation](https://github.com/AdamKyle/helpscout-api/blob/master/docs/ApiIndex.md);
