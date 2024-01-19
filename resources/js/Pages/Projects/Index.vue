<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateProjectForm from './Partials/CreateProjectForm.vue';
// import Link from '@/Components/Link.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    projects: {
        type: Array,
        required: true,
    },
});


</script>

<template>
    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <CreateProjectForm class="max-w-xl" />
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <ul v-if="projects.length > 0">
                        <li v-for="(project, index) in projects" :key="index" class="margin-3 w-80 p-5">
                            <p>- {{project.project_name}} - Users:  {{project.users?.length}} 
                            <Link :href="route('projects.members.show', project.id)" as="button" class="color: bg-indigo-400 font-bold p-3 float-right"> View ></Link> 
                            </p>
                        </li>
                    </ul>
            
                    <p v-else>There are no projects created yet</p>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
