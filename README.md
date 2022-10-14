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
- [Sesión](#sesión)
    - [Modelo Usuario](#modelo-usuario)
- [Diagrama de clase](#diagrama-de-clase)
    - [Aclaraciones sobre el diseño MVC]()

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
> **Inicio de sesión**: Existe un botón de **"Acceso"** para poder iniciar sesión.
>>El usuario y contraseña por defecto es
>>| Usuario | Contraseña |
>>|---------|------------|
>>| ejemplo@gmail.com| admin|

**Aclaración importante**: Un *cliente* en este ejemplo de remate se considera a aquella persona que aporta artículos para la venta durante el remate.

## Secciones (con agregado por acceso Root)

**Aclaración**: El routing en el acceso de administrador sigue la misma semántica que en el acceso público con la diferencia de que cualquier intención de realizar una acción ABM será **redirigido al login** en caso de que la sesión no se haya iniciado.
- [BASE]/clientes/{acción ABM}/{id}
- [BASE]/articulos/{acción ABM}/{id}

### Seccion general - Admin: 
**Botones de edición**: son accesos directos a la parte de edición del elemento seleccionado.
### Sección clientes - Admin: 
Contiene el formulario para cargar clientes, también se visualiza cada cliente pudiendo editar o borrar cada uno de estos.
- **Alta de cliente**: Es el típico formulario de datos con un botón de "agregar" que realiza el ADD en la base de datos.
    - **Advertencia**: Tiene un control de datos medianamente robusto, no lo intentes romper porque el sitio te puede retar.
- **Delete caso de FOREIGN KEY**: Al ser una categoría y contener una clave foranea con restriccion de integridad referencial "restrict ON DELETE cascade ON UPDATE", no es tan fácil **borrar un categoría** que contenga ítems.
    - **Solución**: Se le advierte al administrador de lo que está por hacer para que luego no se queje. Si el administrador confirma que es consciente de lo que está haciendo, se procede a borrar cada artículo de la categoría y luego la categoría.
- **Edición**: Se realiza en 2 pasos, al clickear el botón de "editar" de un cliente, se rellena el formulario con los datos de este y el botón de "agregar cliente" se transforma en "confirmar cambios" para completar la edición y realizar el UPDATE en la base de datos.
    - **Aclaración**: Si, se reutiliza el formulario para hacer la alta de clientes, es exactamente el mismo formulario pero con un botón distinto.

### Seccion articulos - Admin:

Contiene el formulario para cargar artículos, también se visualiza cada artículo pudiendo editar o borrar cada uno de estos.
- **Alta de artículo**: Es el típico formulario de datos con un botón de "agregar" que realiza el ADD en la base de datos.
    - **Aclaración**: La referencia a la FOREIGN KEY se hace medianamente un select como sugiere la consigna del TP.
    - **Imagen**: Es obligatorio cargar una imagen del artículo, para poder almacenarla en la base de datos *"de forma segura"* se transforma la imagen a **base64**.
- **Delete**: Al ser la relación 1:N cada artículo(ítem) es independiente y no existe ningún tipo de restricción al borrarlos de la base de datos.
- **Edición**: Es la misma funcionalidad que realizamos para el cliente, con la excepción que la Imagen se va a perder, y no, el sitio no te advierte de eso.
    - **Aclaración**: Igual que con el cliente, se reutiliza el formulario para hacer la alta de artículos.
    - **Detalle de imagen**: Las imágenes que son cargadas a la base de datos permanecen en el servidor, el usuario administrador encargado de cargarlas deberá eliminarlas de forma manual luego de cargarlas o editarlas.

# Sesión

El acceso de administrador se autoriza mediante el **inicio de sesión** en el sitio web, se utiliza una clase auxiliar **Helper** para realizar las acciones necesarias para el manejo de la sesión.

**Aclaración**: Se implementó la parte de **registro** para poder crear nuevos usuarios con acceso Root en la aplicación de manera más simple.
## Modelo usuario

Para almacenar los usuarios que tienen **acceso Root** en el sitio web, se crea una nueva tabla sql que almacena el **Email** y la **Contraseña**, también se incorpora un **id** para identificar a cada usuario particularmente.

Las contraseñas se almacenan en la base de datos en forma de **HASH**.

# Diagrama de clase

![Diagrama de clase](/assets/remate.png)

## Aclaraciones sobre el diseño MVC

Decidí aplicar **Herencia de clases** para el *ABMController* ya que este comparte funcionalidad con el *PublicController* y al ser un ABMController tan pequeño se creó uno solo general para ambos modelos, pero lo correcto sería tener un ABMControlelr para cada modelo.

### Mejoras de diseño que se podrían aplicar
- Que la clase PubController simplemente se llame Controller.
    - Pasaría a ser un controller clase padre de todos los ABMControleler.
- Que la clase ABMController se divida en ABMController para clientes y para artículos.
    - Este es el cambio de diseño más importante y necesario, no se implementó por falta de tiempo y porque para este caso no es tan grave.
- Que exista una clase general y padre para cada modelo y para cada vista.