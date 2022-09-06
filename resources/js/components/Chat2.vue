<template>
    <div class="flex h-full">
        {{tests[0].id}}
    </div>
</template>

<script>
import Axios from 'axios';

    export default {
        data() {
            return {
                tests: []
            }
        },
        created() {
            Axios.get('api/test')
            .then(res=>{
                this.tests = res.data.testz
            }).catch(error=>{
                console.log(error)
            });
        }
    }
</script>

<style>
</style>