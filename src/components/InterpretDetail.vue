<template>
  <article class="interpret-detail">
    <div
      class="thumbnail"
      :style="{ backgroundImage: 'url(' + thumbnailUrl + ')' }"
    ></div>

    <div class="description">
      <span class="interpret">{{ name }}</span>
      <div class="icons">
        <a
          :href="'https://youtube.com/playlist?list=' + id"
          title="Spustit playlist na YouTube"
          class="link"
          target="_blank"
        >
          <i class="fab fa-youtube"></i>
        </a>
        <span class="counts">{{ counter }}</span>
        <span class="caption">skladeb</span>
      </div>
    </div>
  </article>
  <div class="song-list">
    <ul class="list">
      <li class="item" v-for="(song, index) in songs" :key="index">
        <a
          :href="'https://youtu.be/' + song.id"
          title="Spustit video na YouTube"
          class="link"
          target="_blank"
        >
          {{ song.name }}
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";
import config from "/config";
export default {
  data() {
    return {
      id: "",
      name: "",
      thumbnailUrl: "",
      songs: [],
      counter: 0,
    };
  },
  methods: {
    parseName(name) {
      let tmp = name.split(" - ");
      return this.name === tmp[0] ? tmp[1] : tmp[0] + " - " + tmp[1];
    },
    addSong(items) {
      items.forEach((element) => {
        this.parseName(element.snippet.title);
        this.songs.push({
          id: element.snippet.resourceId.videoId,
          // name: element.snippet.title,
          name: this.parseName(element.snippet.title),
        });
      });
    },
    getItems(token) {
      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet&pageToken=${token}&playlistId=${this.id}&key=${config.key}`
        )
        .then((res) => {
          // console.log(res.data.items);
          let data = res.data.items.filter(
            (el) => el.snippet.title != "Deleted video"
          );
          // console.log(data);
          this.addSong(data);
          if (res.data.nextPageToken !== undefined) {
            this.getItems(res.data.nextPageToken);
          } else {
            this.counter = this.songs.length;
            this.songs.sort((a, b) => a.name.localeCompare(b.name));
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.emitter.on("activeInterpret", (data) => {
      // console.log(data);
      this.name = data.title;
      this.id = data.id;
      this.thumbnailUrl = data.thumbnailUrl;
      //   this.getItems(data.id);

      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=${this.id}&key=${config.key}`
        )
        .then((res) => {
          // console.log(res.data.items);
          this.songs = [];
          let data = res.data.items.filter(
            (el) => el.snippet.title != "Deleted video"
          );
          // console.log(data);
          this.addSong(data);
          if (res.data.nextPageToken !== undefined) {
            this.getItems(res.data.nextPageToken);
          } else {
            this.counter = this.songs.length;
            this.songs.sort((a, b) => a.name.localeCompare(b.name));
          }
        })
        .catch((error) => {
          console.log(error);
        });
    });
  },
};
</script>
