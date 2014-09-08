#!/bin/sh
# will be source-d
site="REPLACE_SITE"
db="REPLACE_DB_HOST"
ssh_host="REPLACE_SSH_HOST"
host_webroot="REPLACE_WEBROOT"

DIR="$( cd "$( dirname "$0" )" && pwd )"

db_sync() {
  if [ "${WEB_ENVIRONMENT}" != 'live' ]; then
    SQLDUMP="$(date "+%Y%m%d").mysql"

    if command -v pv; then
      PV=`which pv`
    else
      PV=`which cat`
    fi

    if [ ! -f ${SQLDUMP} ]; then
      \ssh ${ssh_host} "mysqldump -C --databases ${db}" > "${SQLDUMP}"
    fi
    ${PV} "${SQLDUMP}" | mysql

    wp search-replace \
      "http://${site}" \
      "http://${WEB_ENVIRONMENT}.${site}"
    rsync -r \
      "${ssh_host}:${host_webroot}/$site/htdocs/wp-content/uploads/" \
      "${DIR}/htdocs/wp-content/uploads/"
  fi
}

