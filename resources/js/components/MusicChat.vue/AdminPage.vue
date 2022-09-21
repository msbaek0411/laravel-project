<template>
    <div>
        <div>users계정 확인 / users http://127.0.0.1:8000/api/users</div>
        <div>issue 정보 확인 / issues http://127.0.0.1:8000/api/issue</div>
        <div>사용자별 플레이리스트 확인 / chat_list http://127.0.0.1:8000/api/chatlists/all</div>
        


<!-- userlist -->
        <section class="antialiased bg-gray-100 text-gray-600  px-4" x-data="app">
            <div class="flex flex-col justify-center h-full">
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-gray-800 float-left">총 users 계정</div>
                        <a class="font-semibold text-gray-800 float-left ml-[87%] mr-[1%]" href="/admin/createuser" >추가</a>
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
                                    <th class="p-2">
                                        <div class="font-semibold text-center">수정/삭제</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100"
                                v-for="(test, i) in userlist.users" :key="i"
                            >
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
                                    <td class="p-2">
                                        <a class="float-left" :href="'http://127.0.0.1:8000/admin/user/'+userlist.users[i].id+'/edit'">수정</a>
                                        <div @click="deleteList(userlist.users[i].id)">삭제</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<!-- issuelist -->
        <section class="antialiased bg-gray-100 text-gray-600 px-4" x-data="app">
            <div class="flex flex-col justify-center h-full">
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-gray-800">issue 등록 및 정보</div>
                        <a class="font-semibold text-gray-800 float-left ml-[87%] mr-[1%]" href="/admin/issue/createuser" >추가</a>
                    </header>

                    <div class="overflow-x-auto p-3">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">img주소</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">title</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">artist</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">유튜브 주소</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">iframe 주소</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">등록일자</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">수정 / 삭제</div>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100"
                                v-for="(tests, i) in issuelist.issue" :key="i"
                            >
                                <!-- record 1 -->
                                <tr>
                                    <td class="p-2">
                                        {{issuelist.issue[i].img}}
                                    </td>
                                    <td class="p-2">
                                        {{issuelist.issue[i].title}}
                                    </td>
                                    <td class="p-2"> 
                                        {{issuelist.issue[i].artist}}
                                    </td>
                                    <td class="p-2">
                                        {{issuelist.issue[i].href}}
                                    </td>
                                    <td class="p-2">
                                        {{issuelist.issue[i].contents}}
                                    </td>
                                    <td class="p-2">
                                        {{issuelist.issue[i].created_at}}
                                    </td>
                                    <td class="p-2">
                                        <a class="float-left" :href="'http://127.0.0.1:8000/admin/issue/'+issuelist.issue[i].id+'/edit'">수정</a>
                                        <div @click="deleteListissue(issuelist.issue[i].id)">삭제</div>
                                    </td>
                                    {{issuelist.issue[0].id}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<!-- chatlist -->
        <section class="antialiased bg-gray-100 text-gray-600 px-4" x-data="app">
            <div class="flex flex-col justify-center h-full">
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-gray-800">사용자별 플레이리스트</div>
                    </header>

                    <div class="overflow-x-auto p-3">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">userid</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">small img</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">big img</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">tittle</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">artist</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">albumname</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">createdate</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100"
                                v-for="(testa, i) in chatlist.ChatList" :key="i"
                            >
                                <!-- record 1 -->
                                <tr>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].userId}}
                                    </td>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].img}}
                                    </td>
                                    <td class="p-2"> 
                                        {{chatlist.ChatList[i].img2}}
                                    </td>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].title}}
                                    </td>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].artist}}
                                    </td>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].albumName}}
                                    </td>
                                    <td class="p-2">
                                        {{chatlist.ChatList[i].created_at}}
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
                     'http://127.0.0.1:8000/api/users'
                )
                .then(res => {
                    this.userlist = res.data
                })
                .catch(error => {
                    console.log(error)
                });

            Axios
                .get(
                        'http://127.0.0.1:8000/api/issue'
                )
                .then(res => {
                    this.issuelist = res.data
                })
                .catch(error => {
                    console.log(error)
                });
            Axios
                .get(
                        'http://127.0.0.1:8000/api/chatlists/all'
                )
                .then(res => {
                    this.chatlist = res.data
                })
                .catch(error => {
                    console.log(error)
                });
        },
        methods:{
                deleteList(i) {
                    Axios
                        .delete(`http://127.0.0.1:8000/api/admin/user/${i}`) 
                        .then(res => { window.location.reload(); });

                            },
                deleteListissue(i) {
                    Axios
                        .delete(`http://127.0.0.1:8000/api/admin/issue/${i}`) 
                        .then(res => { window.location.reload(); });
                }
                }
    }
</script>

<style></style>