# Helpscout API Library (PHP 7.1+)

[![Build Status](https://travis-ci.org/AdamKyle/helpscout-api.svg?branch=master)](https://travis-ci.org/AdamKyle/helpscout-api)
[![Packagist](https://img.shields.io/packagist/v/adambalan/helpscout-api.svg?style=flat)](https://packagist.org/packages/adambalan/helpscout-api)
[![Maintenance](https://img.shields.io/maintenance/yes/2018.svg)]()
[![Made With Love](https://img.shields.io/badge/Made%20With-Love-green.svg)]()

The core purpose of this library is to manage [Helpscout API](https://developer.helpscout.com/docs-api/). I built this as a separate tool for my company to be able to backup our documentation.

> ATTN!!
>
> I am currently flushing this out with more endpoints as time goes on to make this more of a useful tool.

## Installing

`composer install adambalan/helpscout-api`

## API's

All of the core API endpoint classes live under `/Api/Get/`.

All of them take a GuzzleHttp client and a [ApiKey Contract](https://github.com/AdamKyle/helpscout-api/blob/master/docs/HelpscoutApi-Contracts-ApiKey.md).

### Contracts

The contracts are interfaces which are basic value objects - get/set methods based on what the api at this time needs, the following contracts exist:

- `ApiKey`
- `Article`
- `Category`
- `Collection`
- `Redirect`
- `site`

These are implemented and then passed to the Endpoint class methods where needed.

For further documentation see [the generated documentation](https://github.com/AdamKyle/helpscout-api/blob/master/docs/ApiIndex.md);

## Examples

The core thing to understand is that the structure and flow goes like this:

- Get all collections
 - Get all categories (Based on collection ID)
  - Get all articles (Based on category ID)
    - Get single article based on article id's returned from above.

You can also get Articles through the collections:

- Get all Collections
 - Get all Articles (Based on Collection ID)
   - Get Single Article based on Article ID from above.

Articles Will return a list of articles, unfortunately you have to use the article ID to get
specific information like text from a single article.

### Get All Articles

To get all articles you must have a category id, which you can get from getting
all categories, which in turn, requires a collection id.

```php

use HelpscoutApi\Api\Get\Articles;
use HelpscoutApi\Contracts\ApiKey; // We will pretend we implemented this as ApiKeyValue;
use HelpscoutApi\Contracts\Category; // We will pretend we implemented this as CategoryValue;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://docsapi.helpscout.net/v1/',
]);

$apiKey = new ApiKeyValue('xxxxxxxxxx');

$categoryValue = new CategoryValue('12345667');

$articles = new Article($client, $apiKey);
$articleJSON = $articles->getAll($categoryValue);

// Do something with $articleJSON.

```

### Get All Articles with params


```php

use HelpscoutApi\Api\Get\Articles;
use HelpscoutApi\Contracts\ApiKey; // We will pretend we implemented this as ApiKeyValue;
use HelpscoutApi\Contracts\Category; // We will pretend we implemented this as CategoryValue;
use HelpscoutApi\Params\Article as ArticleParams;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://docsapi.helpscout.net/v1/',
]);

$apiKey = new ApiKeyValue('xxxxxxxxxx');

$categoryValue = new CategoryValue('12345667');

// You can set the url params that come back as `?sort=number&status=number`:

$articleParams = new ArticleParams();
$articleParams->sort('number');
$articleParams->status('name');

$articles = new Article($client, $apiKey);

// We then pass $articleParams
$articleJSON = $articles->getAll($categoryValue, $articleParams);

// Do something with $articleJSON.

```
