// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
    
    // SE LISTAN TODOS LOS PRODUCTOS
    // listarProductos();
}

$(document).ready(function(){
    console.log("Jquery is ready!");
    $('#product-result').hide(); //ocultamos caja de estado

    // Función para listar todos los productos
    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',

            success: function(response){
                console.log(response);
                let products = JSON.parse(response);

                let template = '';

                products.forEach(product => {
                    let descripcion = '';
                    descripcion += '<li>precio: '+product.precio+'</li>';
                    descripcion += '<li>unidades: '+product.unidades+'</li>';
                    descripcion += '<li>modelo: '+product.modelo+'</li>';
                    descripcion += '<li>marca: '+product.marca+'</li>';
                    descripcion += '<li>detalles: '+product.detalles+'</li>';

                    template += `
                    <tr productId="${product.id}">
                        <td>${product.id}</td>
                        <td>${product.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    `
                });

                $('#products').html(template);
            }
        });
    }

    // Llamar a listarProductos al cargar la página
    listarProductos();

    $('#search').keyup(function(){
        let search = $('#search').val();
        console.log(search);

        if (search === '') {
            $('#product-result').hide();
            $('#container').html('');
            listarProductos();
        } else {
            $.ajax({
                url: './backend/product-search.php',
                type: 'POST',
                data: {search: search},

                success: function(response){
                    console.log(response);
                    let products = JSON.parse(response);

                    let template = '';
                    let nombres = '';

                    products.forEach(product => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+product.precio+'</li>';
                        descripcion += '<li>unidades: '+product.unidades+'</li>';
                        descripcion += '<li>modelo: '+product.modelo+'</li>';
                        descripcion += '<li>marca: '+product.marca+'</li>';
                        descripcion += '<li>detalles: '+product.detalles+'</li>';

                        template += `
                        <tr productId="${product.id}">
                            <td>${product.id}</td>
                            <td>${product.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        `

                        nombres += `
                            <li>${product.nombre}</li>
                        `
                    });

                    $('#container').html(nombres);
                    $('#product-result').show();

                    $('#products').html(template);
                }
            });
        }
    });

    $(document).on('click', '.product-delete', function(){
        if(confirm('¿Estás seguro de querer eliminar el producto?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('productId');
            console.log("deleting id: "+id);
            $.get('./backend/product-delete.php', {id}, function(response){
                console.log(response);
                listarProductos();

                response = JSON.parse(response);
                if(response.status == "success"){
                    $('#container').html(`
                                <li>Producto Eliminado</li>
                            `);
                    $('#product-result').show();
                }
                else{
                    $('#container').html(`
                                <li>No se pudo eliminar el producto</li>
                            `);
                    $('#product-result').show();
                }
            });
        }
    });

    $('#product-form').submit(function(e){
        e.preventDefault();
        // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
        var productoJsonString = document.getElementById('description').value;
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        var finalJSON = JSON.parse(productoJsonString);
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        finalJSON['nombre'] = document.getElementById('name').value;
        // SE OBTIENE EL STRING DEL JSON FINAL
        productoJsonString = JSON.stringify(finalJSON,null,2);

        //validaciones correspondientes
        //validación de campos
        let valid = true;
        let errorMessage = "";

        if (finalJSON['nombre'].length === 0 || finalJSON['nombre'].length > 100) {
            valid = false;
            errorMessage += "El nombre del producto no puede estar vacío o ser mayor a 100 caracteres\n";
        }

        if (!["Logitech", "Nvidia", "HyperX", "NZXT"].includes(finalJSON['marca'])) {
            valid = false;
            errorMessage += "La marca del producto no es válida\n";
        }

        if(finalJSON['modelo'].length> 25 || finalJSON['modelo'].match(/^[a-zA-Z0-9]+$/)){
            valid = false;
            errorMessage += "El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.\n";
        }

        if (isNaN(finalJSON['precio']) || finalJSON['precio'] <= 99.99) {
            valid = false;
            errorMessage += "El precio del producto no es válido (debe ser número y mayor a 99.99)\n";
        }

        if(finalJSON['detalles'].length> 250){
            valid = false;
            errorMessage += "Los detalles del producto no pueden ser mayores a 250 caracteres\n";
        }

        if (isNaN(finalJSON['unidades']) || finalJSON['unidades'] <= 0) {
            valid = false;
            errorMessage += "Las unidades del producto no son válidas (debe ser número y mayor a 0)\n";
        }

        if(finalJSON['imagen'].length > 50 || !finalJSON['imagen'].startsWith('img/')){
            valid = false;
            errorMessage += "La URL de la imagen del producto no puede ser mayor a 50 caracteres y debe comenzar con 'img/'\n";
        }
        // Si es valido, se inserta el producto
        if(!valid){
            alert(errorMessage);
            return;
        }
        else
        {
            $.post('./backend/product-add.php', productoJsonString, function(response){
                console.log(response);
                listarProductos();
                
                response = JSON.parse(response);
                if(response.status == "success"){
                    $('#container').html(`
                                <li>Producto Agregado</li>
                                `);
                    $('#product-result').show();
                }
                else{
                    $('#container').html(`
                                <li>${response.status}, ${response.message}</li>
                                `);
                    $('#product-result').show();
                }
            });
        }
    });

    });
// });
