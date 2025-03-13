// JSON BASE A MOSTRAR EN FORMULARIO
$(document).ready(function(){
    let edit = false;
    let validInputs = false;
    let validName = false;
    $('.btn-primary').attr('disabled', true);
    $('#product-result').hide();
    $('#product-result2').hide();
    listarProductos();

    function validarFormulario() {
        if (validInputs && validName) {
            $('.btn-primary').attr('disabled', false);
        } else {
            $('.btn-primary').attr('disabled', true);
        }
    }

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    $(document).on('click', '.form-control', (e) => {
        let valid = true;
        let errorTemplate = '';
        console.log($('#marca').val());
    
        if ($('#name').val().trim() == ''){
            valid = false;
            errorTemplate += '<li>Nombre del producto es requerido</li>';
        }
        if ($('#precio').val().trim() == '') {
            valid = false;
            errorTemplate += '<li>Precio del producto es requerido</li>';
        } else if (parseFloat($('#precio').val().trim()) <= 99) {
            valid = false;
            errorTemplate += '<li>El precio del producto debe ser mayor a 99</li>';
        }
        if ($('#unidades').val().trim() == '') {
            valid = false;
            errorTemplate += '<li>Unidades del producto son requeridas</li>';
        } else if (parseInt($('#unidades').val().trim()) < 1) {
            valid = false;
            errorTemplate += '<li>Las unidades del producto deben ser mayor o igual a uno</li>';
        }
        if ($('#modelo').val().trim() == '') {
            valid = false;
            errorTemplate += '<li>Modelo del producto es requerido</li>';
        }
        if ($('#marca').val() == null) {
            valid = false;
            errorTemplate += '<li>Marca del producto es requerida</li>';
        } 
        if ($('#detalles').val().trim() == '') {
            valid = false;
            errorTemplate += '<li>Detalles del producto son requeridos</li>';
        }
        if ($('#imagen').val().trim() == '') {
            valid = false;
            errorTemplate += '<li>Imagen del producto es requerida</li>';
        } else if (!$('#imagen').val().trim().startsWith('img/')) {
            valid = false;
            errorTemplate += '<li>La ruta de la imagen debe iniciar con "img/"</li>';
        }
        
        if(valid == false){
            $('#product-result2').show();
            $('#container').html(errorTemplate);
        }
        else{
            $('#product-result2').hide();
            $('#container').html('');
        }

        validInputs = valid;  // Actualizar variable de validación
        validarFormulario();  // Verificar si se puede activar el botón

    });

    
    $('#name').keyup(function() {
        let errorTemplate = '';
        let name = $('#name').val().trim();
        console.log("------");



        $.post('./backend/product-get-by-name.php', {name: name}, (response) => {
            console.log(name);
            console.log("hay en la BD?" + response);
    
            if (response === "true" || response === true) { // Asegurar comparación con string o booleano
                validName = false;
                errorTemplate += '<li>El nombre del producto ya existe</li>';
                $('#product-result').show();
                $('#containerNombre').html(errorTemplate);
            } else {
                validName = true;
                $('#product-result').hide();
                $('#containerNombre').html('');
            }
            console.log("ValidName: " + validName);
            validarFormulario(); // Verificar si se puede activar el botón
        });
    });
    

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    $('#product-form').submit(e => {
        e.preventDefault();

        // SE INICIALIZA UN OBJETO POSTDATA
        let postData = {};

        // SE AGREGA AL OBJETO EL NOMBRE DEL PRODUCTO
        postData['nombre'] = $('#name').val();
        postData['id'] = $('#productId').val();
        postData['precio'] = $('#precio').val();
        postData['unidades'] = $('#unidades').val();
        postData['modelo'] = $('#modelo').val();
        postData['marca'] = $('#marca').val();
        postData['detalles'] = $('#detalles').val();
        postData['imagen'] = $('#imagen').val();


        /**
         * AQUÍ DEBES AGREGAR LAS VALIDACIONES DE LOS DATOS EN EL JSON
         * --> EN CASO DE NO HABER ERRORES, SE ENVIAR EL PRODUCTO A AGREGAR
         **/

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;
            
            // SE REINICIA EL FORMULARIO
            $('#name').val('');
            $('#precio').val('');
            $('#unidades').val('');
            $('#modelo').val('');
            $('#marca').val('');
            $('#detalles').val('');
            $('#imagen').val('img/default.jpg');
            $('#productId').val('');
            // SE HACE VISIBLE LA BARRA DE ESTADO
            $('#product-result2').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
        //cambiamos el texto del boton a agregar producto de nuevo
        $('button.btn-primary').text('Agregar Producto');
    });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                $('#product-result2').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response);
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#name').val(product.nombre);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            
            $('#precio').val(product.precio);
            $('#unidades').val(product.unidades);
            $('#modelo').val(product.modelo);
            $('#marca').val(product.marca);
            $('#detalles').val(product.detalles);
            $('#imagen').val(product.imagen);

            // // SE ELIMINA nombre, eliminado E id PARA PODER MOSTRAR EL JSON EN EL <textarea>
            // delete(product.nombre);
            // delete(product.eliminado);
            // delete(product.id);
            // // SE CONVIERTE EL OBJETO JSON EN STRING
            // let JsonString = JSON.stringify(product,null,2);
            // // SE MUESTRA STRING EN EL <textarea>
            // $('#description').val(JsonString);
            
            // SE PONE LA BANDERA DE EDICIÓN EN true
            edit = true;
            validName = true;
        });
        //modificamos el texto de el botón
        validarFormulario();
        $('button.btn-primary').text('Modificar Producto');
        e.preventDefault();
    });    
});