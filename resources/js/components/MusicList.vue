<template>

    <div class="h-full">
       <div>
        <a 
            class="border-solid border-2 border-indigo-600 rounded-2xl p-2 hover:bg-sky-700"
            href="MusicList/top"
        >TOP100</a>
        <a 
            class="border-solid border-2 border-indigo-600 rounded-2xl p-2 hover:bg-sky-700"
            href="MusicList/new"
            >NEW</a>
        <a class="border-solid border-2 border-indigo-600 rounded-2xl p-2 hover:bg-sky-700">HOME</a>
        <a class="border-solid border-2 border-indigo-600 rounded-2xl p-2 hover:bg-sky-700">test</a>
       </div>
        
        <br>
        <!-- <NewList/> -->
        <TopList/>
    </div>        
</template>

<script>
    import Axios from 'axios';
    import NewList from './MusicChat.vue/NewList.vue';
    import TopList from './MusicChat.vue/TopList.vue';



    const routes = [
        {
            path: "/NewList",
            component: NewList
        }
    ]

    export default {

        components: {
            NewList,
            TopList
        }
    }
</script>

            <style>

            </style>