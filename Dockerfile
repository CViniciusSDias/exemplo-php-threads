FROM php:7.2.9-zts
WORKDIR /home

RUN apt update
RUN apt install -y git

RUN git clone https://github.com/krakjoe/pthreads.git
WORKDIR /home/pthreads
RUN phpize
RUN ./configure
RUN make
RUN make install
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN echo "extension=pthreads" >> /usr/local/etc/php/php.ini

WORKDIR /home

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

CMD ["bash"]

