<template>

    <div class="">
        
        <!-- <a class="btn btn-active btn-accent color-white" href="/MusicList/top">TOP100</a>
        <a class="btn btn-outline btn-accent" href="/MusicList/new">NEW</a>
        <a class="btn btn-outline btn-accent" href="/MusicList/MainHome">Mainhome</a>
        <a class="btn btn-outline btn-accent" href="/admin">admin</a> -->

        <h1 class="text-4xl leading-loose">Top 100 playlist</h1>
        <br>

        <div>
            <input v-on:keyup="filter" type="text" id="value" placeholder="Type to Search" class="ml-[85%]">
        </div>
        
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
                <tr v-for="(test, i) in tests.data.trackList" :key=i class="itemtr">
                    <td>{{i + 1}}</td>
                    <td class="info">
                        <div class="info_wrap">
                            <div class="info_img"><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></div>
                            <div class="text_area">
                                <div class="item">
                                    <div class="titplay name">{{tests.data.trackList[i].name}}</div>
                                    <div class="desc name">{{tests.data.trackList[i].album.title}}</div>
                                </div>
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
        <div v-show="toggle">
            <button @click="more" class="ml-[50%] btn btn-outline btn-accent">더보기</button>
        </div>
       

        <div v-show="is_show" class="test">
                <div class="w-full h-full">
                    <div>
                        
                    </div>
                    <img :src=tests.data.trackList[this.id].album.imgList[2].url alt="" class="float-left pr-4">
                    <div class="mb-[13%]">
                        <li class="text-[32px]">{{tests.data.trackList[this.id].name}}</li>
                        <li> {{tests.data.trackList[this.id].artistList[0].name}}</li>
                        <br>
                        <li>
                            <div class="float-left text-[13px] mr-[21px] ">발매일</div>
                            <div class="text-[13px]">{{tests.data.trackList[this.id].fileUpdateDateTime}}</div>
                        </li>
                        <li>
                            <div class="float-left text-[13px] mr-[8px] ">타이틀명</div>
                            <div class="text-[13px]">{{tests.data.trackList[this.id].album.title}}</div>
                        </li>
                    </div>
                    <div>
                        <li>
                            <div class="float-left">수렵곡</div>
                            <!-- <div>{{albumlist.data.list}}</div> -->
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
                    required: true,
                    
                }
            },
        components: {
                layout
                
            },
        data() {
            return {tests: [],
                    trackList:[],
                    is_show: false,
                    id: '0',
                    imgList: [{ 'name' : 1, 'name2' : 2} ,{'name' : 2, 'name2' : 2}],
                    imglistnum : '1',
                    toggle: true,
                    songs : [],
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
                            .then(res => { this.tests = res.data}
                            )
                            this.toggle = !this.toggle
                    },
                    handle_toggle: function(i){ 
                                this.is_show = !this.is_show; // #2, #3
                                this.id = i

                                Axios(`https://www.music-flo.com/api/meta/v1/album/${this.tests.data.trackList[i].album.id}/track`)
                                    .then(res => {this.songs = res.data.data.list})
                                },
                                
                    handle_cancel: function(){
                                this.is_show = !this.is_show;
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
                                        albumid: this.tests.data.trackList[this.id].album.id,
                                        playlist: this.id,
                                        // update:this.test,
                                        createDate:'2022-09-09 11:08:37'
                                     })
                                     .catch(error => {
                                        console.log(error);
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
                    },
                
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