#!/bin/bash

netInterfaz="eth0"
netIP=""
netGW=""
netMASK=""
netDNS="8.8.8.8"
hostname=""

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

#Condiguración de la zona horaria 
sudo timedatectl set-timezone Europe/Madrid

#Actualizar repositorios
sudo apt-get update

#Desisntalar servicios y eliminar configuraciones
sudo apt-get remove --purge openssh-server

sudo apt install openssh-server -s


#Configuracion cortafuegos
./configuraciones/reglasFirewall.sh $netInterfaz

