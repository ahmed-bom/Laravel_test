    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenCollab Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --color-primary: #904c7b;
            --color-secondary: #591c46;
            --color-accent-1: #e46793;
            --color-accent-2: #f66477;
        }
        .bg-primary { background-color: var(--color-primary); }
        .bg-secondary { background-color: var(--color-secondary); }
        .bg-accent-1 { background-color: var(--color-accent-1); }
        .bg-accent-2 { background-color: var(--color-accent-2); }
        .text-primary { color: var(--color-primary); }
        .border-primary { border-color: var(--color-primary); }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--color-accent-1), var(--color-primary), var(--color-secondary));
        }
        
        .project-card {
            transition: all 0.3s ease;
        }
        
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .file-list {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .file-list.expanded {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>
<body class="bg-gray-900">
     @include('layouts.navigation')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-gray-700 rounded-2xl shadow-lg overflow-hidden">
                <div class="gradient-bg h-48 relative">
                    <!-- Settings Menu -->
                    <div class="absolute top-4 right-4">
                    <x-nav-link class="block px-4 py-2 text-gray-100" :href="route('profile.edit')" :active="request()->route('profile.edit')">            
                        <i class="fas fa-cog mr-2"></i>Settings
                    </x-nav-link>
                    </div>
                </div>
                
                <div class="relative px-8 pb-8">
                    <div class="flex flex-col sm:flex-row sm:items-end -mt-16 mb-4 sm:mb-0">
                        <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden shadow-lg">
                            <!-- img -->
                             <x-application-logo>
                             </x-application-logo>
                        </div>
                        <div class="mb-10 ml-6">
                            <h1 class="text-3xl font-bold text-gray-100">{{$name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Projects Section -->
            <div class="mt-8">
                <div class="bg-gray-700 rounded-2xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-100">Projects</h2>
                        <button onclick="showAddProjectModal()" class="px-6 py-2 bg-primary text-white rounded-full hover:bg-secondary transition">
                            <i class="fas fa-plus mr-2"></i>Add Project
                        </button>
                    </div>
                    
                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <input type="text" placeholder="Search projects..." 
                                   class="w-full px-5 py-3 pr-12 border rounded-full focus:outline-none focus:ring-2 focus:ring-primary">
                            <button class="absolute right-2 top-2 p-2 text-gray-400 hover:text-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Projects Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sample Project Card -->
                         @foreach ($projects as $project)
                         <x-project_cart>
                            <x-slot name="titre">
                                {{$project}}
                            </x-slot>
                         </x-project_cart>
                         @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div id="addProjectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-gray-700 rounded-2xl p-8 w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-900">Add New Project</h3>
                <button onclick="hideAddProjectModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2 font-medium">Project Name</label>
                    <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2 font-medium">Description</label>
                    <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" rows="4"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2 font-medium">Files</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                        <p class="text-gray-500 mb-2">Drag and drop files here or</p>
                        <button type="button" class="text-primary hover:text-secondary">browse files</button>
                        <input type="file" multiple class="hidden">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="hideAddProjectModal()" class="px-4 py-2 text-gray-500 hover:text-gray-700 mr-2">Cancel</button>
                    <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function toggleMenu() {
        document.getElementById('settingsMenu').classList.toggle('hidden');
    }

    function showAddProjectModal() {
        document.getElementById('addProjectModal').classList.remove('hidden');
    }

    function hideAddProjectModal() {
        document.getElementById('addProjectModal').classList.add('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function toggleFiles(button) {
        const fileList = button.parentElement.nextElementSibling;
        const icon = button.querySelector('i');
        
        fileList.classList.toggle('expanded');
        
        if (fileList.classList.contains('expanded')) {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
            button.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Hide Files';
        } else {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
            button.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>View Files';
        }
    }
    </script>
</body>
</html>
