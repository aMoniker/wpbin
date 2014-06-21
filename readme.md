## wpbin.io

[http://wpbin.io](http://wpbin.io) is just the coolest Wordpress paste site, you know?


### Development

Included is a `vagrant/` directory which contains everything you need to boot up a pre-configured VM to use as a local dev environment. Of course, you can also use your own setup if you like.

To use the included vagrant config, two files need to be copied and configured:

- `vagrant/Vagrantfile.template` should be copied to `vagrant/Vagrantfile` and updated with the networking option you like best, and configured with the path to your WPBin repo on your host box
- `vagrant/conf/playbook.yml.template` should be copied to `vagrant/conf/playbook.yml` and configured with the local url you'd like to use (this defaults to *http://www.wpbin.lan*)

Make sure to update your `/etc/hosts` or local DNS so your chosen local url points to the right IP

After the configs are in place, run `vagrant up` inside the `vagrant/` directory. This will download the VM from vagrantcloud (if necessary), create the VM, boot it, and provision it using the included ansible config. After booting up, ssh in by running `vagrant ssh`

To get the site working, you'll need to create the database which can be done with:

- `./artisan migrate` (inside the `/var/www/[local.name]` directory)

Seed the database with WP Codex links by running `./artisan scrape:tags`

Et voila!