<x-filament::widget>
    <x-filament::card>
        <table border="none" >
            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <tr>
                <td>Nom : <b>{{$record->firstname}}</b> </td>
                <td>Marque: <b>{{$record->car_brand}}</b> </td>
            </tr>
            <tr>
                <td>Prenom : <b>{{$record->lastname}}</b> </td>
                <td>Model : <b>{{$record->car_model}}</b> </td>
            </tr>
            <tr>
                <td>Contact : <b>{{$record->phone}}</b> </td>
                <td>Immatriculation: <b>{{$record->immatriculation}}</b> </td>
            </tr>
            </tbody>
        </table>
    </x-filament::card>
</x-filament::widget>
