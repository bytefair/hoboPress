# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "scotch/box"
  config.vm.network :private_network, id: "wp_primary", ip: "192.168.33.10"
  config.vm.hostname = "hobopress"
  config.vm.synced_folder ".", "/var/www/public", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
  config.vm.provider :virtualbox do |v|
    v.customize ["modifyvm", :id, "--memory", 1024]
    v.customize ["modifyvm", :id, "--cpus", 1]
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--natdnsproxy1", "on"]

    # Set the box name in VirtualBox to match the working directory.
    vvv_pwd = Dir.pwd
    v.name = File.basename(vvv_pwd)
  end

  config.ssh.forward_agent = true

  if defined? VagrantPlugins::Triggers
    config.trigger.before :halt, :stdout => true do
      run "vagrant ssh -c '/var/www/public/db_backup'"
    end
    config.trigger.before :suspend, :stdout => true do
      run "vagrant ssh -c '/var/www/public/db_backup'"
    end
    config.trigger.before :destroy, :stdout => true do
      run "vagrant ssh -c '/var/www/public/db_backup'"
    end
  end
end
