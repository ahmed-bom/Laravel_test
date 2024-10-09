<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="{{ asset('css/user.css')}}">
     
</head>
<body>   
  <x-sidebar>
    <x-user_project>
      <x-slot:project>
        <x-project_cart></x-project_cart>
        <x-project_cart></x-project_cart>
        <x-project_cart></x-project_cart>
        <x-project_cart></x-project_cart>
      </x-slot:project>
    </x-user_project>
  </x-sidebar>
</body>
</html>