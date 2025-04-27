### Shakers Write-Up ###
---

### 1. ¿Qué comando de búsqueda en Google me permite encontrar más rápido sitios web específicos relacionados con una persona o una empresa? ###

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

### 2. ¿En qué página personal o red profesional podríamos encontrar más información detallada sobre "TheServerSharkers" o sus miembros? ###

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

### 3. ¿Qué URL puedes extraer de la pagina que encontraste? ###

En la página oficial de Server Shakers, se encuentra una sección denominada 'Destacados', que incluye una imagen representativa de una página. 

Si el atacante encontro la pagina correcta, deberia ver esto:

<img width="822" alt="Captura de pantalla 2025-04-27 a las 14 43 17" src="https://github.com/user-attachments/assets/7488fec0-62bf-4e54-ab05-fdbaadcc1370" />

A través de esta imagen, el atacante puede acceder a información adicional y relevante, lo que facilita la obtención de datos complementarios.

Al hacer click, encontramos la siguiente publicación del perfil de The Server Shakers, la cuál contiene una URL.

<img width="1128" alt="Captura de pantalla 2025-04-27 a las 15 04 25" src="https://github.com/user-attachments/assets/8181f735-bbca-42d6-b111-b93e95872bae" />

**✅ RESPUESTA:**
```bash
  reoobot.github.io/TheServerSharkers/carrera https://reoobot.github.io/TheServerSharkers/
```
