PROJECT_NAME = BasicPHP
SRC_DIR = src
PUBLIC_DIR = public
TESTS_DIR = test
TOOLS_DIR = tools

PHPUNIT_PHAR=$(TOOLS_DIR)/phpunit.phar
COMPOSER_PHAR=$(TOOLS_DIR)/composer.phar

startup: stop
	docker-compose -p $(PROJECT_NAME) up --detach

startup_not_detached: stop
	docker-compose -p $(PROJECT_NAME) up

stop:
	docker-compose -p $(PROJECT_NAME) stop

install:
	php $(COMPOSER_PHAR) install

composer_autoload: ## generate composer autoload classmap
	 php $(COMPOSER_PHAR) dump-autoload -o

composer_autoload_prd: ## generate composer autoload classmap
	 php $(COMPOSER_PHAR) dump-autoload --no-dev

dependency_test:
	php $(PUBLIC_DIR)/TestEntryPoint.php
	php $(PUBLIC_DIR)/TestAutoloading.php

test_unit: ### Docker runs unit tests
	@echo ""
	@echo "+++ Run unit tests (old archiving) +++"
	$(PHPUNIT_PHAR) -c phpunit.xml
test_unit_backup: ### Docker runs unit tests
	@echo ""
	@echo "+++ Run unit tests (old archiving) +++"
	$(PHPUNIT_PHAR) -c tests/config/$(env)phpunit_unit.xml $(ARGS)