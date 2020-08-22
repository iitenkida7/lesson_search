migrate:
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} < /tmp/migrate.sql'
drop:
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} -e "drop table words"'
	docker-compose exec db sh -c 'export MYSQL_PWD=$${MYSQL_PASSWORD} ; mysql -u$${MYSQL_USER} $${MYSQL_DATABASE} -e "drop table aggregations"'
composer-dumpautoload:
	docker-compose run --rm composer dumpautoload
composer-install:
	docker-compose run --rm composer install
data-insert:
	curl -X POST -d 'words=お父さん パパ おとうさん おやじ とうさん 父 父さん 父親 父ちゃん とうちゃん dady papa dad father' http://localhost:8000  -o /dev/null -w '%{http_code}\n' -s
	curl -X POST -d 'words=女性 女 ウーマン おんな 女の人 woman female' http://localhost:8000  -o /dev/null -w '%{http_code}\n' -s
	curl -X POST -d 'words=猫 にゃんこ にゃんにゃん cat' http://localhost:8000  -o /dev/null -w '%{http_code}\n' -s
	curl -X POST -d 'words=犬 イヌ ドッグ 戌 dog' http://localhost:8000  -o /dev/null -w '%{http_code}\n' -s
erd:
	docker-compose run --rm schemaspy