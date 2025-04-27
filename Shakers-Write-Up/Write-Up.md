### Shakers Write-Up ###
---

### 1. ¿Qué comando utilizarías para escanear los puertos asociados a los servicios SSH, SMTP y HTTP y verificar si están filtrados o cerrados? (Escribe solo el comando con los puertos, sin incluir la dirección IP). ###

**✅ RESPUESTA:**  

```bash
nmap -p 22,25,80
```

---------------------------------------------------------------------------------------------------------------------------------------------
### 2. ¿Qué comando de búsqueda en Google me permite encontrar más rápido sitios web específicos relacionados con una persona o una empresa? ###

La respuesta es Google Dorking, un concepto que vimos en las primeras clases del curso.
Sin esta técnica, encontrar la empresa o el objetivo que queremos investigar sería muy difícil o llevaría mucho más tiempo.

📚 ¿Para qué sirve site: en OSINT o Ciberseguridad?

El operador site: sirve para buscar solo dentro de un sitio web específico o limitar la búsqueda a un dominio en concreto.

1. Encontrar perfiles ocultos o poco visibles, como los de LinkedIn, GitHub, entre otros.

2. Localizar documentos o archivos filtrados en páginas específicas.

3. Investigar empresas o personas sin perder tiempo en resultados irrelevantes.

**✅ RESPUESTA:**  

```bash
site:
```

---------------------------------------------------------------------------------------------------------------------------------------------

### 3. ¿En qué página personal o red profesional podríamos encontrar más información detallada sobre "TheServerSharkers" o sus miembros? ###

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
