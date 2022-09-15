<template>

    <div class="h-full">
        <layout/>
        <h1 class="text-4xl leading-loose">Top 100 playlist {{id}}</h1>

        <table class="table-auto">
                <!-- {{tests.data.trackList[0]}} -->
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
                <tr 
                    v-for="(test, i) in tests.data.trackList" v-bind:key=i
                    
                >
                    <td>{{i + 1}}</td>
                    <td class="info">
                        <div class="info_wrap">
                            <div class="info_img"><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></div>
                            <div class="text_area">
                                <div class="titplay">{{tests.data.trackList[i].name}}</div>
                                <div class="desc">{{tests.data.trackList[i].album.title}}</div>
                            </div>

                        </div>
                        
                    </td>
                    <td class="artist">{{tests.data.trackList[i].artistList[0].name}}</td>

                    <td>{{tests.data.trackList[i].fileUpdateDateTime}}</td>
                    <td>
                        <button @click="handle_toggle(i)">정보보기</button>
                        <br>
                    </td>
                    
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
                        <img :src=tests.data.trackList[this.id+1].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[80px]" @click="nextevent(1)">
                        <img :src=tests.data.trackList[this.id+2].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[70px]" @click="nextevent(2)">
                        <img :src=tests.data.trackList[this.id+3].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[60px]" @click="nextevent(3)">
                        <img :src=tests.data.trackList[this.id+4].album.imgList[0].url alt="" class="float-left relative top-[336px] right-[50px]" @click="nextevent(4)">
                        <img src="../../../img/icon_arrow_right.png" alt="" class="float-left relative top-[355px] right-[40px]"
                        @click="nextevent(1)">
                    </div>
                </div>
                <div class="test2">
                    <button @click="submit" type="button" class="float-left relative top-[32px] right-[22px]">마이 페이지에 저장하기</button>
                    <button @click="handle_cancel" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>

                </div>
    </div>
    </div>        
</template>

<script>
    import Axios from 'axios';
    import layout from '../layout/layout.vue'

    export default {
        props: {
                currentUser: {
                    type: Number,
                    required: true
                }
            },
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
                                     .post('/api/chatlists', {
                                        userid:this.currentUser,
                                        index:this.id,
                                        title: this.tests.data.trackList[this.id].album.title,
                                        img: this.tests.data.trackList[this.id].album.imgList[0].url,
                                        // img: this.imgList,
                                        img2: this.tests.data.trackList[this.id].album.imgList[2].url,
                                        artist: this.tests.data.trackList[this.id].artistList[0].name,
                                        albumName: this.tests.data.trackList[this.id].album.title,
                                        playlist: this.id,
                                        // update:this.test,
                                        createDate:'2022-09-09 11:08:37'
                                     })
                                },
                    preevent: function(){
                        this.id = this.id - 1
                        if (this.id < 0){
                            this.id = 0 
                        }
                    },
                    nextevent(i) {
                        this.id = this.id + i
                    }
                    }
    }
</script>

<style>
.css-tr {
    height: 39px;
    font-size: 13px;
    color: #a0a0a0;
    font-weight: 400;
    border-top: 1px solid #ebebeb;
    border-bottom: 1px solid #ebebeb;
    text-align: center;
}

td {
    position: relative;
    height: 84px;
    text-align: center;
    border-bottom: 1px solid #f6f6f6;
}


.info > .info_wrap {
    position: relative;
    min-width: 210px;
    max-width: 520px;
    height: 60px;
    padding-right: 28px;
    padding-left: 80px;
}



.info > .info_wrap > .info_img {
    position: absolute;
    top: 0;
    left: 0;
    width: 60px;
    height: 60px;
}

.info > .info_wrap > .text_area {
    max-width: 280px;
    text-align: left;
}

.titplay {
    font-size: 24px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.info > .info_wrap > .text_are > .desc {
    color: gray;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.artist {
    text-align: left;
    padding-left: 20px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}



</style>