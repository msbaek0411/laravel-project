<template>

    <div class="h-full">
        <layout/>
        <h1 class="text-4xl leading-loose">나의 playlist {{Main}} </h1>

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
                <tr 
                v-for="(test, i) in Main.ChatList" :key= i>

                        <td @click="[handle_toggle(),countup(i)]">{{i + 1}}</td>
                        <td @click="[handle_toggle(),countup(i)]"><img :src="Main.ChatList[i].img" alt="NewListImg"></td>
                        <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].title}}</td>
                        <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].artist}}</td>
                        <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].albumName}}</td>
                        <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].createDate}}</td>
                        <td @click="[handle_toggle(),countup(i)]">{{Main.ChatList[i].playlist}}</td>
                        <td @click="deleteList(i)">삭제</td>
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
        
        
    </template>

    <script>
        import Axios from 'axios';
        import layout from '../layout/layout.vue'

        export default {
            props: {
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
                        Main: [],
                        is_show: false ,
                        id: '1',
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
                        },
                        deleteList(i) {
                            alert('삭제 됐습니다.')
                            Axios.delete(`http://127.0.0.1:8000/api/chatlists/${i+1}`)
                            .then(res => {
                                window.location.reload();
                            });
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