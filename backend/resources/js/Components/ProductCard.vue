<script>    
    export default {
        props: ['title']
    }
</script>
    
<template>
    <div class="bg-slate-800 rounded-md border border-slate-700">
        <slot />
    </div>
</template>
