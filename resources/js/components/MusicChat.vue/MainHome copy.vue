<template>

    <div class="h-full">
        <layout/>
        <h1 class="text-4xl leading-loose">나의 playlist        {{id}}</h1>

        <table class="table-auto">
            <thead>
                <tr>
                    <th>.no</th>
                    <th>타이틀</th>
                    <th>제목</th>
                    <th>아티스트</th>
                    <th>앨범이름</th>
                    <th>발행날짜</th>
                    <th>플레이리스트</th>
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="(test, i) in Main.ChatList" :key= test
                @click="[handle_toggle(),countup(i)]"
                
                >
                        <td>{{i + 1}}</td>
                        <td><img :src="Main.ChatList[i].img" alt="NewListImg"></td>
                        <td>{{Main.ChatList[i].title}}</td>
                        <td>{{Main.ChatList[i].artist}}</td>
                        <td>{{Main.ChatList[i].albumName}}</td>
                        <td>{{Main.ChatList[i].createDate}}</td>
                        <td>{{Main.ChatList[i].playlist}}</td>
                </tr>

                </tbody>
                <!-- <button @click="countup">123</button> -->
                <div >
                    <!-- {{Main.ChatList[datas].title}} -->
                </div>

            </table>
    <!-- Modal  -->
    <div v-show="is_show" class="test">
                <div class="w-full h-full">
                    <div>
                        <img :src="Main.ChatList[this.id].img" alt="NewListImg">
                    </div>
                    <div>
                    {{Main.ChatList[this.id].title}}
                    {{Main.ChatList[this.id].artist}}
                    {{Main.ChatList[this.id].albumName}}
                    {{Main.ChatList[this.id].createDate}}
                    {{Main.ChatList[this.id].playlist}}
                    </div>

                </div>
        <div class="test2">
            <button @click="handle_toggle" type="button">취소</button>
            <button @click="handle_toggle" type="button">확인</button>
        </div>

    </div>
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
                return {tests: [],
                        Main: [],
                        is_show: false ,
                        id: '1'
                        }
            },
            created() {
                Axios
                    .get('http://127.0.0.1:8000/api/chatlists')
                    .then(res=>{this.Main = res.data}) 
                    .catch(error => {console.log(error)});
            },
            methods:{
                        handle_toggle: function(){ 
                        this.is_show = !this.is_show; // #2, #3
                        },
                        countup(i) {
                            this.id  =  i
                        }
                    }
        }
        
    </script>
    <style>
        .test{
            border: 1px solid darkgray;
    padding: 3%;
    width: 41%;
    height: 66%;
    position: absolute;
    background: white;
    top: 15%;
    left: 28%;
        }
        .test2{
            position: absolute;
            bottom: 10%;
            left: center;
            left: 50%;
        }
    
    </style>