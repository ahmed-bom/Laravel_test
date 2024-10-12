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
        body {
            background-color: #f0e6eb;
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
            background-color: #faf5f7;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .file-list {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            opacity: 0;
        }

        .file-list.expanded {
            max-height: 500px;
            opacity: 1;
            transition: max-height 0.5s ease-in, opacity 0.5s ease-in;
        }

        /* Modal handling */
        body.modal-open {
            overflow: hidden;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
            padding: 1rem;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            max-height: 90vh;
        }
        .compact-input {

    border: 2px solid #b51a84; /* Initial dark border color */
    border-radius: 10px;
    transition: border-color 0.3s ease; /* Smooth transition for border color */
    width: calc(100% - 16px); /* Ensure full width minus padding */
    padding: 8px; /* Add padding for better appearance */
    box-sizing: border-box; /* Include padding in width calculation */
}
.compact-input1{
    border: 2px solid #e09dcb;
    transition: border-color 0.3s ease; /* Smooth transition for border color */
    width: calc(100% - 16px);
}
.compact-input:focus {
    outline: none; /* Remove default outline */
    border-color: pink; /* Change border color on focus */
}
        /* Updated hover colors */
        .hover-edit:hover {
            color: #000000;
        }

        .hover-download:hover {
            color: #22c55e;
        }

        .hover-delete:hover {
            color: #ef4444;
        }
        .compact-input {
            @apply px-3 py-2 text-sm border-2 border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition duration-200 ease-in-out;
        }

        .compact-label {
            @apply text-sm font-medium text-gray-700 mb-1;
        }

        /* New styles for the profile section */
        .profile-header {
            height: 150px;
            position: relative;
        }

        .profile-picture {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-primary rounded-2xl shadow-lg overflow-hidden">
                <div class="gradient-bg profile-header relative">
                    <!-- Settings Menu -->
                    <div class="absolute top-4 right-4">
                        <button onclick="toggleMenu()" class="p-2 rounded-full bg-white bg-opacity-20 text-white hover:bg-opacity-30">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div id="settingsMenu" class="hidden absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white">
                            <a href="settings.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <button onclick="showDeleteModal()" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                <i class="fas fa-trash-alt mr-2"></i>Delete Account
                            </button>
                        </div>
                    </div>
                    <div class="profile-picture">
                        <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden shadow-lg">
                            <img src="/api/placeholder/128/128" alt="Profile picture" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <div class="relative px-8 py-6 text-center">
                    <h1 class="text-3xl font-bold text-white">John Developer</h1>
                    <p class="text-lg text-white opacity-80">Full Stack Developer</p>
                    <p class="mt-4 text-white opacity-90">
                        Passionate developer contributing to open-source projects. Looking to collaborate
                        on innovative ideas and learn from fellow developers on OpenCollab.
                    </p>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="mt-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900">Projects</h2>
                        <button onclick="showAddProjectModal()" class="px-6 py-2 bg-primary text-white rounded-full hover:bg-secondary transition">
                            <i class="fas fa-plus mr-2"></i>Add Project
                        </button>
                    </div>

                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <input type="text" placeholder="Search projects..."
                                   class="w-full px-5 py-3 pr-12 border-2 border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                            <button class="absolute right-2 top-2 p-2 text-gray-400 hover:text-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Projects Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sample Project Card -->
                        <div class="project-card border rounded-xl p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-semibold text-gray-900">AI Chat Interface</h3>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover-edit">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="text-gray-400 hover-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">A modern chat interface for AI interactions.</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <i class="far fa-file-alt text-gray-400 mr-2"></i>
                                    <span class="text-sm text-gray-500">3 files</span>
                                </div>
                                <button onclick="toggleFiles(this)" class="text-primary hover:text-secondary flex items-center">
                                    <i class="fas fa-chevron-down mr-1"></i>
                                    View Files
                                </button>
                            </div>
                            <div class="file-list mt-4">

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                        <span class="flex items-center">
                                            <i class="fas fa-file-code text-primary mr-2"></i>
                                            App.tsx
                                        </span>
                                        <div class="flex space-x-2">
                                            <button class="text-gray-400 hover-download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="text-gray-400 hover-edit">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="text-gray-400 hover-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                        <span class="flex items-center">
                                            <i class="fas fa-file-code text-primary mr-2"></i>
                                            App.tsx
                                        </span>
                                        <div class="flex space-x-2">
                                            <button class="text-gray-400 hover-download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="text-gray-400 hover-edit">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="text-gray-400 hover-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div id="addProjectModal" class="modal">
        <div class="modal-content bg-white rounded-2xl w-full max-w-md m-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-900">Add New Project</h3>
                    <button onclick="hideAddProjectModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form class="space-y-6">
                    <div>
                        <label class="compact-label block">Project Name</label>
                        <input type="text" class="compact-input w-full">
                    </div>

                    <div>
                        <label class="compact-label block">Description</label>
                        <textarea class="compact-input1 w-full" rows="3"></textarea>
                    </div>

                    <!-- Project Type Radio Buttons -->

                    </div>

                    <!-- Compact file upload -->
                    <div>
                        <label class="compact-label block mb-2">Files</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-primary transition-colors">
                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Drag files or <button type="button" class="text-primary hover:text-secondary">browse</button></p>
                            <input type="file" multiple class="hidden">
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 border-t">
                        <button type="button" onclick="hideAddProjectModal()" class="px-4 py-2 text-sm text-gray-500 hover:text-gray-700 mr-2">Cancel</button>
                        <button type="submit" class="px-6 py-2 bg-primary text-white text-sm rounded-lg hover:bg-secondary transition">
                            Create Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div id="deleteModal" class="modal">
        <div class="bg-white rounded-2xl p-8 w-full max-w-md m-auto">
            <div class="text-center mb-6">
                <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-exclamation-triangle text-2xl text-red-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Delete Account</h3>
                <p class="text-gray-600">Are you sure you want to delete your account? This action cannot be undone.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <button onclick="hideDeleteModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Delete Account
                </button>
            </div>
        </div>
    </div>
    <script>
    function toggleMenu() {
        document.getElementById('settingsMenu').classList.toggle('hidden');
    }

    function showAddProjectModal() {
        document.getElementById('addProjectModal').classList.add('active');
        document.body.classList.add('modal-open');
    }

    function hideAddProjectModal() {
        document.getElementById('addProjectModal').classList.remove('active');
        document.body.classList.remove('modal-open');
    }

    function showDeleteModal() {
        document.getElementById('deleteModal').classList.add('active');
        document.body.classList.add('modal-open');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.remove('active');
        document.body.classList.remove('modal-open');
    }

    function toggleFiles(button) {
        const fileList = button.parentElement.nextElementSibling;

        fileList.classList.toggle('expanded');

        if (fileList.classList.contains('expanded')) {
            button.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Hide Files';
        } else {
            button.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>View Files';
        }
    }
</script>
</body>
</html>
