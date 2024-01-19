<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AssignToProjectForm from './Partials/AssignToProjectForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    project: {
        type: Object,
        required: true,
    },
    members: {
        type: Array,
        required: true,
    },
    users: {
        type: Array,
        required: true,
    },
});


</script>

<template>
    <Head title="Members" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{project.project_name}}</h2>
        </template>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <AssignToProjectForm :users="users" :project_id="project.id" class="max-w-xl" />
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <!-- loop through Projects  -->
                    <ul v-if="members.length > 0">
                        <li v-for="(member, index) in members" :key="index">
                        -  {{member.name}} </li>
                    </ul>
            
                    <p v-else>There are no members assigned to this project yet</p>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
