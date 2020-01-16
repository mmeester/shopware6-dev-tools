# Shopware 6 Additional Dev Tools

## Hot proxy fix

This is a fix for Shopware 6 users that aren't able or don't want to use Kubernetes to run their installation locally. 

This solves the problem in Valet+ that Valet+ isn't acception :80 forwarding with hot proxy?


This plugin is build upon a few assumptions:

- You have Shopware 6 already installed manually
- `shopware/platform` is installed by composer

## Installation & Usage
- Download the zipfile of this repo
- Unzip the zip
- Rename the folder to `DevTools` or whatevever your flavor is
- Move the folder in your Shopware 6 Custom plugin directory, ex:  `custom/plugins`
- In your CLI run the following inside the root of your Shopware project:
  - Detect new plugins: `bin/console plugin:refresh`  👉 Look for the new plugin 
  - Install & activate the plugin: ` bin/console plugin:install --activate DevTools`
  - Run the new command to fix the hot-proxy: `bin/console dev:hot-proxy-fix`
  - Try the hot-proxy again by running the standard Shopware command: `./psh.phar custom:fix-proxy`