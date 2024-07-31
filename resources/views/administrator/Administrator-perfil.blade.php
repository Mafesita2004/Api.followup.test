<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Seguimiento</title>
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }
        #notifButton {
            position: absolute; /* Cambiado a absoluto para colocarlo en la barra azul */
            top: 10px; /* alto */
            right: 1450px; /* lado */
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1000;

        }

        .notifications {
            display: block;
            width: 54px; /* tamaño de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
            filter: invert(1); /* Invierte los colores de la imagen */
        }
        .Flecha {
            display: block;
            position: absolute;
            width: 24px; /* tamaño de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
            margin-left: 10px; /* lados */
            margin-top: 40px; /* altura */
        }
        .text-ventana {
            color: #ffffff; /* Color del texto para que contraste con el fondo */
            font-size: 20px; /* Tamaño del texto para que sea visible */
            position: absolute;
            font-family: 'DM Sans', sans-serif;
            left: 50%; /* Ajusta la posición horizontal según sea necesario */
            transform: translateX(-50%); /* Centra el texto horizontalmente */
            top: 85px; /* Ajusta la posición vertical según sea necesario */
            z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex justify-between items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">
        <div class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
            <div class="flex flex-col">
                <h2 class="text-sm m-0 text-[#009e00]">Etapa</h2>
                <h2 class="text-sm m-0 text-[#009e00]">Seguimiento</h2>
            </div>
            <h2 class="text-ventana">Perfil Administrador</h2>
        </div>
        <div class="text-[8px] flex flex-col items-center justify-center absolute left-1/2 transform -translate-x-1/2">
            <h1 class="text-lg m-0 text-[#009e00] font-bold">ADMINISTRADOR</h1>
        </div>
        <img class="w-[45px] h-[45px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo">
    </header>
    <nav class="bg-[#00324d] px-2.5 py-1.5 flex justify-between items-center relative z-10">
        <button id="notifButton" onclick="navigateTo('{{ route('administrator.notificaciones') }}')">
            <img class="notifications" src="{{ asset('administrator/notificaciones.png') }}" alt="notificaciones">
        </button>
        <a href="{{ route('administrator.home') }}" alt="flecha">
            <img class="Flecha" src="{{ asset('img/flecha.png') }}" alt="Flecha">
        </a>
        <div class="relative">
            <button id="notifButton" class="relative">
                <img class="w-[35px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
                <span class="absolute top-0 right-0 w-4 h-4 bg-red-600 text-white text-xs rounded-full flex items-center justify-center">5</span>
            </button>
            <div id="notifMenu" class="hidden absolute top-full mt-2 left-0 w-64 bg-white border border-gray-300 rounded-lg shadow-lg z-20">
                <div class="p-4">
                    <h2 class="text-sm font-bold">Notificaciones</h2>
                    <ul>
                        <li class="mt-2">
                            <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 1</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 2</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="relative flex items-center">
            <div class="bg-white w-72 rounded-full px-8 py-1.5 text-sm text-black mr-2">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</div>
            <img class="bg-white w-[45px] h-auto rounded-full -ml-8 border-[3px] border-[#00324d]" src="{{ asset('img/user-icon.png') }}" alt="User Icon">
            <button id="menuButton" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 ml-2 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div id="userMenu" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div>
                            <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                            <p class="text-sm mt-2">Super administrador</p>
                        </div>
                        <img src="{{ asset('img/user-icon.png') }}" alt="User Icon" class="w-10 h-10 rounded-full mr-3 mx-10 bg-white border-black border-2">
                    </div>
                    <ul>
                        <a href="{{ route('administrator.home')}}" class="block text-center text-green-600 font-bold mt-4 bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a>
                        <li class="mt-2"><a href="{{ route('administrator.home')}}" class="block text-black hover:bg-white p-2 rounded-lg">Inicio</a></li>
                        <li class="mt-2"><a href="#" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                        <li class="mt-2"><a href="{{ route('administrator.apprentice') }}" class="block text-black hover:bg-white p-2 rounded-lg">Aprendices</a></li>
                        <li class="mt-2"><a href="{{ route('administrator.instructor') }}" class="block text-black hover:bg-white p-2 rounded-lg">Instructores</a></li>
                        <li class="mt-2"><a href="#" class="block text-black hover:bg-white p-2 rounded-lg">Plantillas</a></li>
                        <li class="mt-2"><a href="#" class="block text-black hover:bg-white p-2 rounded-lg">Gráficas</a></li>
                    </ul>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex justify-center mt-6">
        <main class="bg-white m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="text-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40 mx-auto text-gray-500 m-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h1 class="text-lg m-0 text-black font-bold">ADMINISTRADOR</h1>
                </div>
                <h3 class="font-bold mb-4">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->last_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cuenta Soy SENA:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->sena_account }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->department }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->municipality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->birthdate }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de sangre:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->blood_type }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">EPS:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->eps }}</p>
                    </div>
                </div>

                <h3 class="font-bold mb-4 mt-6">Lugar de Residencia</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->department }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->municipality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Zona:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->zone }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Barrio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->neighborhood }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dirección:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->address }}</p>
                    </div>
                </div>

                <h3 class="font-bold mb-4 mt-6">Información Académica</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Primaria:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->primary_education }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Secundaria:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->secondary_education }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Educación Superior:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->higher_education }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->institution_name }}</p>
                    </div>
                </div>

                <h3 class="font-bold mb-4 mt-6">Modalidad que maneja</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Modalidad:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Modalidad:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md">{{ auth()->user()->modality }}</p>
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <a href="{{ route('administrator.reports') }}" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('administrator.home') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
