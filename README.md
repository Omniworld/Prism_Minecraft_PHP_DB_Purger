Prism_Minecraft_PHP_DB_Purger
=============================

Script to purge the Prism (http://discover-prism.com/) DB without relying on the built-in function.

Prism is a block logging plugin for Minecraft.

You could run this daily with cron for example.

On linux, you can output the logs to a file by setting up a script like that:

#!/bin/sh
PHPFILE="PATH/TO/PHPFILE"
LOGFILE="PATH/TO/LOGFILE"

php PHPFILE >> LOGFILE
