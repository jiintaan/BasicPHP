PROJECT_NAME = BasicPHP
SRC_DIR = src
PUBLIC_DIR = public
TESTS_DIR = test
TOOLS_DIR = tools

PHPUNIT_PHAR=$(TOOLS_DIR)/phpunit.phar
COMPOSER_PHAR=$(TOOLS_DIR)/composer.phar

export HOST_USER_ID=$(shell id -u)

DOCKER_COMPOSE = docker-compose -f docker-compose.yml -p $(PROJECT_NAME)
RUN_PHP_CONTAINER = $(DOCKER_COMPOSE) run --rm -e HOST_USER_ID=$(HOST_USER_ID) basicphp-php-cli

PHPUNIT = $(RUN_PHP_CONTAINER) $(PHPUNIT_PHAR)
COMPOSER = $(RUN_PHP_CONTAINER) $(COMPOSER_PHAR)

startup: stop
	docker-compose -p $(PROJECT_NAME) up --detach

startup_not_detached: stop
	docker-compose -p $(PROJECT_NAME) up

stop:
	docker-compose -p $(PROJECT_NAME) stop

install:
	 $(COMPOSER) install

composer_autoload: ## generate composer autoload classmap
	$(COMPOSER) dump-autoload -o

composer_autoload_prd: ## generate composer autoload classmap
	$(COMPOSER) dump-autoload --no-dev

dependency_test:
	php $(PUBLIC_DIR)/TestEntryPoint.php
	php $(PUBLIC_DIR)/TestAutoloading.php

test_unit: ### Docker runs unit tests
	@echo ""
	@echo "+++ Run unit tests (old archiving) +++"
	sudo mkdir -p $(PROJECT_ROOT_DIR)/reports
	@$(PHPUNIT) -c ./tests/unit/config/phpunit.xml $(ARGS)

test_unit_backup: ### Docker runs unit tests
	@echo ""
	@echo "+++ Run unit tests (old archiving) +++"
	@$(PHPUNIT_PHAR) -c tests/config/$(env)phpunit_unit.xml $(ARGS)

delete_container: stop
