<template>

    <div class="h-full">

        <a class="btn btn-outline btn-accent" href="/MusicList/top">TOP100</a>
        <a class="btn btn-active btn-accent" href="/MusicList/new">NEW</a>
        <a class="btn btn-outline btn-accent" href="/MusicList/MainHome">Mainhome</a>
        <a class="btn btn-outline btn-accent">test</a>
        
        <h1 class="text-4xl leading-loose">NEW 100 playlist</h1>
        {{tests.data.list[0].name}}

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
                <tr v-for="(test, i) in tests.data.list" :key= test>
                    <td>{{i + 1}}</td>
                    <td><img :src="tests.data.list[i].album.imgList[0].url" alt="NewListImg" class="w-3/12"></td>
                    <td>{{tests.data.list[i].name }}</td>
                    <td>{{tests.data.list[i].artistList[0].name}}</td>
                    <td>{{tests.data.list[i].album.title }}</td>
                    <td>{{tests.data.list[i].playTime }}</td>
                    <td>{{tests.data.list[i].updateDateTime }}</td>
                </tr>

            </tbody>
        </table>
            <button @click="more">{{count}}더보기</button>
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
                    tests: [],
                }
            },
            created() {
                Axios
                    .get(
                        `https://www.music-flo.com/api/meta/v1/track/KPOP/new?page=1&size=20`
                    )
                    .then(res => {
                        this.tests = res.data
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            methods: {
                more() {
                    // count 값을 100으로 변경
                    Axios
                        .get(
                            `https://www.music-flo.com/api/meta/v1/track/KPOP/new?page=1&size=100`
                        )
                        .then(res => {
                            this.tests = res.data
                        })

                }
            }
        }
    </script>
    <style></style>