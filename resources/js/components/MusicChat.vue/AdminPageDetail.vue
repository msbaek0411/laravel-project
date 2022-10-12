<template>
    <div>

        


<!-- userlist -->
        <section class="antialiased bg-gray-100 text-gray-600 h-[47vh] px-4" x-data="app">
            <div class="flex flex-col justify-center h-full">
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-gray-800 float-left">총 users 계정</div>
                        <div class="font-semibold text-gray-800 float-left ml-[81%] mr-[3%]">수정</div>
                        <div class="font-semibold text-gray-800">삭제</div>
                    </header>

                    <div class="overflow-x-auto p-3">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">idx.</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">name</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">email</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">created</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">updated</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100"
                                v-for="(test, i) in userlist.users" :key="test"
                            >
                                <!-- record 1 -->
                                <tr>
                                    <td class="p-2">
                                        {{i+1}}
                                    </td>
                                    <td class="p-2">
                                        {{userlist.users[i].name}}
                                    </td>
                                    <td class="p-2">
                                        {{userlist.users[i].email}}
                                    </td>
                                    <td class="p-2"> 
                                        {{userlist.users[i].created_at}}
                                    </td>
                                    <td class="p-2">
                                        {{userlist.users[i].updated_at}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    

</template>

<script>
    import Axios from 'axios';
    import layout from '../layout/layout.vue'

    export default {
        components: {
                layout
                
            },
        data() {
            return {
                userlist:[],
                issuelist:[],
                chatlist:[],

                    }
        },
        created() {
            Axios
                .get(
                     '/api/users'
                )
                .then(res => {
                    this.userlist = res.data
                })
                .catch(error => {
                    console.log(error)
                });

            Axios
                .get(
                        '/api/issue'
                )
                .then(res => {
                    this.issuelist = res.data
                })
                .catch(error => {
                    console.log(error)
                });
            Axios
                .get(
                        '/api/chatlists/all'
                )
                .then(res => {
                    this.chatlist = res.data
                })
                .catch(error => {
                    console.log(error)
                });
        },
    }
</script>

<style></style>