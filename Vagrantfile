# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  if Vagrant.has_plugin?("vagrant-cachier")
    config.cache.scope = :box

    # MEMO: apt-get update でpermissionエラーが起こる現象の対応
    # https://bugs.launchpad.net/ubuntu/+source/aptitude/+bug/1543280
    config.cache.synced_folder_opts = {
      owner: "_apt",
    }
  end
  
  if Vagrant.has_plugin?("vagrant-vbguest") then
    config.vbguest.auto_update = true
  end

  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.cpus = 2
    vb.memory = "4096"
#    vb.customize ["modifyvm", :id, "--ioapic", "on"]
    vb.customize ["modifyvm", :id, "--memory", 4096]
  end

  config.vm.define :mssql do |server|
    server.vm.hostname = "mssql"
    server.vm.box = "opscode-ubuntu-16.04"
    server.vm.box_url = "http://opscode-vm-bento.s3.amazonaws.com/vagrant/virtualbox/opscode_ubuntu-16.04_chef-provisionerless.box"
    server.vm.network :private_network, ip: "192.168.53.10"
    server.vm.network :forwarded_port, host: 8532, guest: 22

    server.vm.synced_folder "application", "/home/vagrant/application",
     id: "vagrant-root", :nfs => false,
     :owner => "vagrant",
     :group => "www-data",
     :mount_options => ["dmode=775,fmode=775"]

    server.vm.provision "ansible_local" do |ansible|
      ansible.limit               = 'all'
      ansible.install             = true
      ansible.inventory_path      = "ansible/hosts"
      ansible.playbook            = "ansible/vagrant.yml"
      ansible.verbose             = true
    end
  end
end
