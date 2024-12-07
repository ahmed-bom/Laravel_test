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
            overflow-y: auto;
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
     @include('layouts.navigation')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-primary rounded-2xl shadow-lg overflow-hidden">
                <div class="gradient-bg profile-header relative">
                    <!-- Settings Menu -->
                    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        <div class="profile-picture relative">
                            <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden shadow-lg bg-gray-300">
                                @if(auth()->user()->profile_picture)
                                    <img src="{{ asset('uploads/profile-pics/' . auth()->user()->profile_picture) }}"
                                         alt=""
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-600">
                                        <i class="fas fa-user text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            <!-- File Input -->
                            <input type="file" id="profilePicUpload" name="profile_pic" class="hidden" accept="image/*">
                            <!-- Camera Button -->
                            <label for="profilePicUpload" class="absolute bottom-0 right-0 bg-primary text-white rounded-full p-2 cursor-pointer">
                                <i class="fas fa-camera"></i>
                            </label>
                        </div>


                    </form>

                    <div class="absolute top-4 right-4">

                        <div id="settingsMenu" class=" absolute right-0  rounded-lg shadow-lg">
                            <a href="{{ route('profile.edit') }}" class=" mt-2  text-white">
                                <i class="fas fa-cog mr-2"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="relative px-8 py-6 text-center">
                    <h1 class="text-3xl font-bold text-white">{{ Auth::user()->name }}</h1>
                </div>
            </div>


            <!-- Projects Section -->
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

<!-- Replace the existing project card with this updated version -->
@foreach($projects as $project)
<div class="project-card border rounded-xl p-5" data-project-id="{{ $project->id }}">
    <div class="flex justify-between items-start mb-3">
        <h3 class="text-xl font-semibold text-gray-900">
            <span class="project-name">{{ $project->project_name }}</span>
            <input type="text" class="hidden compact-input1 w-full" value="{{ $project->project_name }}">
        </h3>
        <div class="flex space-x-2">
            <!-- Edit button (direct link to edit page) -->
            <a href="{{ route('projects.edit', $project->id) }}" class="text-gray-400 hover-edit" title="Edit project">
                <i class="fas fa-pen"></i>
            </a>

            <!-- Delete button (with form) -->
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-400 hover-delete" title="Delete project">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>

    </div>
    <div class="mb-4">
        <p class="text-gray-600 text-sm project-description">{{ $project->description }}</p>
        <textarea class="hidden compact-input w-full" rows="3">{{ $project->description }}</textarea>
    </div>

  <div class="flex justify-between items-center">
    <div class="flex items-center">
        <i class="far fa-file-alt text-primary mr-2"></i>
        <span class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded-full font-medium">
            {{ count($project->files) }} files
        </span>
    </div>
    <button
        onclick="toggleFiles(this)"
        class="flex items-center px-3 py-1 rounded-full text-primary hover:bg-accent-1 hover:text-grey transition-all duration-300 ease-in-out"
    >
        <i class="fas fa-chevron-down mr-2"></i>
        View Files
    </button>
</div>

    <div class="file-list mt-4">
        @if(count($project->files) > 0)
            <div class="space-y-2">
                @php
                    $groupedFiles = collect($project->files)->groupBy('directory');
                @endphp

@foreach($groupedFiles as $directory => $files)
@if($directory)
    <div class="ml-4 mb-2 nested-folder">
        <div class="font-medium text-gray-700 flex items-center cursor-pointer folder-toggle">
            <i class="fas fa-folder-open text-primary mr-2"></i>
            <span>{{ $directory }}</span>
            <i class="fas fa-chevron-down ml-2 text-sm text-gray-500 folder-chevron"></i>
        </div>
        <div class="nested-files hidden ml-6 space-y-2">
            @foreach($files as $file)
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                    <span class="flex items-center">
                        <i class="fas fa-file-code text-primary mr-2"></i>
                        {{ $file['name'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@else
    @foreach($files as $file)
        <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
            <span class="flex items-center">
                <i class="fas fa-file-code text-primary mr-2"></i>
                {{ $file['name'] }}
            </span>
        </div>
    @endforeach
@endif
@endforeach
            </div>
        @else
            <p>No files uploaded for this project.</p>
        @endif
    </div>
</div>
@endforeach
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
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name:</label>
                    <input
                        type="text"
                        name="project_name"
                        id="project_name"
                        class="mt-1 p-2 block w-full border-2 border-accent-1 rounded-md focus:border-primary focus:ring-0"
                        required
                    >
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                    <textarea
                        name="description"
                        id="description"
                        class="mt-1 p-2 block w-full border-2 border-accent-1 rounded-md focus:border-primary focus:ring-0"
                        required
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label for="files" class="block text-sm font-medium text-gray-700">Upload Folder:</label>
                    <div class="flex items-center">
                        <input
                            type="file"
                            name="files[]"
                            id="files"
                            class="mt-1 p-2 block w-full"
                            multiple
                            webkitdirectory
                            required
                        >

                    </div>
                </div>
                <button
                    type="submit"
                    class="w-full px-6 py-2 bg-primary text-white rounded-full hover:bg-secondary transition"
                >
                    Create Project
                </button>
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

        document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('file-input');
    const dropzone = document.getElementById('dropzone');
    const browseButton = document.getElementById('browse-btn');
    const dropzoneText = document.getElementById('dropzone-text');

    // Trigger the file input click when the browse button is clicked
    browseButton.addEventListener('click', () => {
        fileInput.click();
    });

    // Trigger the file input click when clicking on the dropzone
    dropzone.addEventListener('click', () => {
        fileInput.click();
    });

    // Handle file selection
    fileInput.addEventListener('change', handleFileSelect);

    function handleFileSelect() {
        const files = Array.from(fileInput.files);
        updateDropzoneText(files);
    }

    // Handle folder drag and drop
    dropzone.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropzone.classList.add('bg-gray-100'); // Change dropzone appearance on drag
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('bg-gray-100'); // Revert dropzone appearance on drag leave
    });

    dropzone.addEventListener('drop', (event) => {
        event.preventDefault();
        const files = Array.from(event.dataTransfer.files);
        fileInput.files = event.dataTransfer.files; // Set the file input to the dropped files
        updateDropzoneText(files);
        dropzone.classList.remove('bg-gray-100'); // Reset dropzone appearance after drop
    });

    function updateDropzoneText(files) {
        const folderNames = new Set();

        files.forEach(file => {
            // Use webkitRelativePath to get folder paths
            if (file.webkitRelativePath) {
                const folderPath = file.webkitRelativePath.split('/').slice(0, -1).join('/');
                folderNames.add(folderPath);
            }
        });

        // Update the dropzone text based on selected folders
        if (folderNames.size > 0) {
            dropzoneText.textContent = `Selected folders: ${Array.from(folderNames).join(', ')}`;
        } else {
            dropzoneText.textContent = 'Drag folders here or <button type="button" class="text-primary hover:text-secondary" id="browse-btn">browse</button>';
        }
    }
});

    // Add this to your existing script section
    function editProject(button) {
    const projectCard = button.closest('.project-card');
    const nameSpan = projectCard.querySelector('.project-name');
    const nameInput = projectCard.querySelector('.project-name + input');
    const descriptionP = projectCard.querySelector('.project-description');
    const descriptionTextarea = projectCard.querySelector('textarea');

    if (button.querySelector('i').classList.contains('fa-pen')) {
        // Switch to edit mode
        nameSpan.classList.add('hidden');
        nameInput.classList.remove('hidden');
        descriptionP.classList.add('hidden');
        descriptionTextarea.classList.remove('hidden');

        button.innerHTML = '<i class="fas fa-save"></i>';
        button.title = "Save changes";
        nameInput.focus(); // Focus on the input for immediate editing
    } else {
        // Save changes
        const projectId = projectCard.dataset.projectId;
        const newName = nameInput.value.trim();
        const newDescription = descriptionTextarea.value.trim();

        // Basic validation
        if (!newName) {
            alert('Project name cannot be empty');
            return;
        }

        fetch(`/projects/${projectId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                project_name: newName,
                description: newDescription
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                nameSpan.textContent = newName;
                descriptionP.textContent = newDescription;

                nameSpan.classList.remove('hidden');
                nameInput.classList.add('hidden');
                descriptionP.classList.remove('hidden');
                descriptionTextarea.classList.add('hidden');

                button.innerHTML = '<i class="fas fa-pen"></i>';
                button.title = "Edit project";
            } else {
                alert(data.message || 'Failed to update project');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to update project');
        });
    }
}

function deleteProject(projectId) {
    if (!confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
        return;
    }

    fetch(`/projects/${projectId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const projectCard = document.querySelector(`.project-card[data-project-id="${projectId}"]`);
            projectCard.remove();
        } else {
            alert(data.message || 'Failed to delete project');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to delete project');
    });
}

function deleteProject(projectId) {
    if (!confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
        return;
    }

    fetch(`/projects/${projectId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const projectCard = document.querySelector(`.project-card[data-project-id="${projectId}"]`);
            projectCard.remove();
        } else {
            alert(data.message || 'Failed to delete project');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to delete project');
    });
}

// Update your existing toggleFiles function
function toggleFiles(button) {
    const fileList = button.parentElement.nextElementSibling;
    fileList.classList.toggle('expanded');

    if (fileList.classList.contains('expanded')) {
        button.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Hide Files';
    } else {
        button.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>View Files';
    }
}

document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search projects..."]');
        const projectCards = document.querySelectorAll('.project-card');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            projectCards.forEach(card => {
                const projectName = card.querySelector('.project-name').textContent.toLowerCase();
                const projectDescription = card.querySelector('.project-description').textContent.toLowerCase();

                if (projectName.includes(searchTerm) || projectDescription.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const folderToggles = document.querySelectorAll('.folder-toggle');

    folderToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const nestedFiles = this.nextElementSibling;
            const chevron = this.querySelector('.folder-chevron');

            nestedFiles.classList.toggle('hidden');

            if (nestedFiles.classList.contains('hidden')) {
                chevron.classList.remove('fa-chevron-up');
                chevron.classList.add('fa-chevron-down');
            } else {
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
            }
        });
    });
});
document.getElementById('profilePicUpload').addEventListener('change', function () {
        // Check if a file is selected
        if (this.files && this.files[0]) {
            // Optionally, preview the selected image before submitting
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);

            // Submit the form
            document.getElementById('uploadForm').submit();
        }
    });

    </script>

</body>
</html>
