<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-200 hover:bg-slate-700 focus:outline-none focus:bg-slate-700 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>
