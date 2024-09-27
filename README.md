## INTRODUCTION

The Simple Dblog Control module allows you to limit the events recorded in DbLog

The primary use case for this module is to prevent certain events from being logged,
especially while developing, such as cron execution messages, which fill
the error report with irrelevant information.

## REQUIREMENTS

Database Logging (dblog) core module

## INSTALLATION

Install as you would normally install a contributed Drupal module.
See: https://www.drupal.org/node/895232 for further information.

## CONFIGURATION
The configuration form allows you to enter the channels to block (such as cron,
locale or mail, for example) or to filter certain text strings.

## MAINTAINERS

Current maintainers for Drupal 10:

- Carlos Espino (carlos-espino) - https://www.drupal.org/u/carlos-espino

