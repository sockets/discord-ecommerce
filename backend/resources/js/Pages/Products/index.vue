<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Card from '@/Components/Card.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Pagination from '@/Components/Pagination.vue'
</script>
    
<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton>Create Product</PrimaryButton>
                <div class="bg-slate-800/70 rounded-md border border-slate-700/40 shadow-md mt-4">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-slate-800/70 rounded-md border border-slate-700/40 text-gray-300 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Price</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Stock</th>
                                <th class="py-3 px-6 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-200 text-sm font-light">
                            <tr v-for="product in products.data" :key="product.id" class="border-b border-gray-700 hover:bg-slate-800">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ product.id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ product.name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ product.description }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>${{ product.price.toFixed(2) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div v-if="product.status === 0">
                                            <span class="bg-red-500/20 text-red-500 py-1 px-3 rounded-full text-xs">Inactive</span>
                                        </div>
                                        <div v-else-if="product.status === 1">
                                            <span class="bg-green-500/20 text-green-500 py-1 px-3 rounded-full text-xs">Active</span>
                                        </div>
                                        <div v-else>
                                            <span class="bg-orange-500/20 text-orange-500 py-1 px-3 rounded-full text-xs">N/A</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ product.stock }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <a :href="`/products/${product.id}`">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                    </a>
                                </td>

                            </tr>
                            
                        </tbody>
                    </table>
                    
                    <pagination class="mt-6" :links="products.links" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

    export default {
        components: {
            Pagination
        },
        props: {
            products: Object
        }
    }
</script>
    