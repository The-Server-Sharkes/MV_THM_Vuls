#!/bin/bash

# Leer los argumentos
interfaz=$1

#Flush reglas existentes
iptables -F

#Reglas ssh
iptables -A INPUT -i $interfaz -p tcp --dport 22 -j ACCEPT
#Reglas servidor web
iptables -A INPUT -i $interfaz -p tcp --dport 80 -j ACCEPT
#iptables -A INPUT -i $interfaz -p icmp --icmp-type echo-request -j DROP


iptables -S
