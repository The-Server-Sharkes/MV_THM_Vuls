#!/bin/bash

# This command creates users for the game.

echo "[+] Creando usuarios Manolo, Lucy y Directo..."

# Crear usuarios
useradd -m -s /bin/bash manolo
echo 'manolo:Manolo' | chpasswd
useradd -m -s /bin/bash lucy
echo 'lucy:Lucy' | chpasswd
useradd -m -s /bin/bash directo
echo 'directo:Directo' | chpasswd

# Crear grupos
groupadd manolo_group
groupadd lucy_group

# Asignar los grupos a los usuarios
usermod -aG manolo_group manolo
usermod -aG lucy_group lucy
usermod -aG lucy_group directo  # Directo puede ser parte del grupo de Lucy para ver sus archivos

# Dar permisos a los grupos en sus carpetas específicas
mkdir /home/manolo
mkdir /home/lucy

# Establecer permisos para que Manolo solo vea su propia carpeta
chown manolo:manolo_group /home/manolo
chmod 700 /home/manolo  # Solo Manolo puede acceder a esta carpeta

# Establecer permisos para Lucy: puede ver la carpeta de Manolo, pero no modificarla
chown lucy:lucy_group /home/lucy
chmod 700 /home/lucy  # Solo Lucy puede acceder a esta carpeta

# Directo tiene acceso a la carpeta de Manolo, pero no puede modificarla
mkdir /home/directo
chown directo:lucy_group /home/directo
chmod 755 /home/directo  # Directo puede ver los archivos de Manolo, pero no puede modificarlos

# Cambiar las contraseñas de los usuarios
echo "Contraseñas cambiadas."

# Dar a Lucy permisos de sudo
usermod -aG sudo lucy

echo "[+] Usuarios creados y configurados correctamente."
