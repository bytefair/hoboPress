# hoboPress
## Simple, modernized development workflow for WordPress
hoboPress is a modernized yet versatile workflow for WordPress apps. It's set up for easier portability of app code, better management of WordPress using Composer, quick access to a running Vagrant box, and environment management.

It's also meant to be agnostic to deployment strategies, containing only two small, unrequired must-use plugins. Aside from some app configuration, it contains no major changes to core WordPress that should affect your development.

# Setup
App code should be stored in `/app`. When you first download the repo, a simple `composer install` will add all of the dependencies you need. `vagrant up` will start your VM at the address defined in `Vagrantfile` and your `.env`. You will see a fail message when you try to boot your VM if you don't have a `.env` file.
