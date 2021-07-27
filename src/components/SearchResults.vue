<template>
  <box :dataCounter="results.length">
    <div class="header header--search-results">
      <h3 class="title title--transparent">Hledáte:</h3>
      <h4 class="query title--transparent">{{ query }}</h4>
    </div>
    <div v-show="noResults" class="no-results">
      <h2>Žádné výsledky pro hledaný výraz.</h2>
    </div>
    <card-grid v-show="!noResults" :data="results" />
  </box>
</template>

<script>
import axios from "axios";
import Box from "@/components/Box";
import CardGrid from "@/components/CardGrid";
export default {
  components: {
    Box,
    CardGrid,
  },
  data() {
    return {
      noResults: false,

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
    searching() {
      this.results = [];
      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCQnju4UrTI_MN14nEtjxrjA&maxResults=20&order=date&q=${this.query}&type=video&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
        )
        .then((response) => {
          // console.log(response.data);

          this.noResults = response.data.items.length === 0 ? true : false;

          response.data.items.forEach((item) => {
            // console.log(item);

            axios
              .get(
                `https://youtube.googleapis.com/youtube/v3/videos?part=snippet&id=${item.id.videoId}&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
              )
              .then((res) => {
                let item = res.data.items[0];
                // console.log(item);
                if (!item.snippet.description.includes("#cztitulky")) {
                  // console.log(item.snippet.description);
                  // console.log("fail, sorry");
                  this.next = true;
                }

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
              });
            if (this.next) {
              return;
            }
            // console.log(this.results);
          });
          // if (this.results.length === 0) this.noResults = true;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.emitter.on("updateQuery", (q) => {
      this.query = q;
      this.searching();
    });
  },
};
</script>
