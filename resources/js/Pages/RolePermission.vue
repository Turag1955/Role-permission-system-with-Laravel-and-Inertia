<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permission - ({{ role.name }})
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="overflow-x-auto relative">
                            <template v-for="permission in permissions" :key="permission.id">
                                <button v-if="rolePermission[permission.id] == permission.id"
                                    @click="permissionRemove(role.id,permission.id)" type="button"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    {{ permission.name.replaceAll('_', ' ') }}
                                </button>
                                <button v-else @click="permissionSave(role.id,permission.id)" type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    {{ permission.name.replaceAll('_', ' ') }}
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {
        Inertia
    } from '@inertiajs/inertia';
    import {
        Head
    } from '@inertiajs/inertia-vue3';
    import {
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    defineProps({
        role: Object,
        permissions: Object,
        rolePermission: Array,
    });
    const form = useForm({});

    const permissionRemove = (role,permission) => {
        Inertia.get('/permission-remove/'+ role+'/'+permission);
    };

    const permissionSave = (role,permission) => {
        Inertia.get('/permission-save/'+ role+'/'+permission);
    };

</script>
