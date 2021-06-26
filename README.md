# Pico Index Fallback Plugin

Fallback when index.md file does not exist on [Pico](https://picocms.org/).

## Changelog

**1.0** - Initial release.

## How it works

The default is to load the `index.md` file, if this file does not exist returns page not found. This plugin looks for a README.md file (for example) if the index.md file does not exist.

It is possible to rename the fallback file. See below.

## Installation

1. Copy the `PicoIndexFallback.php` file to the plugins folder of your Pico site.
2. That's it!

## Configuration settings

You can configure the fallback filename on your site's `config.yml` file.

| Option | Default | Options | Notes  |
| ------ | ------- | ------- | ------ |
| `fallback_to_index` | str: `"README"` | n/a | The fallback file will always be .md (lowercase) so don't put the extension. The filename is case insensitive so you can create a Readme.md, ReAdMe.md or README.md file that will work. |

```yml
fallback_to_index: "Readme"
```

## Motivation to create this plugin

The Collective app for Nextcloud creates `Readme.md` files by default. Creating a website pointing to a Collective folder doesn't work so I created this app to solve the problem.

---

That's it. If you have questions, go ahead and ask. If you have issues, you can add them to the [issue tracker](https://github.com/lyseontech/PicoIndexFallback/issues).

🎉 Thank you to everyone who has helped contribute to this plug in!

*If you see something that you think is missing, pop open the plugin file and see if you can add it. I'm happy to accept sensible MRs!*
