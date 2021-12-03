#!/usr/bin/env bash

sudo -E -u www-data php artisan migrate --force || exit 1
