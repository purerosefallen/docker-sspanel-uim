# docker-sspanel-uim [![wakatime](https://wakatime.com/badge/github/jat001/docker-sspanel-uim.svg)](https://wakatime.com/@Jat/projects/yieaswmqse)

SSPanel UIM in Docker container.

## Usage

Create `.env` file and edit it:

```text
MARIADB_ROOT_PASSWORD=MyRootPassword
REDIS_DEFAULT_PASSWORD=MyDefaultPassword
SSPANEL_ADMIN_EMAIL=sspanel@example.com
SSPANEL_ADMIN_PASSWORD=MySSPanelPassword
CFD_TOKEN=MyCFDToken
```

Create `.config.php` in `config` directory and edit it:

```php
<?php

declare(strict_types=1);

require_once __DIR__ . '/.config.example.php';

$_ENV['db_socket'] = '/run/sspanel/mysqld.sock';
$_ENV['db_database'] = 'sspanel';
$_ENV['db_username'] = 'sspanel';
$_ENV['db_password'] = 'sspanel';

$_ENV['redis_host'] = '/run/sspanel/redis.sock';
$_ENV['redis_port'] = -1;
$_ENV['redis_username'] = 'sspanel';
$_ENV['redis_password'] = 'sspanel';

# Override other default values here

```

Create `appprofile.php` in `config` directory and edit it.

```php
<?php

declare(strict_types=1);

require_once __DIR__ . '/appprofile.example.php';

# Override the default values here

```

You don't need to create mariadb database and mariadb/redis user, the entrypoint script will do it for you.

You can also run mariadb and redis on another host, just change `db_host`, `db_port`, `redis_host`, `redis_port` to the correct value.

`web` (nginx), `app` (sspanel) and `cron` (crontab) must run on the same host, `db` (mariadb) and `cache` (redis) can run on another host.

You can create your own compose file, such as `docker-compose.custom.yaml`, to override the default attributes in `docker-compose.core.yaml` and `docker-compose.extra.yaml`. See [extends](https://docs.docker.com/compose/compose-file/05-services/#extends) for more information.

Take a look at [`etc`](./etc) directory for more customization.

Strongly recommend to use `cloudflared` (Cloudflare Tunnel client) to proxy your web server, rather than exposing it to the public internet.
