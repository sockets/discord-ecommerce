<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import StatisticCard from '@/Components/StatisticCard.vue';
import DataTable from '@/Components/DataTable.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <StatisticCard title="Recurring Revenue" data="$300/mo" icon="fa-solid fa-chart-line"/>
                    <StatisticCard title="Orders This Month" data="4" icon="fa-solid fa-tags"/>
                    <StatisticCard title="New Users" data="2" icon="fa-solid fa-user"/>
                    <StatisticCard title="Active Subscriptions" data="7" icon="fa-solid fa-sack-dollar"/>
                </div>
                <DataTable/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

