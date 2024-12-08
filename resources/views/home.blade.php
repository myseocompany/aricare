<x-app-layout class="w-full h-screen">
    
    <x-slot name="header">
        Confirmar email
    </x-slot>
    <div class="main-container w-full flex flex-col justify-center items-center">

        <div class="info-container relative w-[90%] bg-white flex flex-wrap">
            <!-- formulario para enviar datos -->
            <form class="w-full flex flex-wrap">
                <!-- Columna Izquierda (3 campos) -->
                <div class="w-full sm:w-1/2 lg:w-1/2 pr-4">
                    <!-- Campo Nombre de la empresa -->
                    <div class="mb-4">
                        <label for="company_name" class="block">Nombre de la empresa</label>
                        <input type="text" id="company_name" name="company_name" class="w-full border p-2 mt-1" />
                    </div>

                    <!-- Campo Tipo de empresa -->
                    <div class="mb-4">
                        <label for="company_type" class="block">Tipo de empresa</label>
                        <select id="company_type" name="company_type" class="w-full border p-2 mt-1">
                            <option value="small">Pequeña</option>
                            <option value="medium">Mediana</option>
                            <option value="large">Grande</option>
                        </select>
                    </div>

                    <!-- Campo Número de colaboradores -->
                    <div class="mb-4">
                        <label for="employee_number" class="block">Número de colaboradores</label>
                        <input type="number" id="employee_number" name="employee_number" class="w-full border p-2 mt-1" />
                    </div>
                </div>

                <!-- Columna Derecha (otros 3 campos) -->
                <div class="w-full sm:w-1/2 lg:w-1/2 pl-4">
                    <!-- Campo País -->
                    <div class="mb-4">
                        <label for="country" class="block">País</label>
                        <input type="text" id="country" name="country" class="w-full border p-2 mt-1" />
                    </div>

                    <!-- Campo Dirección -->
                    <div class="mb-4">
                        <label for="address" class="block">Dirección</label>
                        <input type="text" id="address" name="address" class="w-full border p-2 mt-1" />
                    </div>

                    <!-- Campo Número telefónico -->
                    <div class="mb-4">
                        <label for="phone" class="block">Número telefónico</label>
                        <input type="tel" id="phone" name="phone" class="w-full border p-2 mt-1" />
                    </div>
                    <!-- Botón de envío -->
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded absolute left-5">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>


<!-- apartado de la barra de scroll del side bar -->
<style>
  /* Personalizar la barra de desplazamiento */
  .side-bar-container::-webkit-scrollbar {
    width: 4px; /* Ancho de la barra de desplazamiento */
  }

  .side-bar-container::-webkit-scrollbar-track {
    background: #f1f1f1; /* Fondo de la pista de la scrollbar */
    border-radius: 10px; /* Esquinas redondeadas */
  }

  .side-bar-container::-webkit-scrollbar-thumb {
    background: #888; /* Color del "pulgar" (parte que se mueve) */
    border-radius: 10px; /* Esquinas redondeadas */
  }

  .side-bar-container::-webkit-scrollbar-thumb:hover {
    background: #555; /* Color cuando el puntero está sobre la scrollbar */
  }
</style>


<!-- [] -->
 
