#!/bin/bash

netInterfaz="eth0"
netIP="192.168.47.10"
netGW="192.168.47.254"
netMASK="255.255.255.0"
netDNS="8.8.8.8"
hostname=""

#Paquetes a instalar
paquetes=("openssh-server" "nginx" )

#Comprovar si el script se ejecuta como root
if [ "$(id -u)" -ne 0 ]; then
    echo "Sin permisos de root"
    exit 1
fi

#Comprovacion del sistema operativo ubuntu 14.04
if [ "$(lsb_release -rs)" != "14.04" ]; then
    echo "Este script solo es compatible en Ubuntu 14.04"
    exit 1
fi

#Configuración de red
rm /etc/network/interfaces 
touch /etc/network/interfaces
bash -c "cat > /etc/network/interfaces <<EOF
auto lo
iface lo inet loopback

#Interzad de red primaria
auto $netInterfaz
iface $netInterfaz inet static
    address $netIP
    netmask $netMASK
    gateway $netGW
    dns-nameservers $netDNS
EOF"

#Reiniciar interfaz de red
ifdown eth0 &&  ifup eth0

#Configuración de la zona horaria 
timedatectl set-timezone Europe/Madrid

#Actualizar repositorios
apt-get update > /dev/null 

#Desisntalar servicios y eliminar configuraciones
for paquete in "${paquetes[@]}"; do
    sudo apt-get remove --purge -y "$paquete" 
done


# Instala los paquetes
for paquete in "${paquetes[@]}"; do
    sudo apt-get install -y "$paquete" 
done



#Confiuracion servicios
##Configuracion ssh
rm /etc/ssh/sshd_config
cp ./$(dirname "$0")/configuraciones/sshd_config /etc/ssh/sshd_config

##Configuracion nginx
rm /etc/nginx/sites-enabled/default
cp $(dirname "$0")/configuraciones/nginx/ipcam /etc/nginx/sites-available/
cp $(dirname "$0")/configuraciones/nginx/home /etc/nginx/sites-available/
mkdir -p /var/www/ipcam
mkdir -p /var/www/home
ln -s /etc/nginx/sites-available/ipcam /etc/nginx/sites-enabled/ipcam
ln -s /etc/nginx/sites-available/home /etc/nginx/sites-enabled/home
sudo chown -R www-data:www-data /var/www/ipcam
sudo chown -R www-data:www-data /var/www/home
sudo chmod -R 755 /var/www/ipcam
sudo chmod -R 755 /var/www/home



#HAbilitar y levantar servicios
service ssh enable
service nginx enable
service nginx start
service ssh start

#Configuracion cortafuegos
./$(dirname "$0")/configuraciones/reglasFirewall.sh $netInterfaz
