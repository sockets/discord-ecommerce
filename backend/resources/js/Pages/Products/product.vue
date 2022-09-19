<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Card from '@/Components/Card.vue';
    import StatisticCard from '@/Components/StatisticCard.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import TextArea from '@/Components/TextArea.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import SelectInput from '@/Components/SelectInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';


    const form = useForm({
        name: '',
        description: '',
        stock: '',
        stripe_price: '',
        status: ''

    });
</script>
    
<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Editing Product: <span class="bg-slate-800/80 py-1 px-3 rounded-md text-[16px]">{{ product.name }}</span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <StatisticCard title="Total Revenue" :data="`$${ product.total_revenue.toFixed(2) }`" icon="fa-solid fa-sack-dollar"/>
                    <StatisticCard title="Orders This Month" :data="`${ product.months_order_count }`" icon="fa-solid fa-tags"/>
                    <StatisticCard title="Total Orders" :data="`${ product.total_order_count }`" icon="fa-solid fa-chart-line"/>
                    <StatisticCard title="Place Holder" data="7" icon="fa-solid fa-user"/>
                </div>
                <Card title="Edit Product" class="mt-8">
                    <!--  class="mx-auto px-4" -->
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
                    <form @submit.prevent="submit" class="pt-2 pb-4 px-4">
                        <div>
                            <InputLabel for="name" value="Name" />
                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="pt-3">
                            <InputLabel for="description" value="Description" />
                            <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description" required />
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div class="grid grid-cols-4 gap-4 pt-3">
                            <div>
                                <InputLabel for="stock" value="Stock" />
                                <TextInput id="stock" type="number" min="0" class="mt-1 block w-full" v-model="form.stock" required />
                                <InputError class="mt-2" :message="form.errors.stock" />
                            </div>
                            <div>
                                <InputLabel for="stripe_price" value="Stripe Price" />
                                <SelectInput id="stripe_price" class="mt-1 block w-full" v-model="form.stripe_price" required>
                                    <option>x</option>
                                </SelectInput>
                                <InputError class="mt-2" :message="form.errors.stripe_price" />
                            </div>
                            <div>
                                <InputLabel for="status" value="Status" />
                                <SelectInput id="status" class="mt-1 block w-full" v-model="form.status" required>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </SelectInput>
                                <InputError class="mt-2" :message="form.errors.status" />
                            </div>
                        </div>
                        <PrimaryButton class="mt-6">Save Changes</PrimaryButton>
                    </form>
                </Card>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

    export default {
        props: {
            product: Object
        }
    }
</script>
    