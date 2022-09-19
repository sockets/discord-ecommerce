<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Card from '@/Components/Card.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Pagination from '@/Components/Pagination.vue'
</script>
    
<template>
    <Head title="Customers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Customers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton>Create Customer</PrimaryButton>
                <div class="bg-slate-800/70 rounded-md border border-slate-700/40 shadow-md mt-4">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-slate-800/70 rounded-md border border-slate-700/40 text-gray-300 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Username</th>
                                <th class="py-3 px-6 text-left">Discord ID</th>
                                <th class="py-3 px-6 text-left">Stripe Customer</th>
                                <th class="py-3 px-6 text-left">Billing Email</th>
                                <th class="py-3 px-6 text-left">Billing Name</th>
                                <th class="py-3 px-6 text-left">Total Spent</th>
                                <th class="py-3 px-6 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-200 text-sm font-light">
                            <tr v-for="customer in customers.data" :key="customer.id" class="border-b border-gray-700 hover:bg-slate-800">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.username }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.discord_id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.stripe_customer }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.billing_email }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ customer.billing_name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>${{ customer.total_spent.toFixed(2) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <a :href="`/customers/${customer.id}`">
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
                    <pagination class="mt-6" :links="customers.links" />
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
            customers: Object
        }
    }
</script>
    