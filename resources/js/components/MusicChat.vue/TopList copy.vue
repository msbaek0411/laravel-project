<template>

    <div class="h-full">
        <layout/>
        <h1 class="text-4xl leading-loose">Top 100 playlist</h1>
        <table class="table-auto">
                <!-- {{tests.data.trackList[0]}} -->
                {{test}}
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
                    v-for="(test, i) in tests.data.trackList" :key= test
                    @click="handle_toggle(i)"
                >
                    <td>{{i + 1}}</td>
                    <td><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></td>
                    <td>{{tests.data.trackList[i].name}}</td>
                    <td>{{tests.data.trackList[i].artistList[0].name}}</td>
                    <td>{{tests.data.trackList[i].album.title}}</td>
                    <td>{{tests.data.trackList[i].fileUpdateDateTime}}</td>
                    <button>상세 정보 보기</button>
                    <br>
                    <button>저장하기</button>
                </tr>
            </tbody>
        </table>
        <button @click="more">더보기</button>

         <div v-show="is_show" class="test">
                <div class="w-full h-full">
                    <img :src=tests.data.trackList[this.id].album.imgList[2].url alt="" class="float-left pr-4">
                    <div>
                        <li>{{tests.data.trackList[this.id].fileUpdateDateTime}}</li>
                        <li>{{tests.data.trackList[this.id].name}}</li>
                        <li>{{tests.data.trackList[this.id].artistList[0].name}}</li>
                        <li>{{tests.data.trackList[this.id].album.title}}</li>
                    </div>
                    <div class="">
                        <img src="../../../img/icon_arrow_left.png" alt="" class="float-left relative top-[355px] right-[90px]"
                        @click="preevent">
                        <img :src=tests.data.trackList[this.id].album.imgList[0].url alt="" class="float-left relative top-[332px] right-[90px]" style="border: solid 5px burlywood;">
                        <img :src=tests.data.trackList[this.id+1].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[80px]">
                        <img :src=tests.data.trackList[this.id+2].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[70px]">
                        <img :src=tests.data.trackList[this.id+3].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[60px]">
                        <img :src=tests.data.trackList[this.id+4].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[50px]">
                        <img src="../../../img/icon_arrow_right.png" alt="" class="float-left relative top-[355px] right-[40px]"
                        @click="nextevent">
                    </div>
                </div>
        <div class="test2">
            <button @click="submit" type="button" class="float-left relative top-[32px] right-[22px]">확인</button>
            <button @click="handle_cancel" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>

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
                    trackList:[],
                    is_show: false,
                    id: '1',
                    imgList: [{ 'name' : 1, 'name2' : 2} ,{'name' : 2, 'name2' : 2}],
                    imglistnum : '1'
                    }
        },
        created() {
            Axios
                .get(
                     'https://www.music-flo.com/api/display/v1/browser/chart/1/track/list?size=20'
                )
                .then(res => {
                    this.tests = res.data
                })
                .catch(error => {
                    console.log(error)
                });
        },
        methods : {
                    more(){
                        Axios
                            .get('https://www.music-flo.com/api/display/v1/browser/chart/1/track/list?size=100')
                            .then(res => {
                                    this.tests = res.data
                                })
                    },
                    handle_toggle: function(i){ 
                                this.is_show = !this.is_show; // #2, #3
                                    this.id = i
                                },

                    handle_cancel: function(){
                                this.is_show = !this.is_show;
                    },
                    submit: function(){ 
                                this.is_show = !this.is_show; // #2, #3
                                alert('추가 됐습니다.')
                                Axios
                                     .post('/api/chatlists',{
                                        title: this.id,
                                        img: this.tests.data.trackList[this.id].album.imgList[0].url,
                                        // img: this.imgList,
                                        img2: this.id,
                                        artist: this.id,
                                        albumName: this.id,
                                        playlist: this.id,
                                        // update:this.test,
                                        createDate:'2022-09-09 11:08:37'
                                     })
                                },
                    nextevent: function(){
                        this.id = this.id + 1
                    },
                    preevent: function(){
                        this.id = this.id - 1
                    }
                    }
    }
</script>

            <style>
            </style>