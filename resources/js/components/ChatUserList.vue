<template>
    <div class="w-1/5 border-r-2 border-solid border-gray-600">
        <div
            v-for="user in users"
            :key="user.id"
            class="p-2 border-b-2 border-gray-600 hover:bg-gray-300"
        >
            {{ user.name }}
        </div>
        <!-- <div v-for="(k,i) in menu" :key="i">
            {{menu}}
        </div> -->
        <!-- {{users[0].name}}
        {{users[1].name}} -->

        <div v-for="user in users" :key="user.id">
            {{ user.name }}
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                menu : ['Home: 423', 'Shop: 414', 'About: 4141'],
            }
        },
        created() {
            axios.get('/api/users').then(res => {
                this.users = res.data.users;
            }).catch(error => {
                console.log(error)
            });
        }
    }
</script>