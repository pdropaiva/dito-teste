FROM mongo:3.6

LABEL maintainer pedro.paiva@dito.com.br

EXPOSE 27017

VOLUME /data/db

COPY mongodb-setup.js /docker-entrypoint-initdb.d/
