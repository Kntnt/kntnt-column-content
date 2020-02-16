# Kntnt Column Content

WordPress-plugin that add shortcodes to make columns.

## Shortcode

This plugin provides shortcodes making it easy to create columns

A row of columns is wrapped by `[row class="…" id="…" style="" padding="…" gutter="…"]…[/row]`.

A column is wrapped by `[column width="…" class="…" id="…" style="" grow="…"]…[/column]`

## Attributes

The shortcode `[row]` accepts following optional attributes:

* `padding` – size of the space between the boundary of the row and its columns expressed as an absolute [length](https://developer.mozilla.org/en-US/docs/Web/CSS/length) or a [percentage](https://developer.mozilla.org/en-US/docs/Web/CSS/percentage) of the row width. The default value is `0`. 
* `gutter` – size of the space between two columns expressed as an absolute [length](https://developer.mozilla.org/en-US/docs/Web/CSS/length) or a [percentage](https://developer.mozilla.org/en-US/docs/Web/CSS/percentage) of the row width. The default value is `1em`.

The shortcode `[column]` accepts following optional attributes:

* `width` – column width expressed as an absolute [length](https://developer.mozilla.org/en-US/docs/Web/CSS/length), a [percentage](https://developer.mozilla.org/en-US/docs/Web/CSS/percentage) of the row width, or the keyword [`auto`](https://developer.mozilla.org/en-US/docs/Web/CSS/flex-basis) (default).
* `grow` – a number expressing how much of remaining space in the row should be assigned to the item ([growth factor](https://developer.mozilla.org/en-US/docs/Web/CSS/flex-grow)). The default value is `0` if `width` is `auto`, `1` otherwise.

Both `[row]` and `[column]` accepts following optional attributes:

* `id` – adds an `id` attribute with the provided value.
* `class` – adds a `class` attribute with the provided value.
* `style` – adds a `style` attribute with the provided value.

To avoid `<br>` between the columns, consider to install the plugin [Kntnt Disable Wpautop in Shortcodes](https://github.com/Kntnt/kntnt-disable-wpautop-in-shortcodes).

## How to use

Typically use of the shortcodes looks like this:

	[row]
	  [column width="…"]…[/column]
	  [column width="…"]…[/column]
	    …
	  [column]…[/column]
	[/columns]

Examples:

    [row]
      [column]1/1 wide column[/column]
    [/row]
    
    [row]
      [column width="50%"]1/2 wide column[/column]
      [column]1/2 wide column[/column]
    [/row]
    
    [row]
      [column width="25%"]1/4 wide column[/column]
      [column]3/4 wide column[/column]
    [/row]
    
    [row]
      [column width="75%"]3/4 wide column[/column]
      [column]1/4 wide column[/column]
    [/row]
    
    [row]
      [column width="33.33%"]1/3 wide column[/column]
      [column]2/3 percentage wide column[/column]
    [/row]
    
    [row]
      [column]2/3 wide column[/column]
      [column width="33.33%"]1/3 wide column[/column]
    [/row]
    
    [row]
      [column width="33.33%"]1/3 wide column[/column]
      [column width="33.33%"]1/3 wide column[/column]
      [column]1/3 wide column[/column]
    [/row]
    
    [row]
      [column width="25%"]1/4 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
      [column]1/2 wide column[/column]
    [/row]
    
    [row]
      [column width="25%"]1/4 wide column[/column]
      [column]1/2 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
    [/row]
    
    [row]
      [column]1/2 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
    [/row]
    
    [row]
      [column width="25%"]1/4 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
      [column width="25%"]1/4 wide column[/column]
      [column]1/4 wide column[/column]
    [/row]

## Installation

Install the plugin [the usually way](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

You can also install it with [*GitHub Updater*](https://github.com/afragen/github-updater/archive/develop.zip), which gives you the additional benefit of keeping the plugin up to date from within its administrative interface (i.e. the usually way). Please visit its [wiki](https://github.com/afragen/github-updater/wiki) for more information.

## Frequently Asked Questions

### Where is the setting page?

This plugin has no settings.

### How do I know if there is a new version?

This plugin is currently [hosted on GitHub](https://github.com/kntnt/kntnt-column-content); one way would be to ["watch" the repository](https://help.github.com/articles/watching-and-unwatching-repositories/).

If you prefer WordPress to nag you about an update and let you update from within its administrative interface (i.e. the usually way) you must [download *GitHub Updater*](https://github.com/afragen/github-updater/archive/develop.zip) and install and activate it the usually way. Please visit its [wiki](https://github.com/afragen/github-updater/wiki) for more information. 

### How can I get help?

If you have a questions about the plugin, and cannot find an answer here, start by looking at [issues](https://github.com/kntnt/kntnt-column-content/issues) and [pull requests](https://github.com/kntnt/kntnt-column-content/pulls). If you still cannot find the answer, feel free to ask in the the plugin's [issue tracker](https://github.com/kntnt/kntnt-column-content/issues) at Github.

### How can I report a bug?

If you have found a potential bug, please report it on the plugin's [issue tracker](https://github.com/kntnt/kntnt-column-content/issues) at Github.

### How can I contribute?

Contributions to the code or documentation are much appreciated.

If you are unfamiliar with Git, please post it as a new issue on the plugin's [issue tracker](https://github.com/kntnt/kntnt-column-content/issues) at Github.

If you are familiar with Git, please do a pull request.

## Changelog

### 1.0.0.

Initial release.