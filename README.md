# TC Specify Search Form
Contributors: taupecat
Requires at least: 3.4
Tested up to: 4.3
Stable tag: 1.1
Tags: search form, widget
License: MIT

Replaces the default WordPress "Search" widget with one that will use a customized searchform template in your theme.

## Description

By default, the "Search" widget in WordPress will include the searchform.php template file in your theme (if it exists), or the search code in wp-includes/general-template.php (if it doesn't). However, if you want a distinctive search form (or forms!) to use as a widget, this allows you to enter it in using the "searchform-**identifier**.php" format that you can use to distinguish other templates elsewhere in your theme.  You just have to have that file set up in your theme with the HTML you want to use.

**Example:** If you want to have a distinct searchform file specifically for your widgets, create the template file and call it something like "searchform-widget.php" (what goes between the dash and the dot is up to you, so long as it meets filename requirements). In the "Template" field of the widget settings, enter only "widget", and __that__ searchform file will be called in your widget automagically.

**Note:** Actually coding the search form is up to you. That requires some theming skillz, but I have confidence in you!

**To Do:** Make a short-code version of this, for use in pages and posts.

## Installation

1. Place the tc-specify-search-form directory inside your plugins directory.
2. Navigate to the Plugins section of the Dashboard and click "Activate".

## Changelog

### Version 1.1
* Updated to avoid PHP4 class constructor deprecation warnings.

### Version 1.0
* Initial release.
