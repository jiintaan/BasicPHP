PROJECT_NAME = BasicPHP
SRC_DIR = src/
PUBLIC_DIR = public/
TESTS_DIR = test/
TOOLS_DIR = tools/

startup: stop
	docker-compose -p $(PROJECT_NAME) up --detach

startup_not_detached: stop
	docker-compose -p $(PROJECT_NAME) up

stop:
	docker-compose -p $(PROJECT_NAME) stop

install:
	php $(TOOLS_DIR)composer.phar install

composer_autoload: ## generate composer autoload classmap
	 php $(TOOLS_DIR)composer.phar dump-autoload -o

composer_autoload_prd: ## generate composer autoload classmap
	 php $(TOOLS_DIR)composer.phar dump-autoload --no-dev

dependency_test:
	php $(PUBLIC_DIR)TestEntryPoint.php
	php $(PUBLIC_DIR)TestAutoloading.php