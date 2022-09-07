<template>

    <div class="h-full">
        <h1 class="text-4xl">Top 100 playlist</h1>
        <!-- {{tests.data.list[0]}} -->
        <table class="table-auto">
            <thead>
                <tr>
                    <th>타이틀</th>
                    <th @click="sortABC">제목</th>
                    <th>아티스트</th>
                    <th>앨범이름</th>
                    <th>플레이리스트</th>
                    <th>발행날짜</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(test, i) in tests.data.trackList">
                    <td><img :src=tests.data.trackList[i].album.imgList[0].url alt=""></td>
                    <td>{{tests.data.trackList[i].name}}</td>
                    <td>{{tests.data.trackList[i].artistList[0].name}}</td>
                    <td>{{tests.data.trackList[i].album.title}}</td>
                    <td>{{tests.data.trackList[i].fileUpdateDateTime}}</td>
                </tr>
            </tbody>
        </table>
    </div>        
</template>

<script>
    import Axios from 'axios';

    export default {
        data() {
            return {tests: [],
                    counts: ''
                    }
        },
        created() {
            Axios
                .get(
                     'https://www.music-flo.com/api/display/v1/browser/chart/1/track/list?size=100'
                )
                .then(res => {
                    this.tests = res.data
                })
                .catch(error => {
                    console.log(error)
                });
        },
        methods : {
            sortABC(){

            }
        }
    }
</script>

            <style></style>