# My Personal Website:

## Target

* to present me an give access to the resources I share
* to test Many technologies that can be used on a traditional _web site hosting_

## Technologies I want to test:

* [Symfony v3](https://symfony.com/) for the backend
* [Angular 2](https://angular.io/)  for the front end
* [D3 js](https://d3js.org/) for graphic animations
  * As the webmaster of [the Roller Skating Montreuil](http://rsmontreuil.fr/) my interest using that library lies in buding tools to extract performance plots from the skaters gears
    * (GPS Watches, Smartphones)
* [Bootstrap 4](https://v4-alpha.getbootstrap.com/) for the responsive design of my Website...

## How to use it:

### Create your Deve environment out of my sources

* first clone tho git repo:
  * In my case _(french Ubuntu 16.04)_ it gives:
   	
```bash
jpmena@jpmena-P34:~/CONSULTANT$ git clone git@github.com:javaskater/jpmena.git
Clonage dans 'jpmena'...
remote: Counting objects: 996, done.
remote: Compressing objects: 100% (54/54), done.
remote: Total 996 (delta 29), reused 67 (delta 24), pack-reused 912
Réception d'objets: 100% (996/996), 35.72 MiB | 829.00 KiB/s, fait.
Résolution des deltas: 100% (475/475), fait.
Vérification de la connectivité... fait.
```
* Then lauch the embedded bash script 
  * to load the libraries
    * php / composer see [link to global composer installation](https://getcomposer.org/download/)
    * NodeJS /  bower see [link to global bower installation through npm](https://bower.io/#install-bower)
      * that previously means [installing npm through NodeJS see this link](https://docs.npmjs.com/getting-started/installing-node)
      * or more specifically for my Ubuntu [that link](https://doc.ubuntu-fr.org/nodejs)
      * We have a small issue with _bower install_ see solved with the following commands see [that bower issue on GitHub](https://github.com/bower/bower/issues/2262)

```bash
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ sudo chown -R $USER:$GROUP ~/.npm
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ sudo chown -R $USER:$GROUP ~/.config
```

* For compiling scss to css you will need:
  * NodeJS / grunt see [link to the global installation of the grunt client through npm](https://gruntjs.com/getting-started)
    * that previously means [installing npm through NodeJS see this link](https://docs.npmjs.com/getting-started/installing-node)
    * or more specifically for my Ubuntu [that link](https://doc.ubuntu-fr.org/nodejs)
    * I have to have tthe system sass compiler like described on [the sass lang website](http://sass-lang.com/install) :

#### [installing the sass compiler](http://sass-lang.com/install)

* Following the [sass lang installaion guide](http://sass-lang.com/install)
* The same prerequisite can be found on the [grunt-contrib-sass GitHub main page](https://github.com/gruntjs/grunt-contrib-sass#sass-task)


```bash
#installing Ruby through the Ubuntu package manager
jpmena@jpmena-P34:~$ sudo apt install ruby
[sudo] Mot de passe de jpmena : 
Lecture des listes de paquets... Fait
Construction de l arbre des dépendances       
Lecture des informations d état... Fait
Les paquets supplémentaires suivants vont être installés :
  fonts-lato libruby2.3 rake ruby-did-you-mean ruby-minitest ruby-net-telnet ruby-power-assert ruby-test-unit ruby2.3 rubygems-integration
Paquets suggérés :
  ri ruby-dev bundler
Les NOUVEAUX paquets suivants seront installés :
  fonts-lato libruby2.3 rake ruby ruby-did-you-mean ruby-minitest ruby-net-telnet ruby-power-assert ruby-test-unit ruby2.3 rubygems-integration
0 mis à jour, 11 nouvellement installés, 0 à enlever et 9 non mis à jour.
Il est nécessaire de prendre 5 880 ko dans les archives.
Après cette opération, 26,8 Mo d espace disque supplémentaires seront utilisés.
Souhaitez-vous continuer ? [O/n] #we answer yes or O in french in my case
......................................
Paramétrage de rake (12.0.0-1) ...
Traitement des actions différées (« triggers ») pour libc-bin (2.26-0ubuntu2) ...
#we check Ruby installation by asking for the version
jpmena@jpmena-P34:~$ ruby -v
ruby 2.3.3p222 (2016-11-21) [x86_64-linux-gnu]
#the we ask Ruby's package manager to install the sass compiler
##but we have previously to add the header file to permit the compilation of sass sources
jpmena@jpmena-P34:~$ sudo apt install ruby-dev
.........................
##we then launch the compilation itself !!!
jpmena@jpmena-P34:~$ sudo gem install sass --no-user-install
Building native extensions.  This could take a while...
..........................................
Done installing documentation for ffi, rb-inotify, sass-listen, sass after 10 seconds
4 gems installed
#we then test grunt compilation, it works !!!!
jpmena@jpmena-P34:~$ cd CONSULTANT/jpmena/web/jpm/
jpmena@jpmena-P34:~/CONSULTANT/jpmena/web/jpm$ grunt compile
Running "sass:dist" (sass) task

Done.
```

### installing sqlite and itss php adapter:

* That project uses a small sqlite database to store some user interaction
* We need to 

```bash
#I need the php driver for sqlite3's databases
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ sudo apt install php-sqlite3
Lecture des listes de paquets... Fait
Construction de l arbre des dépendances       
Lecture des informations d état... Fait
Les paquets supplémentaires suivants vont être installés :
  php7.1-sqlite3
Les NOUVEAUX paquets suivants seront installés :
  php-sqlite3 php7.1-sqlite3
0 mis à jour, 2 nouvellement installés, 0 à enlever et 9 non mis à jour.
Il est nécessaire de prendre 27,8 ko dans les archives.
Après cette opération, 123 ko d espace disque supplémentaires seront utilisés.
Souhaitez-vous continuer ? [O/n] O
..........................................
##I install the bash client to manange sqlite3's databases
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ sudo apt install sqlite3
Lecture des listes de paquets... Fait
Construction de l arbre des dépendances       
Lecture des informations d état... Fait
Paquets suggérés :
  sqlite3-doc
Les NOUVEAUX paquets suivants seront installés :
  sqlite3
0 mis à jour, 1 nouvellement installés, 0 à enlever et 9 non mis à jour.
Il est nécessaire de prendre 709 ko dans les archives.
Après cette opération, 2 392 ko d espace disque supplémentaires seront utilisés.
............................................................
#I also install a graphical user interface to manage sqlite3's databases
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ sudo apt install sqlitebrowser
Lecture des listes de paquets... Fait
Construction de l arbre des dépendances       
Lecture des informations d état... Fait
Les paquets supplémentaires suivants vont être installés :
  libdouble-conversion1 libqcustomplot1.3 libqt5core5a libqt5dbus5 libqt5gui5 libqt5network5 libqt5printsupport5 libqt5scintilla2-12v5 libqt5scintilla2-l10n libqt5svg5 libqt5widgets5 libxcb-xinerama0
  qt5-gtk-platformtheme qttranslations5-l10n
Paquets suggérés :
  qt5-image-formats-plugins qtwayland5
Les NOUVEAUX paquets suivants seront installés :
  libdouble-conversion1 libqcustomplot1.3 libqt5core5a libqt5dbus5 libqt5gui5 libqt5network5 libqt5printsupport5 libqt5scintilla2-12v5 libqt5scintilla2-l10n libqt5svg5 libqt5widgets5 libxcb-xinerama0
  qt5-gtk-platformtheme qttranslations5-l10n sqlitebrowser
0 mis à jour, 15 nouvellement installés, 0 à enlever et 9 non mis à jour.
Il est nécessaire de prendre 11,4 Mo dans les archives.
Après cette opération, 48,9 Mo d espace disque supplémentaires seront utilisés.
Souhaitez-vous continuer ? [O/n] #I answer O for Yes (in french)
........................................
```


### Launching the script

* You also need to have sqlite and phpsqlite insstalled on your Ubunttu workstation
* Launching the script produces in my case _(french Ubuntu 17.10)_ the following result:
   	
```bash
jpmena@jpmena-P34:~/CONSULTANT$ cd jpmena/scripts/dev/
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ ./createDevWebsite.sh 
++ We actually add the vendor part of our symfony3's project through composer
You are running composer with xdebug enabled. This has a major impact on runtime performance. See https://getcomposer.org/xdebug
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
  - Installing doctrine/lexer (v1.0.1)
    Loading from cache

  - Installing doctrine/annotations (v1.2.7)
    Loading from cache

  - Installing twig/twig (v1.31.0)
    Loading from cache

  - Installing symfony/polyfill-util (v1.3.0)
    Loading from cache

  - Installing paragonie/random_compat (v2.0.4)
    Loading from cache

  - Installing symfony/polyfill-php70 (v1.3.0)
    Loading from cache

  - Installing symfony/polyfill-php56 (v1.3.0)
    Loading from cache

  - Installing symfony/polyfill-mbstring (v1.3.0)
    Loading from cache

  - Installing symfony/symfony (v3.2.4)
    Loading from cache

  - Installing symfony/polyfill-intl-icu (v1.3.0)
    Loading from cache

  - Installing psr/log (1.0.2)
    Loading from cache

  - Installing psr/cache (1.0.1)
    Loading from cache

  - Installing doctrine/inflector (v1.1.0)
    Loading from cache

  - Installing doctrine/collections (v1.3.0)
    Loading from cache

  - Installing doctrine/cache (v1.6.1)
    Loading from cache

  - Installing doctrine/common (v2.6.2)
    Loading from cache

  - Installing jdorn/sql-formatter (v1.2.17)
    Loading from cache

  - Installing doctrine/doctrine-cache-bundle (1.3.0)
    Loading from cache

  - Installing doctrine/dbal (v2.5.12)
    Loading from cache

  - Installing doctrine/doctrine-bundle (1.6.7)
    Loading from cache

  - Installing doctrine/instantiator (1.0.5)
    Loading from cache

  - Installing doctrine/orm (v2.5.6)
    Loading from cache

  - Installing incenteev/composer-parameter-handler (v2.1.2)
    Loading from cache

  - Installing sensiolabs/security-checker (v4.0.0)
    Loading from cache

  - Installing sensio/distribution-bundle (v5.0.18)
    Loading from cache

  - Installing sensio/framework-extra-bundle (v3.0.22)
    Loading from cache

  - Installing monolog/monolog (1.22.0)
    Loading from cache

  - Installing symfony/monolog-bundle (v3.0.3)
    Loading from cache

  - Installing symfony/polyfill-apcu (v1.3.0)
    Loading from cache

  - Installing swiftmailer/swiftmailer (v5.4.6)
    Loading from cache

  - Installing symfony/swiftmailer-bundle (v2.4.2)
    Loading from cache

  - Installing kint-php/kint (1.1)
    Loading from cache

  - Installing sensio/generator-bundle (v3.1.2)
    Loading from cache

  - Installing symfony/phpunit-bridge (v3.2.4)
    Loading from cache

paragonie/random_compat suggests installing ext-libsodium (Provides a modern crypto API that can be used to generate random bytes.)
doctrine/doctrine-cache-bundle suggests installing symfony/security-acl (For using this bundle to cache ACLs)
sensio/framework-extra-bundle suggests installing symfony/psr-http-message-bridge (To use the PSR-7 converters)
monolog/monolog suggests installing aws/aws-sdk-php (Allow sending log messages to AWS services like DynamoDB)
monolog/monolog suggests installing doctrine/couchdb (Allow sending log messages to a CouchDB server)
monolog/monolog suggests installing ext-amqp (Allow sending log messages to an AMQP server (1.0+ required))
monolog/monolog suggests installing ext-mongo (Allow sending log messages to a MongoDB server)
monolog/monolog suggests installing graylog2/gelf-php (Allow sending log messages to a GrayLog2 server)
monolog/monolog suggests installing mongodb/mongodb (Allow sending log messages to a MongoDB server via PHP Driver)
monolog/monolog suggests installing php-amqplib/php-amqplib (Allow sending log messages to an AMQP server using php-amqplib)
monolog/monolog suggests installing php-console/php-console (Allow sending log messages to Google Chrome)
monolog/monolog suggests installing rollbar/rollbar (Allow sending log messages to Rollbar)
monolog/monolog suggests installing ruflin/elastica (Allow sending log messages to an Elastic Search server)
monolog/monolog suggests installing sentry/sentry (Allow sending log messages to a Sentry server)
symfony/phpunit-bridge suggests installing ext-zip (Zip support is required when using bin/simple-phpunit)
Generating autoload files
> Incenteev\ParameterHandler\ScriptHandler::buildParameters
Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_path ('%kernel.root_dir%/../var/data/data.sqlite'): #let the default answer (we are on a dev site)
mailer_transport (mail): #let the default answer (we are on a dev site)
mailer_host (auth.smtp.1and1.fr): #let the default answer (we are on a dev site)
mailer_user ('my 1and1 mail'): #let the default answer (we are on a dev site)
mailer_password ('my 1and1 password'): #let the default answer (we are on a dev site)
mailer_type (memory): #let the default answer (we are on a dev site)
mailer_encryption (tls): #let the default answer (we are on a dev site)
secret (ThisTokenIsNotSoSecretChangeIt): #let the default answer (we are on a dev site)
my_ga_code ('replace with your ua code'): #let the default answer (we are on a dev site)
> Sensio\Bundle\DistributionBundle\Composer\ScriptHandler::buildBootstrap
> Sensio\Bundle\DistributionBundle\Composer\ScriptHandler::clearCache

 // Clearing the cache for the dev environment with debug                       
 // true                                                                        

                                                                                
 [OK] Cache for the "dev" environment (debug=true) was successfully cleared.    
                                                                                

> Sensio\Bundle\DistributionBundle\Composer\ScriptHandler::installAssets

 Trying to install assets as relative symbolic links.

 -- -------- ---------------- 
     Bundle   Method / Error  
 -- -------- ---------------- 

                                                                                
 [OK] All assets were successfully installed.                                   
                                                                                

> Sensio\Bundle\DistributionBundle\Composer\ScriptHandler::installRequirementsFile
> Sensio\Bundle\DistributionBundle\Composer\ScriptHandler::prepareDeploymentTarget
 We want to create the database var/data/data.sqlite
ATTENTION: This operation should not be executed in a production environment.

Creating database schema...
Database schema created successfully!
 we need to add the node dependencies to our web project
bower font-awesome#^4.7.0       cached https://github.com/FortAwesome/Font-Awesome.git#4.7.0
bower font-awesome#^4.7.0     validate 4.7.0 against https://github.com/FortAwesome/Font-Awesome.git#^4.7.0
bower bootstrap#v4.0.0-beta     cached https://github.com/twbs/bootstrap.git#4.0.0-beta
bower bootstrap#v4.0.0-beta   validate 4.0.0-beta against https://github.com/twbs/bootstrap.git#v4.0.0-beta
bower popper.js#^1.11.0         cached https://github.com/FezVrasta/popper.js.git#1.12.5
bower popper.js#^1.11.0       validate 1.12.5 against https://github.com/FezVrasta/popper.js.git#^1.11.0
bower jquery#>=1.9.1            cached https://github.com/jquery/jquery-dist.git#3.2.1
bower jquery#>=1.9.1          validate 3.2.1 against https://github.com/jquery/jquery-dist.git#>=1.9.1
bower font-awesome#^4.7.0      install font-awesome#4.7.0
bower bootstrap#v4.0.0-beta    install bootstrap#4.0.0-beta
bower popper.js#^1.11.0        install popper.js#1.12.5
bower jquery#>=1.9.1           install jquery#3.2.1

font-awesome#4.7.0 bower_components/font-awesome

bootstrap#4.0.0-beta bower_components/bootstrap
├── jquery#3.2.1
└── popper.js#1.12.5

popper.js#1.12.5 bower_components/popper.js

jquery#3.2.1 bower_components/jquery
makes the symfony's var directory writable by Apache !!!
Website ready for use ...

```
* Then create and activate an Apache Virtual Host that pointss to the web directory of that [Symfony3](https://symfony.com/download) installation:
  * In my case _(french Ubuntu 16.04)_ it gives:
  
```bash
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ cat /etc/apache2/sites-available/sjpmena.conf 
<VirtualHost *:80>
        ServerName jpmena.and
        ServerAlias jpmena.ovh

        ServerAdmin webmaster@localhost

        DocumentRoot "/home/jpmena/CONSULTANT/jpmena/web"
	<Directory "/home/jpmena/CONSULTANT/jpmena/web">
		Options Indexes FollowSymLinks ExecCGI
		AllowOverride All
		Order allow,deny
		Allow from all
		Require all granted
	</Directory>
        
        ErrorLog /var/log/apache2/jpmena.and-error.log
        
        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn
        
        CustomLog /var/log/apache2/jpmena.and-access.log combined
        ServerSignature On
</VirtualHost>

```
### While developping

* another interesting script, is the ambedded one used for clearing the cache through the cconssole
  * it change the owner of files and directories in order for the console and apache to be able to write them when necessary
  
```bash
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts/dev$ ./clearCache.sh 
changing the proprietary/group of ../../var/cache
[sudo] Mot de passe de jpmena : #give your admin password!
cleaning the symfony cache for dev mode

 // Clearing the cache for the dev environment with debug true                                                          

                                                                                                                        
 [OK] Cache for the "dev" environment (debug=true) was successfully cleared.                                            
                                                                                                                        

cleaning the symfony cache for prod mode

 // Clearing the cache for the prod environment with debug false                                                        

                                                                                                                        
 [OK] Cache for the "prod" environment (debug=false) was successfully cleared.                                          
                                                                                                                        

changing the proprietary/group of ../../var/cache

```

### make a bundle for your prod website:

* After you have git-committed your devs, just launch the embedded script:

 
```bash
jpmena@jpmena-P34:~/CONSULTANT/jpmena/scripts$ ./gitarchive.sh
......................
# your will have to answer the same questions as before
## don't let the default value, answer with the production' ones
##if necessary ....
.....................
font-awesome#4.7.0 bower_components/font-awesome

bootstrap#4.0.0-beta bower_components/bootstrap
├── jquery#3.2.1
└── popper.js#1.12.5

jquery#3.2.1 bower_components/jquery

popper.js#1.12.5 bower_components/popper.js
'var/data/data.sqlite' -> '/home/jpmena/CONSULTANT/tmp/jpmena/var/data/data.sqlite'
archive: /home/jpmena/CONSULTANT/tmp/jpmena_2017-09-02_152237.zip
```

* The last output's line tells you your bundle is at _(in my case)_ : __${HOME}CONSULTANT/tmp/jpmena_2017-09-02_152237.zip__

```bash
#where the bundle is (zip file) the jpmena dir is its content
jpmena@jpmena-P34:~/CONSULTANT/tmp$ ls -ltr
total 16936
drwxrwxr-x 11 jpmena jpmena     4096 sept.  2 15:22 jpmena
-rw-rw-r--  1 jpmena jpmena 17335170 sept.  2 15:24 jpmena_2017-09-02_152237.zip
# an aspect of the content of the bundle
jpmena@jpmena-P34:~/CONSULTANT/tmp$ unzip -l jpmena_2017-09-02_152237.zip | tail -10
      969  2017-09-02 14:57   jpmena/src/AppBundle/Entity/Contact.php~
        0  2017-09-02 14:57   jpmena/src/AppBundle/EventSubscriber/
     2370  2017-09-02 14:57   jpmena/src/AppBundle/EventSubscriber/LocaleSubscriber.php
        0  2017-09-02 14:57   jpmena/src/AppBundle/Repository/
      237  2017-09-02 14:57   jpmena/src/AppBundle/Repository/ContactRepository.php
        0  2017-09-02 14:57   jpmena/src/AppBundle/Controller/
      601  2017-09-02 14:57   jpmena/src/AppBundle/Controller/DefaultController.php
     8466  2017-09-02 14:57   jpmena/src/AppBundle/Controller/JPMController.php
---------                     -------
 45587905                     10898 files

```

* just upload it tou your production ssite, and unzip it at the correct location (see archive's content above)

## Some technical points

### Contact Form

* The contact requests are first stored inn a sqlite table:

``` sql
CREATE TABLE `Contact` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT NOT NULL,
	`userlocale`	TEXT NOT NULL DEFAULT 'en',
	`email`	TEXT NOT NULL,
	`message`	TEXT NOT NULL,
	`subject`	TEXT NOT NULL,
	`requestdate`	TEXT
);
```

* After the request is sent to me ...

## Migration to the [Bootstrap 4 Beta Version](https://getbootstrap.com/docs/4.0/getting-started/introduction/) 

* [Using official Bootsstrap4 examples](https://getbootstrap.com/docs/4.0/examples/)
* I changed from npm to __[bower](https://bower.io/)__ for managing assets' libraries (Bower manage dependencies, npm does not)
  * [popper.js](https://popper.js.org/index.html) does not work as a bower component! I ned to get it through the [CDN library's link](https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js) !!
  * what about npm/popper?


## TODOS

* see [TODO page in this embedded documentation](docs/TODO.md)
* also the problems I meet during development and their potential solutions are described [in a dedicated Problems' page](docs/PROBLEMS.md) 