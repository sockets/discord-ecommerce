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
        discord_id: '',
        username: '',
        stripe_customer: '',
        billing_email: '',
        billing_name: '',
        billing_address: '',
        billing_city: '',
        billing_state: '',
        billing_zipcode: '',
        billing_country: '',
        billing_phone: '',
        billing_card_last4: '',
        billing_name_on_card: '',
        billing_card_type: '',
        total_spent: ''
    });
</script>
    
<template>
    <Head title="Customers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Editing Customer: <span class="bg-slate-800/80 py-1 px-3 rounded-md text-[16px]">{{ customer.username }}</span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <StatisticCard title="Total Spent" :data="`$${ customer.total_spent.toFixed(2) }`" icon="fa-solid fa-sack-dollar"/>
                    <StatisticCard title="Total Orders" :data="`${ customer.total_orders }`" icon="fa-solid fa-tags"/>
                </div>
                <Card title="Edit Customer" class="mt-8">
                    <!--  class="mx-auto px-4" -->
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
                    <form @submit.prevent="submit" class="pt-2 pb-4 px-4">
                        <div class="grid grid-cols-4 gap-4 pt-3">
                            <div>
                                <InputLabel for="username" value="Username" />
                                <TextInput id="username" type="text" class="mt-1 block w-full" :value="`${customer.username}`" v-model="form.username" readonly/>
                                <InputError class="mt-2" :message="form.errors.username" />
                            </div>
                            <div>
                                <InputLabel for="discord_id" value="Discord ID" />
                                <TextInput id="discord_id" type="text" class="mt-1 block w-full" :value="`${customer.discord_id}`" v-model="form.discord_id" readonly/>
                                <InputError class="mt-2" :message="form.errors.discord_id" />
                            </div>
                            <div>
                                <InputLabel for="stripe_customer" value="Stripe Customer" />
                                <TextInput id="stripe_customer" type="text" class="mt-1 block w-full" :value="`${customer.stripe_customer}`" v-model="form.stripe_customer" readonly/>
                                <InputError class="mt-2" :message="form.errors.stripe_customer" />
                            </div>
                            <div>
                                <InputLabel for="billing_name" value="Billing Name" />
                                <TextInput id="billing_name" type="text" class="mt-1 block w-full" :value="`${customer.billing_name}`" v-model="form.billing_name" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_name" />
                            </div>
                            <div class="col-span-2">
                                <InputLabel for="billing_email" value="Billing Email" />
                                <TextInput id="billing_email" type="text" class="mt-1 block w-full" :value="`${customer.billing_email}`" v-model="form.billing_email" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_email" />
                            </div>
                            <div class="col-span-2">
                                <InputLabel for="billing_address" value="Billing Address" />
                                <TextInput id="billing_address" type="text" class="mt-1 block w-full" :value="`${customer.billing_address}`" v-model="form.billing_address" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_address" />
                            </div>
                            <div>
                                <InputLabel for="billing_city" value="Billing City" />
                                <TextInput id="billing_city" type="text" class="mt-1 block w-full" :value="`${customer.billing_city}`" v-model="form.billing_city" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_city" />
                            </div>
                            <div>
                                <InputLabel for="billing_state" value="Billing State" />
                                <TextInput id="billing_state" type="text" class="mt-1 block w-full" :value="`${customer.billing_state}`" v-model="form.billing_state" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_state" />
                            </div>
                            <div>
                                <InputLabel for="billing_zipcode" value="Billing ZipCode" />
                                <TextInput id="billing_zipcode" type="text" class="mt-1 block w-full" :value="`${customer.billing_zipcode}`" v-model="form.billing_zipcode" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_zipcode" />
                            </div>
                            <div>
                                <InputLabel for="billing_country" value="Billing Country" />
                                <TextInput id="billing_country" type="text" class="mt-1 block w-full" :value="`${customer.billing_country}`" v-model="form.billing_country" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_country" />
                            </div>
                            <div>
                                <InputLabel for="billing_phone" value="Billing Phone" />
                                <TextInput id="billing_phone" type="text" class="mt-1 block w-full" :value="`${customer.billing_phone}`" v-model="form.billing_phone" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_phone" />
                            </div>
                            <div>
                                <InputLabel for="billing_card_last4" value="Billing Card Last 4" />
                                <TextInput id="billing_card_last4" type="text" class="mt-1 block w-full" :value="`${customer.billing_card_last4}`" v-model="form.billing_card_last4" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_card_last4" />
                            </div>
                            <div>
                                <InputLabel for="billing_name_on_card" value="Billing Name On Card" />
                                <TextInput id="billing_name_on_card" type="text" class="mt-1 block w-full" :value="`${customer.billing_name_on_card}`" v-model="form.billing_name_on_card" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_name_on_card" />
                            </div>
                            <div>
                                <InputLabel for="billing_card_type" value="Billing Card Type" />
                                <TextInput id="billing_card_type" type="text" class="mt-1 block w-full" :value="`${customer.billing_card_type}`" v-model="form.billing_card_type" readonly/>
                                <InputError class="mt-2" :message="form.errors.billing_card_type" />
                            </div>
                        </div>
                    </form>
                </Card>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

    export default {
        props: {
            customer: Object
        }
    }
</script>
    