<template>
  <box :dataCounter="videos.length" :class="[{ overflow: isAfter }]">
    <transition name="fade">
      <header class="header header--last-videos">
        <h3 class="title title--transparent">Nejnovější titulky</h3>
      </header>
    </transition>
    <ul id="cardGrid" class="card-grid">
      <!-- <transition-group name="fade-card"> -->
      <li class="item" v-for="(video, index) in videos" :key="index">
        <card :video="video" @isScroll="isAfter = $event" />
      </li>
      <!-- </transition-group> -->
    </ul>
  </box>
</template>

<script>
import axios from "axios";
import Box from "@/components/Box";
import Card from "@/components/Card.vue";
import config from "/config";

export default {
  components: {
    Box,
    Card,
  },
  data() {
    return {
      videos: [],
      isAfter: false,
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
    createCard(item) {
      let titleTranslate = item.snippet.title.split("|");
      let interpretTitle = titleTranslate[0].split("-");

      this.videos.push({
        interpret: interpretTitle[0].trim(),
        title: interpretTitle[1].trim(),
        translate: titleTranslate[1].trim(),
        videoId: item.snippet.resourceId.videoId,
        published: item.snippet.publishedAt,
        subtitleUrl: this.subtitleUrl(item.snippet.description),
        thumbnailUrl: item.snippet.thumbnails.high.url,
      });
    },
  },
  mounted() {
    axios
      .get(
        `https://www.googleapis.com/youtube/v3/playlistItems?playlistId=UUQnju4UrTI_MN14nEtjxrjA&key=${config.key}&part=snippet&order=date&maxResults=7`
      )
      .then((response) => {
        // console.log(response.data);

        response.data.items.forEach((item) => {
          if (!item.snippet.description.includes("#cztitulky")) return;
          this.createCard(item);
        });
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style lang="scss" scoped>
.fade-card-enter-active {
  animation: card 2s forwards;
}

.fade-enter-active {
  animation: componentFade 2s forwards;
}

.fade-leave-active {
  opacity: 0;
  // transform: scale(0);
}
.fade-leave-from {
  opacity: 0;
  // transform: scale(0);
}

@keyframes componentFade {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}
@keyframes card {
  from {
    height: 0;
  }

  to {
    height: 1;
  }
}
</style>
