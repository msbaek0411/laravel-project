<template>  

    <div class="h-full">
        <!-- <layout/> -->

        <div class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
            <!-- new Musicvideo -->
            <section class="bg-white py-8">           
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                    <nav id="new" class="w-full top-0 px-6 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                            <a class="uppercase tracking-wide no-underline hover:text-[#008d8d] font-bold text-gray-800 text-xl " href="/">지금 이슈 컨텐츠</a>
                        </div>
                    </nav>
                    <div class="issuemainimg">
                        <div @click="handle_toggleissue(0)">
                            <a class="w-[47%] pl-[2%] pr-[7%]" >
                                <img class="hover:grow hover:shadow-lg w-full h-full"  src="../../../../public/images/issue1.png">
                            </a>
                        </div>
                    </div>
                    <div class="w-[57%] h-[201px] pl-[2%] issuemainconetents">
                        <p class="m-0 text-[28px] ">{{issue2.issue[0].title }}</p>
                        <p class="text-[20px] text-[lightslategray] pb-[2%] ">{{issue2.issue[0].artist}}</p>
                        <p class="text-[14px]">{{issue2.issue[0].href}}</p>
                    </div>

                    <div class="flex issuecontents">
                        <div @click="handle_toggleissue(1)" class="p-[16px]">
                            <a>
                                <img class="hover:grow hover:shadow-lg w-full h-[141px] " src="../../../../public/images/issue2.png">
                                <p class="m-0">{{issue2.issue[1].title }}<strong>[mv]</strong></p>
                                <p class="">{{issue2.issue[1].artist}}</p>
                            </a>
                        </div>
                        <div @click="handle_toggleissue(2)" class="p-[16px]">
                            <a>
                                <img class="hover:grow hover:shadow-lg w-full h-[141px] " src="../../../../public/images/issue3.png">
                                <p class="m-0">{{issue2.issue[2].title }}<strong>[mv]</strong></p>
                                <p class="">{{issue2.issue[2].artist}}</p>
                            </a>
                        </div>

                       <div @click="handle_toggleissue(3)" class="p-[16px]"> 
                            <a>
                                <img class="hover:grow hover:shadow-lg w-full h-[141px] " src="../../../../public/images/issue4.png">
                                <p class="m-0">{{issue2.issue[3].title }}<strong>[mv]</strong></p>
                                <p class="">{{issue2.issue[3].artist}}</p>
                            </a>
                       </div>
                       <div @click="handle_toggleissue(4)" class="p-[16px]">
                            <a>
                                <img class="hover:grow hover:shadow-lg w-full h-[141px] " src="../../../../public/images/issue5.png">
                                <p class="m-0">{{issue2.issue[4].title }}<strong>[mv]</strong></p>
                                <p class="">{{issue2.issue[4].artist}}</p>
                            </a>
                       </div>
                        
                    </div>
                </div>
            </section>

            <!-- top -->
            <section class="bg-white py-8">
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                <nav id="new" class="w-full top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                        <a class="uppercase tracking-wide no-underline hover:text-[#008d8d] font-bold text-gray-800 text-xl " href="MusicList/top">오늘 인기 음악</a>
                        <div class="flex items-center" id="new-nav-content">
                            <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/top">더보기</a>
                            <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/top">
                                
                                <svg class="fill-current hover:text-[#008d8d]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                </svg>
                            </a>

                        </div>
                </div>
                </nav>
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col" v-for="(test, i) in TopList.data.trackList" v-bind:key=i>
                    <div @click="handle_toggleTop(i)">
                        <img class="hover:grow hover:shadow-lg rounded-[27px]" :src="TopList.data.trackList[i].album.imgList[2].url">
                        <p class="m-0 text-ellipsis whitespace-nowrap overflow-hidden text-[18px] pt-[4%] ">{{TopList.data.trackList[i].name}}</p>
                        <p class="text-ellipsis whitespace-nowrap overflow-hidden text-[13px] text-[lightslategray]">{{TopList.data.trackList[i].artistList[0].name}}</p>
                    </div>
                </div>
                

            </div>

            </section>
            <!-- my -->
            <section class="py-8" v-if="loginid == null">           
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                    <nav id="new" class="w-full top-0 px-6 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                            <a class="uppercase tracking-wide no-underline hover:text-[#008d8d] font-bold text-gray-800 text-xl " href="MusicList/MainHome">나의 플레이리스트</a>
                            <div class="flex items-center " id="new-nav-content" >
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/MainHome">더보기</a>
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/MainHome">
                                    <svg class="fill-current hover:text-[#008d8d]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <a href="/login" class="w-full hover:grow hover:shadow-lg">
                        <img src="../../../../public/images/test2.png" alt="" class="w-full">
                    </a>
                   
                </div>
            </section>

            <section class="bg-white py-8" v-else>           
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                    <nav id="new" class="w-full top-0 px-6 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                            <a class="uppercase tracking-wide no-underline hover:text-[#008d8d] font-bold text-gray-800 text-xl " href="MusicList/MainHome">나의 플레이리스트</a>
                            <div class="flex items-center " id="new-nav-content" >
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/MainHome">더보기</a>
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/MainHome">
                                    <svg class="fill-current hover:text-[#008d8d]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col" v-for="(test, i) in MyList.ChatList" v-bind:key=i>
                        <div @click="handle_toggleMy()">
                            <img class="hover:grow hover:shadow-lg rounded-[27px]" :src="MyList.ChatList[i].img2">
                            <p class="m-0 text-ellipsis whitespace-nowrap overflow-hidden text-[18px] pt-[4%] ">{{MyList.ChatList[i].title }}</p>
                            <p class="text-ellipsis whitespace-nowrap overflow-hidden text-[13px] text-[lightslategray]">{{MyList.ChatList[i].artist}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- new -->
            <section class="bg-white py-8">           
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                    <nav id="new" class="w-full top-0 px-6 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                            <a class="uppercase tracking-wide no-underline hover:text-[#008d8d] font-bold text-gray-800 text-xl " href="MusicList/new">오늘 발매 음악</a>
                            <div class="flex items-center " id="new-nav-content" >
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/new">더보기</a>
                                <a class="pl-3 inline-block no-underline hover:text-[#008d8d]" href="MusicList/new">
                                    <svg class="fill-current hover:text-[#008d8d]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                    </svg>
                                </a>
                            </div>
                    </div>
                    </nav>

                    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col" v-for="(test, i) in TopList.data.trackList" v-bind:key=i>
                        <div @click="handle_toggleNew(i)">
                            <img class="hover:grow hover:shadow-lg rounded-[27px]" :src="NewList.data.list[i].album.imgList[2].url">
                            <p class="m-0 text-ellipsis whitespace-nowrap overflow-hidden text-[18px] pt-[4%]">{{NewList.data.list[i].name }}</p>
                            <p class="text-ellipsis whitespace-nowrap overflow-hidden text-[13px] text-[lightslategray]">{{NewList.data.list[i].artistList[0].name}}</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <!-- issuemodal -->
        <div v-show="is_showissue" class="test">
            <button class="btn btn-circle btn-outline float-right" style="color:#008d8d;" @click="handle_cancelissue()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <div class="w-full h-full mt-[9%]">
                <iframe width="700" height="400" :src= issue2.issue[this.idissue].contents title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="test2">
                <button @click="handle_cancelissue()" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>
            </div>

        </div>

        <!-- Newmodal -->
        <div v-show="is_showNew" class="test">
            <div class="w-full h-full">
                <img :src=NewList.data.list[this.idNew].album.imgList[2].url alt="" class="float-left pr-4 pb-[33px]" >
                <div>
                    <li>{{NewList.data.list[this.idNew].fileUpdateDateTime}}</li>
                    <li>{{NewList.data.list[this.idNew].name}}</li>
                    <li>{{NewList.data.list[this.idNew].artistList[0].name}}</li>
                    <li>{{NewList.data.list[this.idNew].album.title}}</li>
                </div>

                <table class="table-auto w-full modallist">
                    <thead class="w-full table">
                        <tr class="css-tr">
                            <th>.no</th>
                            <th>곡/앨범</th>
                        </tr>
                    </thead>
                    <tbody class="w-full table">
                        <tr v-for="(test, i) in songs2" v-bind:key=i style="clear: both;" class="itemtr">
                            <td style="height: 34px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{i + 1}}</td>
                            <td class="" style="height: 34px;">
                                <div class=""  style="height: -1px;">
                                    <!-- <div class="info_img"><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></div> -->
                                    <div class="text_area">
                                        <div class="item">
                                            <li>{{songs2[i].name}}</li>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>   
            </div>
            <div class="test2">
                <button @click="handle_cancelNew()" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>

            </div>
        </div>

        <!-- Topmodal -->
        <div v-show="is_showTop" class="test">
            <div class="w-full h-full">
                <img :src=TopList.data.trackList[this.idTop].album.imgList[2].url alt="" class="float-left pr-4 pb-[33px]" >
                <div>
                    <li>{{TopList.data.trackList[this.idTop].fileUpdateDateTime}}</li>
                    <li>{{TopList.data.trackList[this.idTop].name}}</li>
                    <li>{{TopList.data.trackList[this.idTop].artistList[0].name}}</li>
                    <li>{{TopList.data.trackList[this.idTop].album.title}}</li>
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
                <button @click="handle_cancelTop()" type="button" class="float-left relative top-[32px] right-[0px]">취소</button>

            </div>
        </div>

        

    </div>
</template>

    <script>
        import Axios from 'axios';
        import layout from '../layout/layout.vue'

        export default {
            props: {
                loginid : {
                    type: Number,
                    required: true
                }
            },
            components: {
                layout
            },
            data() {
                return {
                    NewList : [],
                    TopList : [],
                    MyList : [],
                    Mylists : [],
                    issue : [],
                    issue2 : [],
                    songs : [],
                    songs2 : [],
                    is_showissue: false,
                    is_showNew: false,
                    is_showTop: false,
                    idissue : '1',
                    idNew : '1',
                    idTop : '1',
                }
            },
            created() {
                Axios
                    .get('https://www.music-flo.com/api/display/v1/browser/chart/1/track/list?size=8')
                    .then(res => {this.TopList = res.data})
                Axios
                    .get('https://www.music-flo.com/api/meta/v1/track/KPOP/new?page=1&size=8')
                    .then(res=>{this.NewList = res.data})
                Axios
                    .get('/api/issue')
                    .then(res => {this.issue2 = res.data})
                Axios
                    .get(`/api/chatlists/alls/${this.loginid}`)
                    .then(res => {this.MyList = res.data})
            },
            methods: {
                handle_toggleissue(i) {
                    this.is_showissue = !this.is_showissue;
                    this.idissue = i;
                    
                },
                handle_toggleNew(i) {
                    this.is_showNew = !this.is_showNew;
                    this.idNew = i;

                    Axios
                    .get(`https://www.music-flo.com/api/meta/v1/album/${this.NewList.data.list[i].album.id}/track`)
                    .then(res => {this.songs2 = res.data.data.list})
                },
                handle_toggleTop(i) {
                    this.is_showTop = !this.is_showTop;
                    this.idTop = i;

                    Axios
                    .get(`https://www.music-flo.com/api/meta/v1/album/${this.TopList.data.trackList[i].album.id}/track`)
                    .then(res => {this.songs = res.data.data.list})
                },
                handle_toggleMy(){
                    location.replace('/MusicList/MainHome');
                },  
                handle_cancelissue() {
                    this.is_showissue = !this.is_showissue;
                },
                handle_cancelNew() {
                    this.is_showNew = !this.is_showNew;
                },
                handle_cancelTop() {
                    this.is_showTop = !this.is_showTop;
                },
                
                
            }
        }
    </script>
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
@media (max-width: 1176px) {
    .issuecontents {
        display: none;
    }
}

@media (max-width: 768px) {
    .issuemainconetents {
        width: 100%;
    }
    .issuemainimg {
        width: 100%;
    }
}

    </style>