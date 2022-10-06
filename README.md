# TPE - Parte 1

Sitio web **dinámico** implementado enteramente en **PHP**, utilizando el motor de plantillas **Smarty** con **Bootstrap** para la parte visual y **MySQL** para la parte de base de datos, mediante la interfaz **PDO** que nos ofrece PHP. Se implementó siguiendo el patrón de arquitectura **MVC**.

## Índice

- [¿Que es un remate de artículos varios?](#remate-de-articulos-varios)
    - [Descripción de datos](#descripcion-de-los-datos)
- [Acceso público](#acceso-público)
- [Acceso administrador](#acceso-administrador)
    - [Secciones](#secciones)
        - [Seccion general](#seccion-general)
        - [Seccion clientes](#seccion-clientes)
        - [Seccion articulos](#seccion-articulos)

# Remate de articulos varios

Un remate de artículos varios es similar a una casa de subastas, pero con un martillero rematando los artículos uno por uno durante el día del remate (generalmente un domingo).

Los **clientes** contactan con el martillero para poder vender los **artículos** que deseen, un cliente puede ser tanto **comprador** como **vendedor**.

## Descripción de los datos

Se representa la relación 1:N entre un **vendedor**(categorías) y los **artículos**(ítems) que vende. Un vendedor puede vender varios productos o ninguno porque se los compraron todos (mentira lo tengo que mostrar igual) y un artículo solo puede ser vendido por uno y solo un vendedor.

# Acceso público

La parte **pública** no requiere inicio de sesión y está dividida en 3 secciones.
- El **home**: sería la pantalla principal, contiene el **Listado de ítems por categoría**, se representa mediante una lista de vendedores la cual se puede clickear y genera dinámicamente una tabla con los artículos que contiene el vendedor clickeado.
- La **sección vendedores**: Una tabla con los datos de cada vendedor.
- La **sección Artículos**: Una tabla con los datos de cada artículo y en la misma sección se genera dinámicamente el **detalle del artículo** clickeado, de esta manera se puede navegar y visualizar cada artículo individualmente.

# Acceso administrador

El usuario administrador es el encargado y autorizado para realizar las acciones ABM con los datos del sitio.
> **Inicio de sesión**: Existe un botón de **"Acceso"** para poder iniciar sesión y el mismo será cambiado por el botón de **"cierre de sesión"** en caso de que la sesión se inicie exitosamente.

**Aclaración importante**: Un *cliente* en un remate puede ser tanto *comprador* como *vendedor*, pero en este caso solo se cargan y visualizan los datos de los **clientes vendedores**. Por esta razón en la parte pública se visualizan las categorías como **"vendedores"** y en la parte de administración se visualizan como **"clientes"**.


## Secciones

**Aclaración**: El routing en la sección de administrador sigue la siguiente semántica.
- [BASE]/admin
- [BASE]/admin/categoría/{acción ABM}/{id}
- [BASE]/admin/categoría/item/{acción ABM}/{id}

Y se decidió hacer así por el ejemplo que dan la consigna del TP, entendiendo que Noticias es la categoría y Productos es el ítem.
> Al agregar Items (Noticias/Productos/...) ...

### Seccion general: 
Se muestra cada categoría con sus respectivos ítems y se puede editar todo.
- **Botones de edición**: son accesos directos a la parte de edición del elemento seleccionado.
### Sección clientes: 
Contiene el formulario para cargar clientes, también se visualiza cada cliente pudiendo editar o borrar cada uno de estos.
- **Alta de cliente**: Es el típico formulario de datos con un botón de "agregar" que realiza el ADD en la base de datos.
    - **Advertencia**: Tiene un control de datos medianamente robusto, no lo intentes romper porque el sitio te puede retar.
- **Delete caso de FOREIGN KEY**: Al ser una categoría y contener una clave foranea con restriccion de integridad referencial "restrict ON DELETE cascade ON UPDATE", no es tan fácil **borrar un categoría** que contenga ítems.
    - **Solución**: Se le advierte al administrador de lo que está por hacer para que luego no se queje. Si el administrador confirma que es consciente de lo que está haciendo, se procede a borrar cada artículo de la categoría y luego la categoría.
- **Edición**: Se realiza en 2 pasos, al clickear el botón de "editar" de un cliente, se rellena el formulario con los datos de este y el botón de "agregar cliente" se transforma en "confirmar cambios" para completar la edición y realizar el UPDATE en la base de datos.
    - **Aclaración**: Si, se reutiliza el formulario para hacer la alta de clientes, es exactamente el mismo formulario pero con un botón distinto.

### Seccion articulos:

Contiene el formulario para cargar artículos, también se visualiza cada artículo pudiendo editar o borrar cada uno de estos.
- **Alta de artículo**: Es el típico formulario de datos con un botón de "agregar" que realiza el ADD en la base de datos.
    - **Aclaración**: La referencia a la FOREIGN KEY se hace medianamente un select como sugiere la consigna del TP.
    - **Imagen**: Es obligatorio cargar una imagen del artículo, para poder almacenarla en la base de datos *"de forma segura"* se transforma la imagen a **base64**.
- **Delete**: Al ser la relación 1:N cada artículo(ítem) es independiente y no existe ningún tipo de restricción al borrarlos de la base de datos.
- **Edición**: Es la misma funcionalidad que realizamos para el cliente, con la excepción que la Imagen se va a perder, y no, el sitio no te advierte de eso.
    - **Aclaración**: Si, se reutiliza el formulario para hacer la alta de clientes, es exactamente el mismo formulario pero con un botón distinto.