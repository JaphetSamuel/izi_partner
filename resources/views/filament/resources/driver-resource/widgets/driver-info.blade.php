<x-filament::widget>
    <x-filament::card>
        <div class="flex ">

            <div class="">
                <h3 class="p-3">Nom : <b>{{$record->firstname}}</b> </h3>
                <h3 class="p-3">Prenom : <b>{{$record->lastname}}</b> </h3>
                <h3 class="p-3">Contact : <b>{{$record->phone}}</b> </h3>
            </div>
            <div class="pr-8">
                <p class="p-3">Marque: <b>{{$record->car_brand}}</b> </p>
                <p class="p-3">Model : <b>{{$record->car_model}}</b> </p>
                <p class="p-3">Immatriculation: <b>{{$record->immatriculation}}</b> </p>
            </div>

        </div>
    </x-filament::card>
</x-filament::widget>
