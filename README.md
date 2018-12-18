# Gutenberg I18N Block

This is an example WordPress plugin to demonstrate how to build fully internationalised an localised blocks for the new editor.

## Prerequisites

To install all `npm` dependencies in this repository, run `npm install`.

Also, you need to have [WP-CLI](https://wp-cli.org/) 2.1.0 or higher installed. To update WP-CLI run `wp cli update`.

This has the additional benefit that the resulting POT file contains the correct references to the original JavaScript files containing translatable strings.

## Plugins hosted on WordPress.org

If you want to build upon this proof-of-concept plugin for a project that is hosted on the WordPress.org Plugin Directory, please check out the [dotorg](https://github.com/swissspidy/gutenberg-i18n-block/tree/dotorg) branch for information.

## Not a fan of Babel?

Not everyone uses Babel in their JavaScript build process. The good thing is, you don't have to use it just for the sake of internationalization! WP-CLI has got you covered.

There are two example branches to demonstrate its use:

* [no-babel-makepot](https://github.com/swissspidy/gutenberg-i18n-block/tree/no-babel-makepot)
In this branch, we don't need `@wordpress/babel-plugin-makepot` anymore as we just use WP-CLI for the string extraction. Neat!
* [no-babel](https://github.com/swissspidy/gutenberg-i18n-block/tree/no-babel)
Since this block is rather simple and we don't actually need Babel's transpiler features, we can use the JS straight away.

## Usage

If you want to apply the I18N functionality from this block to yours, you need three main scripts:

1. `npm run build:js`  
  This command runs [Babel](https://babeljs.io/) to transpile our modern JavaScript from `block/src/block.js` to something more browsers understand in `block/block.js`. It uses the [@wordpress/babel-plugin-makepot](https://www.npmjs.com/package/@wordpress/babel-plugin-makepot) Babel plugin to automatically extract all translatable strings from the JavaScript and create a POT file for them (`gutenberg-i18n-block-js.pot`).  
  `gutenberg-i18n-block-js.pot` is only a temporary file and can be added to your `.gitignore` file.
2. `npm run build:pot`  
  This command uses [`wp i18n make-pot`](https://github.com/wp-cli/i18n-command) to create our final `gutenberg-i18n-block.pot` POT file that contains all texts from both the PHP side as well as the JavaScript side (`gutenberg-i18n-block.pot`).  
  It also allows us to translate the plugin's name and description. Use this for localization.
3. `npm run build:json`  
  Once you have added all your translations, run this command to create the necessary JSON translation files.

### Resources

A detailed step-by-step guide for JavaScript internationalization in WordPress 5.0 and beyond can be found on my blog: https://pascalbirchler.com/internationalization-in-wordpress-5-0/

## Screenshots

![Editor in English](https://cldup.com/vGpWmoUARj.png)

![Block in English](https://cldup.com/Fd66YdpuPw.png)

![Editor in German](https://cldup.com/8hf2Sihuew.png)

![Block in German](https://cldup.com/O2jrOcXu-K.png)
