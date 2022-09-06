<template>
    <div class="flex h-full">
        {{List[0].id}}
        test
    </div>
</template>

<script>
import Axios from 'axios';
    export default {
        data() {
            return{
                List : []
            }
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