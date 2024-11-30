<x-app-layout>
    <div class="w-full pt-6 flex justify-center">
        <div class="w-3/4 p-6 bg-gray-800">
            <h1 class="text-4xl text-gray-200 m-3">/Favorite</h1>
            <br>
                        @foreach ($projects as $project)
                         <x-project_cart>
                            <x-slot name="titre">
                                {{$project}}
                            </x-slot>
                            <x-slot name="description"> 
                                 {{$project}}
                            </x-slot> 
                         </x-project_cart>
                         <br>
                         @endforeach
        </div>
    </div>
</x-app-layout>