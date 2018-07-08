# Gutenberg I18N Block

This is a proof-of-concept to demonstrate how a fully internationalised an localised Gutenberg block works.

**Note:** These internationalisation tools used in this sample plugin are still under development. Things will eventually change and get less complex.

## Prerequisites

To install all `npm` dependencies in this repository, run `npm install`.

Also, you need to have [WP-CLI](https://wp-cli.org/) installed together with the [i18n-command](https://github.com/wp-cli/i18n-command) package. You can install the package using `wp package install wp-cli/i18n-command`.

This has the additional benefit that the resulting POT file contains the correct references to the original JavaScript files containing translatable strings.

## Plugins hosted on WordPress.org

If you want to build upon this proof-of-concept plugin for a project that is hosted on the WordPress.org Plugin Directory, please check out the [pot-to-php](https://github.com/swissspidy/gutenberg-i18n-block/tree/pot-to-php) branch in the meantime.

WordPress.org does not yet fully support JavaScript string extraction like this, and only scans PHP files. That's why we need to generate a fake PHP file containing these translatable strings extracted from JS.

## Not a fan of Babel?

Not everyone uses Babel in their JavaScript build process. The good thing is, you don't have to use it just for the sake of internationalization! The WP-CLI command now has experimental JavaScript string extraction support.

There are two example branches to demonstrate its use:

* [no-babel-makepot](https://github.com/swissspidy/gutenberg-i18n-block/tree/no-babel-makepot)
In this branch, we don't need `@wordpress/babel-plugin-makepot` anymore as we just use WP-CLI for the string extraction. Neat!
* [no-babel](https://github.com/swissspidy/gutenberg-i18n-block/tree/no-babel)
Since this block is rather simple and we don't actually need Babel's transpiler features, we can use the JS straight away.

## Usage

If you want to apply the I18N functionality from this block to yours, you need three main scripts:

1. `npm run build`
This command runs [Babel](https://babeljs.io/) to transpile our modern JavaScript from `block/src/block.js` to something more browsers understand in `block/block.js`.
2. `npm run makepot`
This command uses [`wp i18n make-pot`](https://github.com/wp-cli/i18n-command) to create our final POT file that contains all texts from both the PHP side as well as the JavaScript side (`gutenberg-i18n-block.pot`). It also allows us to translate the plugin's name and description.

### Advanced

If you want to load the JavaScript translations separately, you could run WP-CLI twice to create separate POT files for PHP and JavaScript, and then load these via `load_plugin_textdomain()` just when needed. To make things easier, you could use a separate text domain for that.

This really only gets interesting for larger projects where you have many strings to translate in both PHP and JS. Keeping these separated means you don't unnecessarily load multiple KB of translations when you don't need them (e.g. when you're not in the Gutenberg editor).

## Screenshots

![Editor in English](https://cldup.com/vGpWmoUARj.png)

![Block in English](https://cldup.com/Fd66YdpuPw.png)

![Editor in German](https://cldup.com/8hf2Sihuew.png)

![Block in German](https://cldup.com/O2jrOcXu-K.png)
