#!/bin/bash
printf ' * Moving public files...'
cp -R ./ /home/now-yakutsk/public
echo ' ok '
printf ' * Permissions to www-data...'
chown -R www-data:www-data /home/now-yakutsk/public
echo ' ok '