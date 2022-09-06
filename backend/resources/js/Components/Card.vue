<script>    
    export default {
        props: ['title']
    }
</script>
    
<template>
    <div class="bg-slate-800 rounded-md border border-slate-700/50">
        <div class="text-slate-400 px-3 py-2 font-semibold text-[14px]">{{title}}</div>
        <slot />
    </div>
</template>
