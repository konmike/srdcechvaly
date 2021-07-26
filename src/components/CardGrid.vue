<template>
  <ul class="card-grid">
    <li class="item" v-for="(video, index) in data" :key="index">
      <div
        class="hero-image"
        :style="{ backgroundImage: 'url(' + video.thumbnailUrl + ')' }"
      ></div>

      <div class="description">
        <span class="interpret">{{ video.interpret }}</span>
        <span class="title">{{ video.title }}</span>
        <span class="translate">{{ video.translate }}</span>
        <div class="icons">
          <a :href="video.subtitleUrl" title="Stáhnout titulky" class="link">
            <i class="fas fa-closed-captioning"></i>
          </a>
          <a
            :href="'https://youtu.be/' + video.videoId"
            title="Spustit video na YouTube"
            class="link"
            target="_blank"
          >
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    data: {
      type: Array,
    },
  },
};
</script>
