<template>
    <div class="flex h-full">
        {{List[0].id}}
        <KakaoMap/>
    </div>
</template>

<script>
import Axios from 'axios';
import KakaoMap from './kakaoApi/KakaoMap.vue';
    export default {
        data() {
            return{
                List : []
            }
        },
        components: {
            KakaoMap
        },
        created() {
            Axios.get('api/List')
            .then(res=>{
                this.List = res.data.ListFile
            }).catch(error=>{
                console.log(error)
            })
        }
    }


    
</script>

<style>
</style>