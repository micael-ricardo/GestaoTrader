FROM php:8.2-cli-buster


RUN apt-get update \
  && apt-get install -y --no-install-recommends \
     gnupg2 \
     apt-transport-https \
     curl \
     unzip \
     zip \
     unixodbc-dev \
     libgssapi-krb5-2 \
     pkg-config \
     libonig-dev \
     libxml2-dev \
     libtool \
     libssl-dev \
     libcurl4-openssl-dev \
     lsb-release \
  && curl -sSL https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
  && curl -sSL https://packages.microsoft.com/config/ubuntu/22.04/prod.list \
       > /etc/apt/sources.list.d/mssql-release.list \
  && apt-get update \
  && ACCEPT_EULA=Y apt-get install -y msodbcsql17 \
  && rm -rf /var/lib/apt/lists/*

RUN pecl install sqlsrv pdo_sqlsrv \
  && docker-php-ext-enable sqlsrv pdo_sqlsrv

RUN docker-php-ext-install \
     pdo_mysql \
     mbstring \
     bcmath \
     xml \
     pcntl 

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader


EXPOSE 8000

CMD ["sh","-c","php artisan migrate --force; php artisan serve --host=0.0.0.0 --port=8000"]
