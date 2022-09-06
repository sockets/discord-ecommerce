<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Card from '@/Components/Card.vue';
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
                    <Card title="Hello" >
                        You're logged in!
                    </Card>
                </div>
            </div>
        </AuthenticatedLayout>
    </template>
    