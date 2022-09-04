<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>Cuales son las ventajas de tener un sitio web propio?</h2>
            </div>
        </div>
    </div>
    <div class=>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <img id="img" src="https://morguefile.nyc3.cdn.digitaloceanspaces.com/pub/secretagency/images/8/large/e9574607-6972-4e68-8eb7-6ace1ecc5987.1661783077.jpg" alt="imag/work">
            </div>
        </div>
    </div>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <ul>
            <li>*Ofrece una aspecto mas prefesional sobre tu emprendimiento</li>
            <li>*Mejoran tus posibilidades de llegar al publico deseado</li>
            <li>*Podes administrar tu propia marca</li>
            <li>*Contacto constante con tus clientes</li>
            <li>*Visualizar múltiples contenidos</li>   
        </ul>
        <h3>Esto es solo el comienzo, podes empezar ya mismo... Nosotros nos encargamos de todo.</h3>
       </div> 
    </div>
    </div>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <button>Necesitas asesorarte?</button>
       </div> 
    </div>
    </div>
    <div class="py-12">
        <style>
            form{
                display: flex;
                flex-direction: column;
            }
        </style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h3>Dejanos los detalles, nos vamos a estar comunicando con vos para ofrecerte todas las opciones que mas te convengan</h3>
          <form action="" method="POST">
            @csrf
            <label for="">Email</label>
            <input type="email" required max="50" value="{{ Auth::user()->email }}">
            <label for="">Celular</label>
            <input type="text" required max="30">
            <label for="">Que estas pensando para tu proximo sitio web?</label>
            <textarea name="" id="" cols="30" rows="10" max=50></textarea>
            <input type="submit">
          </form>
       </div> 
    </div>
    </div>
</x-app-layout>
