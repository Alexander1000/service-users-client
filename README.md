# service-users-client

### Example:
```php
<?php

declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Alexander1000\Clients\Users\Client(
    new \NetworkTransport\Http\Transport(),
    new \NetworkTransport\Http\Request\Builder(
        'http://127.0.0.1:8888/service-users',
        ['Content-Type' => 'application/json']
    )
);

$user = $client->getByEmail('a.dankovtsev@mail.ru');
var_dump($user);

```

#### Output:
```shell
object(Alexander1000\Clients\Users\Response\V1\User)#8 (5) {
  ["userId":"Alexander1000\Clients\Users\Response\V1\User":private]=>
  int(4)
  ["statusId":"Alexander1000\Clients\Users\Response\V1\User":private]=>
  int(0)
  ["login":"Alexander1000\Clients\Users\Response\V1\User":private]=>
  NULL
  ["emails":"Alexander1000\Clients\Users\Response\V1\User":private]=>
  array(1) {
    [0]=>
    object(Alexander1000\Clients\Users\Response\V1\Email)#6 (3) {
      ["id":"Alexander1000\Clients\Users\Response\V1\Email":private]=>
      int(4)
      ["statusId":"Alexander1000\Clients\Users\Response\V1\Email":private]=>
      int(0)
      ["email":"Alexander1000\Clients\Users\Response\V1\Email":private]=>
      string(20) "a.dankovtsev@mail.ru"
    }
  }
  ["phones":"Alexander1000\Clients\Users\Response\V1\User":private]=>
  array(0) {
  }
}
```
