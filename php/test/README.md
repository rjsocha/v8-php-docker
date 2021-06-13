FPM:
```
docker build -t php-v8js:7.4-fpm --build-arg _ver=8.8 -f Dockerfile.php-7.4-V8 .
docker run --rm php-v8js:7.4-fpm -m
docker run --rm php-v8js:7.4-fpm php -r '$v8 = new V8Js(); $v8->executeString("print(\"Hello World from V8/PHP\\n\")");'
```

```
for _v in {1..8}
do
	_tag="8.${_v}"
	echo ${_tag}
	docker build -q -t php-v8js:7.4-fpm --build-arg _ver=${_tag} -f Dockerfile.php-7.4-V8 .
	docker run --rm php-v8js:7.4-fpm php -r '$v8 = new V8Js(); $v8->executeString("print(\"Hello World from V8/PHP\\n\")");'
done
```

Apache:
```
docker build -t php-v8js:7.4-apache -f Dockerfile.php-7.4-apache-V8-8.8 .
docker run -d --rm --name v8-php-apache -v $(pwd)/examples:/var/www/html -p 80:80 php-v8js:7.4-apache
curl localhost
docker stop v8-php-apache
```
