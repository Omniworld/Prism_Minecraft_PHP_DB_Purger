Prism Minecraft PHP DB Purger
=============================

Script to purge the Prism (http://discover-prism.com/) DB without relying on the built-in function.

Prism is a block logging plugin for Minecraft.

The built-in purge function is easy to configure, but especially with big databases, it performs very slow. This script is only limited by the php time out (set_time_limit), so you might have to increase your time limit if it doesnt run through.

You could run this daily with cron for example.

On linux, you can output the logs to a file by setting up a script like that:

#Generate Logfile

\#!/bin/sh

PHPFILE="PATH/TO/PHPFILE"

LOGFILE="PATH/TO/LOGFILE"


php PHPFILE >> LOGFILE
