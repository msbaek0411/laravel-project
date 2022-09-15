<template>

    <div class="h-full">
        <layout/>
        
        <br>
        
    </div>        
</template>

<script>
    import Axios from 'axios';
    import NewList from './MusicChat.vue/NewList.vue';
    import TopList from './MusicChat.vue/TopList.vue';
    import layout from './MusicChat.vue/../layout/layout.vue';



    const routes = [
        {
            path: "/NewList",
            component: NewList
        }
    ]

    export default {

        components: {
            NewList,
            TopList,
            layout
        }
    }
</script>

            <style>

            </style>