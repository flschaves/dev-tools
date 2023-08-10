# Plugin releases

A WordPress plugin that helps your daily development experience.
This was created to my particular use, so some functionality could be really specific to my daily basis.

## Installation

Dump the PSR-4 autoload files:

```bash
  composer dump-autoload
```

Add constants to add in `wp-config.php` file:
```
define( 'DEV_TOOLS_ZENHUB_TOKEN', '' ); // https://app.zenhub.com/settings/tokens
define( 'DEV_TOOLS_GITHUB_TOKEN', '' ); // https://github.com/settings/tokens
define( 'DEV_TOOLS_GITHUB_REPO_ID', '' ); // https://stackoverflow.com/questions/13902593/how-does-one-find-out-ones-own-repo-id
```
