<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Role List
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Permission
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Admin
                                        </th>
                                        <td class="py-4 px-6"></td>
                                    </tr>
                                    <tr v-for="role in roles" :key="role.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ role.name }}
                                        </th>

                                        <td v-if=" $page.props.auth.user.roles[0].id != role.id" class="py-4 px-6">
                                            <button @click="permission(role.id)" type="button"
                                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Permission</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        roles: Object,
        permissions: Object,
    });
    const form = useForm({});

    const permission = (role) => {
        Inertia.get('/permission/' + role);
    };

    const status = (todo) => {
        form.put('/todos/' + todo.id + '/update', {
            onFinish: () => form.reset(),
        });
    };
    const remove = (todo) => {
        form.delete('todos/' + todo.id, {
            onFinish: () => form.reset(),
        });
    };

</script>
