<template>

    <div class="h-full">
        <a class="btn btn-outline btn-accent" href="/MusicList/top">TOP100</a>
        <a class="btn btn-outline btn-accent" href="/MusicList/new">NEW</a>
        <a class="btn btn-active btn-accent" href="/MusicList/MainHome">Mainhome</a>
        <a class="btn btn-outline btn-accent">test</a>
        <h1 class="text-4xl leading-loose">나의 playlist</h1>


        <div v-if="Main.ChatList[1] == null ">
            <div>
                정보없ㅇ므 <a href="http://127.0.0.1:8000/MusicList/top">탑</a>이나<a href="http://127.0.0.1:8000/MusicList/new">뉴</a>에 가서 데이터 쌓고 돌아와라.
            </div>
        </div>
        <div v-else>
            <button @click="alldatas()">전체데이타</button>
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
                    <th>더보기</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(test, i) in Main.ChatList" :key= i>
                    <td @click="[handle_toggle(),countup(i)]">{{i + 1}}</td>
                    <td @click="[handle_toggle(),countup(i)]"><img :src="Main.ChatList[i].img" alt="NewListImg"></td>
                    <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].title}}</td>
                    <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].artist}}</td>
                    <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].albumName}}</td>
                    <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].createDate}}</td>
                    <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].playlist}}</td>
                    <td @click="deleteList(Main.ChatList[i].id)">삭제</td>
                </tr>
            </tbody>
        </table>
            {{Main.ChatList[0].id}}
            
    <!-- Modal  -->
    <div v-show="is_show" class="test">
                <div class="w-full h-full">
                    <div>
                        <img :src="Main.ChatList[this.id].img" alt="NewListImg" class="float-left pr-4">
                    </div>
                    <div>
                    <li>{{Main.ChatList[this.id].title}}</li>
                    <li>{{Main.ChatList[this.id].artist}}</li>
                    <li>{{Main.ChatList[this.id].albumName}}</li>
                    <li>{{Main.ChatList[this.id].createDate}}</li>
                    <li>{{Main.ChatList[this.id].playlist}}</li>
                    </div>
                    <div class="">
                        <img src="../../../img/icon_arrow_left.png" alt="" class="float-left relative top-[355px] right-[90px]">
                        <img :src=Main.ChatList[this.id].img alt="" class="float-left relative top-[332px] right-[90px]" style="border: solid 5px burlywood;">
                        <img :src=Main.ChatList[this.id].img alt="" class="float-left relative top-[336px] right-[80px]">
                        <img :src=Main.ChatList[this.id].img alt="" class="float-left relative top-[336px] right-[70px]">
                        <img :src=Main.ChatList[this.id].img alt="" class="float-left relative top-[336px] right-[60px]">
                        <img :src=Main.ChatList[this.id].img alt="" class="float-left relative top-[336px] right-[50px]">
                        <img src="../../../img/icon_arrow_right.png" alt="" class="float-left relative top-[355px] right-[40px]">
                    </div>

                </div>
        <div class="test2">
            <button @click="handle_toggle" type="button">취소</button>
            <button @click="handle_toggle" type="button">확인</button>
        </div>

    </div>
    </div>
        </div>

        
        
    </template>

    <script>
        import Axios from 'axios';
        import layout from '../layout/layout.vue'
        import Vue from 'vue';
        import VueCarousel from 'vue-carousel'

        export default {
            props: {
                // users id
                currentUser : {
                    type: Number,
                    required: true
                }
            },
            components: {
                layout
            },
            data() {
                return {tests: [],

                    // db
                        Main: [],
                        is_show: false ,
                        id: '1',
                        alldata: []
                        }
            },
            created() {
                Axios
                    .get('http://127.0.0.1:8000/api/chatlists', {
                        params: {
                        userid: this.currentUser,
                    }
                    })
                    .then(res=>{this.Main = res.data}) 
                    .catch(error => {console.log(error)});
                    
            },
            methods:{
                        handle_toggle: function(){ 
                        this.is_show = !this.is_show; // #2, #3
                        },
                        countup(i) {
                            this.id  =  i
                        },
                        deleteList(i) {
                            alert('삭제 됐습니다.')
                            Axios.delete(`http://127.0.0.1:8000/api/chatlists/${i}`)
                            .then(res => {
                                window.location.reload();
                            });
                        },
                        alldatas() {
                            Axios.get('http://127.0.0.1:8000/api/chatlists/all')
                            .then(res=>{this.alldata = res.data})
                            .then(this.Main = this.alldata)
                        }
                    }
        }
        
    </script>
    <style>
        .test{
            border: 1px solid darkgray;
    padding: 2%;
    width: 41%;
    height: 66%;
    position: absolute;
    background: white;
    top: 15%;
    left: 28%;
    position: fixed;
    border-radius: 38px;
        }
        .test2{
            position: absolute;
            bottom: 10%;
            left: center;
            left: 50%;
        }
    li{
        list-style:none;
     }

     .modallist{
        clear: both;
        display: block;
        overflow: auto;
        width: 100%;
        height: 276px;
        border-spacing: 0;
     }
    </style>