# Shopware 6 Additional Dev Tools

A small stack of dev tools to make your life as a starting Shopware 6 developer a little easier

#### Assumptions

This plugin is build upon a few assumptions:

- You have Shopware 6 already installed manually
- ~~shopware/platform is installed by composer~~

## Features

- Enable and Disable twig caching
- Fix hot proxy
- Create Shorthand for `./psh.phar` 
- Works on three types of Shopware installation: 
  - Composer platform installation: `./vendor/shopware/platform`
  - Composer production template installation: `./vendor/shopware/core` etc.
  - Installed following the Shopware installation guidelines by using git
  

## Installation

### Composer / packagist
```
composer require mmeester/shopware6-dev-tools --dev
```
That's it, follow the next steps in the [activate plugin](#activate-plugin) section.

### Manual
- Download the zipfile of this repo
- Unzip the zip
- Rename the folder to `DevTools` or whatevever your flavor is
- Move the folder in your Shopware 6 Custom plugin directory, ex:  `custom/plugins`

### Activate plugin
In your CLI run the following inside the root of your Shopware project:

- Detect new plugins: `bin/console plugin:refresh`  👉 Look for the new plugin 
- Install & activate the plugin: ` bin/console plugin:install --activate DevTools`

## Commands

### Enable or disable Twig Caching
Before you can start developing you need to disable twig caching so development goes faster (and your installation a little slower), to disable the cache run:

```
bin/console dev:twig-cache disable
```

to enable the cache:

```
bin/console dev:twig-cache enable
```
  
### Add shorthand command to CLI
Typing `./psh.phar` are way too much characters when typing it more than twice a day 😊, so make your life a little easier and add a shorthand to your cli, run the following command once and follow the instructions in your cli:

```
bin/console dev:create-alias
``` 

Now you are able to run all your known Shopware Commands like this:

```
sw cache
sw update

sw storefront:build
sw storefront:dev
sw storefront:hot-proxy

...
```

*NOTE:* You only need to run this command once per machine, each time you run this command an additional alias will be written to your profile. 
  
### Hot proxy fix

This is a fix for Shopware 6 users that aren't able or don't want to use Docker to run their installation locally. 

This solves the problem in Valet+ that it isn't accepting port :80 forwarding with hot proxy!

- Run the new command to fix the hot-proxy: `bin/console dev:hot-proxy-fix`
- Try the hot-proxy again by running the standard Shopware command: `./psh.phar storefront:hot-proxy`
