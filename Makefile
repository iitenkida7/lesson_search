migrate:
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} < /tmp/migrate.sql'

composer-dumpautoload:
	docker-compose run --rm composer dumpautoload