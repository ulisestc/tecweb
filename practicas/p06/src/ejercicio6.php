<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>

    <?php
    // Crear el arreglo asociativo para los vehículos
    $parque_vehicular = [
        "TSJ3099" => [
            "Auto" => [
                "marca" => "VW",
                "modelo" => "2021",
                "tipo" => "Hatchback"
            ],
            "Propietario" => [
                "nombre" => "Ulises Torres",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel"
            ]
        ],
        "UBN6338" => [
            "Auto" => [
                "marca" => "HONDA",
                "modelo" => "2020",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Alfonzo Esparza",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel"
            ]
        ],
        "UBN6339" => [
            "Auto" => [
                "marca" => "MAZDA",
                "modelo" => "2019",
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Ma. del Consuelo Molina",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "97 oriente"
            ]
        ],
        "XCD7483" => [
            "Auto" => [
                "marca" => "TOYOTA",
                "modelo" => "2021",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Juan Pérez",
                "ciudad" => "Cholula, Pue.",
                "direccion" => "Calle 5 de Febrero, No. 100"
            ]
        ],
        "LKH2564" => [
            "Auto" => [
                "marca" => "NISSAN",
                "modelo" => "2018",
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "María García",
                "ciudad" => "Atlixco, Pue.",
                "direccion" => "Avenida Hidalgo 45"
            ]
        ],
        "RUI9876" => [
            "Auto" => [
                "marca" => "FORD",
                "modelo" => "2020",
                "tipo" => "hachback"
            ],
            "Propietario" => [
                "nombre" => "Carlos Ruiz",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Avenida 16 de Septiembre"
            ]
        ],
        "FGT3322" => [
            "Auto" => [
                "marca" => "CHEVROLET",
                "modelo" => "2022",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Ana López",
                "ciudad" => "Tehuacán, Pue.",
                "direccion" => "Calle Reforma 56"
            ]
        ],
        "JGH4453" => [
            "Auto" => [
                "marca" => "HONDA",
                "modelo" => "2020",
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Luis Martínez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Calle 12 Poniente"
            ]
        ],
        "KHL1928" => [
            "Auto" => [
                "marca" => "FORD",
                "modelo" => "2021",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Rosa Sánchez",
                "ciudad" => "Amozoc, Pue.",
                "direccion" => "Carretera federal 14"
            ]
        ],
        "NJK3829" => [
            "Auto" => [
                "marca" => "TOYOTA",
                "modelo" => "2023",
                "tipo" => "hachback"
            ],
            "Propietario" => [
                "nombre" => "Juan Hernández",
                "ciudad" => "San Martín Texmelucan, Pue.",
                "direccion" => "Centro, Calle 4"
            ]
        ],
        "VNB2407" => [
            "Auto" => [
                "marca" => "BMW",
                "modelo" => "2022",
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Pedro González",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Boulevard Atlixco"
            ]
        ],
        "PFG3485" => [
            "Auto" => [
                "marca" => "AUDI",
                "modelo" => "2021",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Karina Díaz",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Callejón del Reloj"
            ]
        ],
        "MKI1098" => [
            "Auto" => [
                "marca" => "MERCEDES-BENZ",
                "modelo" => "2020",
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "José Ramírez",
                "ciudad" => "Huejotzingo, Pue.",
                "direccion" => "Callejón 2 Norte"
            ]
        ],
        "YFB5220" => [
            "Auto" => [
                "marca" => "KIA",
                "modelo" => "2019",
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Felipe Torres",
                "ciudad" => "Chignahuapan, Pue.",
                "direccion" => "Colonia Centro"
            ]
        ],
        "ZQJ8765" => [
            "Auto" => [
                "marca" => "RENAULT",
                "modelo" => "2021",
                "tipo" => "hachback"
            ],
            "Propietario" => [
                "nombre" => "Sandra Álvarez",
                "ciudad" => "Atlixco, Pue.",
                "direccion" => "Avenida Las Palmas"
            ]
        ]
    ];

    if (isset($_POST["ver_vehiculos"]) && $_POST["ver_vehiculos"] == "1"){
        echo "<pre>";
        print_r($parque_vehicular);
        echo "</pre>";
    }
    else{
        if (isset($_POST["matricula"]) && $_POST["matricula"] !== "") {
            echo "<pre>";
            print_r($parque_vehicular[$_POST["matricula"]]);
            echo "</pre>";
        }
        else{
            echo 'ERROR: ingresar matrícula válida o ver todos los autos';
        }
    }

    ?>

    <br>
    <a href="../ejercicio6.html">
        <button>Regresar</button>
    </a>
</body>
</html>