Build files for:

 * https://hub.docker.com/r/wyga/v8-lib-buster
 * https://hub.docker.com/r/wyga/v8-php-7.4-ext-buster


Example usage of images:

Extension build:

```
FROM wyga/v8-lib-buster:8.1 AS V8Lib
FROM php:7.4-fpm
COPY --from=V8Lib / /
RUN pecl install v8js
```

binary distribution:

```
FROM wyga/v8-php-7.4-ext-buster:8.8 AS ext
FROM php:7.4-fpm
COPY --from=ext / /
RUN docker-php-ext-enable v8js
```
