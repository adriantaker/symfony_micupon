Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname= "VagUbuntu14LTS"
  config.vm.define "ubuntu14lts" 
  config.vm.network :forwarded_port, guest: 80, host: 5050
  config.vm.network :forwarded_port, guest: 8000, host:9000 
  config.vm.network :forwarded_port, guest: 3306, host:3307
  config.vm.provision :shell, path: "bootstrap.sh"
end
