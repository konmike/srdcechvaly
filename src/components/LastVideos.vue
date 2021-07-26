<template>
  <box>
    <div class="header header--last-videos">
      <h3 class="title title--transparent">Nejnovější titulky</h3>
    </div>
    <card-grid :data="videos" />
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
      videos: [],
    };
  },
  methods: {
    // getId() {
    //   return this.videos.length
    //     ? Math.max(...this.videos.map((video) => video.id)) + 1
    //     : 0;
    // },
    subtitleUrl(des) {
      let tmp = des.split("********************************************")[1];
      return tmp.substring(8, tmp.length).trim();
    },
  },
  mounted() {
    axios
      .get(
        `https://www.googleapis.com/youtube/v3/playlistItems?playlistId=UUQnju4UrTI_MN14nEtjxrjA&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E&part=snippet&order=date&maxResults=7`
      )
      .then((response) => {
        console.log(response.data);

        response.data.items.forEach((item) => {
          if (!item.snippet.description.includes("#cztitulky")) return;

          let titleTranslate = item.snippet.title.split("|");
          let interpretTitle = titleTranslate[0].split("-");

          this.videos.push({
            // id: this.getId(),
            interpret: interpretTitle[0].trim(),
            title: interpretTitle[1].trim(),
            translate: titleTranslate[1].trim(),
            videoId: item.snippet.resourceId.videoId,
            published: item.snippet.publishedAt,
            subtitleUrl: this.subtitleUrl(item.snippet.description),
            thumbnailUrl: item.snippet.thumbnails.high.url,
          });
        });

        console.log(this.videos);
        // console.log(response.data.items[0].snippet.title);
        // console.log(response.data.items[0].snippet.resourceId.videoId);
        // console.log(response.data.items[0].snippet.publishedAt);
        // console.log(response.data.items[0].snippet.thumbnails.maxres.url);
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
