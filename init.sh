#!/bin/sh
die() {
  echo "{$0}: {$@}" 1>&2
  exit 1
}

idempotent_cp() {
  if [ ! -f "$2"  ]; then
    cp "$1" "$2"
  fi
}

idempotent_cp cli-vars-sample.php cli-vars.php
idempotent_cp vars-sample.php vars.php

if command -v wp; then
  wp core download
else
  die "wp-cli required; see http://wp-cli.org for more details"
fi
