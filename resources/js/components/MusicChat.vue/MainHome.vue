<template>

    <div class="h-full">
        <!-- <a class="btn btn-outline btn-accent" href="/MusicList/top">TOP100</a>
        <a class="btn btn-outline btn-accent" href="/MusicList/new">NEW</a>
        <a class="btn btn-active btn-accent" href="/MusicList/MainHome">Mainhome</a>
        <a class="btn btn-outline btn-accent" href="/admin">admin</a> -->
        <h1 class="text-4xl leading-loose">나의 playlist</h1>

        <div>
            <input v-on:keyup="filter" type="text" id="value" placeholder="Type to Search" class="ml-[85%]">
        </div>
            <div v-if="Main.ChatList[1] == null ">
                <div>
                로그인 부탁드립니다.
                </div>
            </div>
            <div v-else>
                <table class="table-auto w-full">
                <thead>
                    <tr class="css-tr">
                        <th>.no</th>
                        <th>곡/앨범</th>
                        <th>아티스트</th>
                        <th>발행날짜</th>
                        <th>추가 정보</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(test, i) in Main.ChatList" v-bind:key=i class="itemtr">
                        <td>{{i + 1}}</td>
                        <td class="info">
                            <div class="info_wrap">
                                <div class="info_img"><img :src=Main.ChatList[i].img alt=""></div>
                                <div class="text_area">
                                    <div class="item">
                                        <div class="titplay name">{{Main.ChatList[i].title}}</div>
                                        <div class="desc name">{{Main.ChatList[i].artist}}</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="artist">{{Main.ChatList[i].artist}}</td>

                        <td>{{Main.ChatList[i].createDate}}</td>
                        <td>
                                <button @click="handle_toggle(i)">정보보기</button>
                                <div @click="deleteList(Main.ChatList[i].id)">삭제</div>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            
            <!-- Modal  -->
            <div v-show="is_show" class="test">
            <div class="w-full h-full">
                {{this.i}}
                <img :src=Main.ChatList[this.id].img alt="" class="float-left pr-4 pb-[33px] w-[22%]" >
                <div  class="mb-[13%]">
                    <li class="text-[32px]">{{Main.ChatList[this.id].title}}</li>
                    <li>{{Main.ChatList[this.id].artist}}</li>
                    <br>
                    <li><div class="float-left text-[13px] mr-[8px] ">타이틀명</div>
                        <div class="text-[13px]">{{Main.ChatList[this.id].albumName}}</div>
                    </li>
                    
                </div>

                <table class="table-auto w-full modallist">
                    <thead class="w-full table">
                        <tr class="css-tr">
                            <th>.no</th>
                            <th>곡/앨범</th>
                        </tr>
                    </thead>
                    <tbody class="w-full table">
                        <tr v-for="(test, i) in songs" v-bind:key=i style="clear: both;" class="itemtr">
                            <td style="height: 34px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{i + 1}}</td>
                            <td class="" style="height: 34px;">
                                <div class=""  style="height: -1px;">
                                    <!-- <div class="info_img"><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></div> -->
                                    <div class="text_area">
                                        <div class="item">
                                            <li>{{songs[i].name}}</li>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>   
            </div>
            <div class="test2">
                <button @click="handle_cancel()" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>

            </div>
        </div>
        </div>
    </div>

        
        
    </template>

    <script>
        import Axios from 'axios';
        import layout from '../layout/layout.vue';

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
                        alldata: [],
                        songs : [],
                        i: '',
                        }
            },
            created() {
                Axios
                    .get('/api/chatlists', {
                        params: {
                        userid: this.currentUser,
                    }
                    })
                    .then(res=>{this.Main = res.data}) 
                    .catch(error => {console.log(error)});
                    
            },
            methods:{
                        handle_toggle(i) {
                            this.is_show = !this.is_show; // #2, #3
                            this.id = i

                            Axios
                                .get(`https://www.music-flo.com/api/meta/v1/album/${this.Main.ChatList[this.id].albumid}/track`)
                                .then(res => {this.songs = res.data.data.list})
                        },
                        handle_cancel() {
                            this.is_show = !this.is_show; // #2, #3
                        },
                        countup(i) {
                            this.id  =  i
                        },
                        deleteList(i) {
                            alert('삭제 됐습니다.')
                            Axios.delete(`/api/chatlists/${i}`)
                            .then(res => {
                                window.location.reload();
                            });
                        },
                        alldatas() {
                            Axios.get('/api/chatlists/all')
                            .then(res=>{this.alldata = res.data})
                            .then(this.Main = this.alldata)
                        },
                        filter: function(){
                        var value, name, item, i, itemtr;
                            value = document.getElementById("value").value.toUpperCase();
                            item = document.getElementsByClassName("item");
                            itemtr = document.getElementsByClassName("itemtr");
                            
                            for(i=0;i<itemtr.length;i++){
                                name = item[i].getElementsByClassName("name");
                                if(name[0].innerHTML.toUpperCase().indexOf(value) > -1){
                                itemtr[i].style.display = "table-row";
                                }else{
                                itemtr[i].style.display = "none";
                                // item[i].style.display = "none";
                                 
                                }
                            }
                    },
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