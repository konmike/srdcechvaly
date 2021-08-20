<template>
  <div class="side-box" v-cloak>
    <ul class="list">
      <li class="item" v-for="(interpret, index) in playlists" :key="index">
        {{ interpret.title }}
      </li>
    </ul>
    <h3 class="title title--transparent">Všechny titulky</h3>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      nextPage: true,
      playlists: [],
    };
  },
  methods: {
    addPlaylist(data) {
      data.forEach((play) => {
        if (play.snippet.localized.title.includes("| cz titulky")) {
          let titleParse = play.snippet.localized.title.split("|");
          this.playlists.push({
            id: play.id,
            title: titleParse[0].trim(),
            thumbnailUrl: play.snippet.thumbnails.high.url,
          });
        }
      });
    },
    getPlaylists(token) {
      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/playlists?part=snippet&channelId=UCQnju4UrTI_MN14nEtjxrjA&pageToken=${token}&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
        )
        .then((res) => {
          //   console.log(res.data);
          this.addPlaylist(res.data.items);
          if (res.data.nextPageToken !== undefined) {
            this.getPlaylists(res.data.nextPageToken);
          } else {
            this.playlists.sort((a, b) => a.title.localeCompare(b.title));
            console.log(this.playlists);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    axios
      .get(
        `https://youtube.googleapis.com/youtube/v3/playlists?part=snippet&channelId=UCQnju4UrTI_MN14nEtjxrjA&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
      )
      .then((response) => {
        // console.log(response.data);
        this.addPlaylist(response.data.items);
        // console.log(response.data.nextPageTokens);
        // this.nextPage = response.data.nextPageToken != undefined ? true : false;

        if (response.data.nextPageToken !== undefined) {
          this.getPlaylists(response.data.nextPageToken);
        }
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
