migrate:
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} < /tmp/migrate.sql'
drop:
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} -e "drop table words"'
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} -e "drop table aggregations"'
composer-dumpautoload:
	docker-compose run --rm composer dumpautoload
