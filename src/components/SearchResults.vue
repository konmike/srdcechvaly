<template>
  <!-- <transition name="fade"> -->
  <box :dataCounter="results.length" :class="[{ overflow: isAfter }]">
    <header class="header header--search-results">
      <h3 class="title title--transparent">Hledáte:</h3>
      <h4 class="query title--transparent">{{ query }}</h4>
    </header>
    <div v-show="noResults" class="no-results">
      <h2>Žádné výsledky pro hledaný výraz.</h2>
    </div>
    <ul v-show="!noResults" id="cardGrid" class="card-grid">
      <li class="item" v-for="(video, index) in results" :key="index">
        <card :video="video" @isScroll="isAfter = $event" />
      </li>
    </ul>
  </box>
  <!-- </transition> -->
</template>

<script>
import axios from "axios";
import Box from "@/components/Box";
import Card from "@/components/Card";
export default {
  components: {
    Box,
    Card,
  },
  data() {
    return {
      noResults: false,
      isAfter: false,
      query: "",
      results: [],
    };
  },
  methods: {
    subtitleUrl(des) {
      if (des === "") return;
      let tmp = des.split("********************************************")[1];
      return tmp.substring(8, tmp.length).trim();
    },
    addToRes(item) {
      let titleTranslate = item.snippet.title.split("|");
      let interpretTitle = titleTranslate[0].split("-");

      this.results.push({
        // id: this.getId(),
        interpret: interpretTitle[0].trim(),
        title: interpretTitle[1].trim(),
        translate: titleTranslate[1].trim(),
        videoId: item.id,
        published: item.snippet.publishedAt,
        subtitleUrl: this.subtitleUrl(item.snippet.description),
        thumbnailUrl: item.snippet.thumbnails.high.url,
      });
    },
    searching() {
      this.results = [];

      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCQnju4UrTI_MN14nEtjxrjA&maxResults=20&order=date&q=${this.query}&type=video&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
        )
        .then((response) => {
          let res = response.data.items;

          if (!res.length > 0) {
            this.noResults = true;
            return;
          }

          this.noResults = false;

          res.forEach((item) => {
            // console.log(item);

            axios
              .get(
                `https://youtube.googleapis.com/youtube/v3/videos?part=snippet&id=${item.id.videoId}&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
              )
              .then((res) => {
                let item = res.data.items[0];
                // console.log(item);
                if (item.snippet.description.includes("#cztitulky")) {
                  this.addToRes(item);
                }
              })
              .catch((error) => {
                console.log(error);
              });
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  watch: {
    $route(to) {
      // react to route changes...
      this.query = to.query.q;
      this.searching();
    },
  },
  mounted() {
    this.query = this.$route.query.q;
    this.searching();
  },
};
</script>
