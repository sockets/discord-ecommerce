<script>    

    export default {
        props: ['title', 'data', 'icon']
    }
</script>
    
<template>
    <div class="bg-slate-800/70 rounded-md border border-slate-700/40 flex">
        <div class="bg-slate-900/40 p-3 h-12 w-12 text-center rounded-full m-3 mr-1">
            <font-awesome-icon :icon="icon" class="text-slate-300" size="lg" />
        </div>
        <div>
            <div class="text-slate-400 px-3 pt-3 font-bold text-[14px]">{{title}}</div>
            <div class="text-slate-300 px-3 pb-2 font-bold text-[22px]">{{data}}</div>
        </div>
    </div>
</template>
