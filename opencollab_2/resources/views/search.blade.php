
@php
 use Carbon\Carbon;
@endphp
    <x-app-layout>
    <div class="w-full pt-6 flex justify-center">
        <div class="w-3/4 p-6 ">
 @if (isset($results))
    @if ('user' == $type)
    <div class="w-full pt-6 flex justify-center">
        <div class="w-3/4 p-6">
            <h1 class="text-4xl text-gray-200 m-3">Users</h1>
            <br>
            @foreach ($results as $result)
            <x-user_cart>
                <x-slot name="name">
                    {{$result->name}}
                </x-slot>
                <x-slot name="link">
                 /users/{{$result->id}}
                </x-slot>
                <x-slot name="image">
                    <img src="{{ asset('uploads/profile-pics/' . ($result->profile_picture ?? 'default-profile.png')) }}"alt=""class="w-16 h-16 rounded-full mr-3"id="profileImage">
                </x-slot>
            </x-user_cart>
            <br>
            @endforeach
        </div>
    </div>
    @elseif ('project' == $type)
    <div class="w-full pt-6 flex justify-center">
        <div class="w-3/4 p-6">
            <h1 class="text-4xl text-gray-200 m-3">Project</h1>
            <br>
            @foreach ($results as $result)
            <x-project_cart>
                <x-slot name="titre">
                    {{$result->project_name}}
                </x-slot>
                <x-slot name="description">
                    {{$result->description}}
                </x-slot>
                <x-slot name="user">
                    {{$result->name}}
                </x-slot>
                <x-slot name="link">
                 /users/{{$result->user_id}}
                </x-slot>
                <x-slot name="updated_at">
                    {{Carbon::parse($result->updated_at)->diffForHumans()}}
                </x-slot>
                <x-slot name="link_download">{{ route('projects.download', ['projectId' => $result->id]) }}</x-slot>

            </x-project_cart>
            <br>
            @endforeach
        </div>
    </div>
    @endif
    @endif
    </div>
</x-app-layout>
