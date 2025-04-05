#!/bin/bash

netInterfaz="eth0"
netIP=""
netGW=""
netMASK=""
netDNS="8.8.8.8"
hostname=""

#Paquetes a instalar
paquetes=("openssh-server" "git" )

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

# Instalacion de los paquetes
apt-get install openssh-server -s

# Instala los paquetes
for paquete in "${paquetes[@]}"; do
    sudo apt-get install -y "$paquete" 
done



#Confiuracion servicios

#HAbilitar i levantar servicios
service ssh enable
service ssh start

#Configuracion cortafuegos
.$(dirname "$0")/configuraciones/reglasFirewall.sh $netInterfaz

# pruebaaa!!! 
ping 1.1.1..1