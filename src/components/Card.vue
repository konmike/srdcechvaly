<template>
  <transition name="fade">
    <article v-cloak class="card">
      <div
        class="thumbnail"
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
    </article>
  </transition>
</template>

<script>
export default {
  props: {
    video: {
      type: Object,
    },
  },
  mounted() {
    let element = document.getElementById("cardGrid");
    // console.log(element);
    // console.log("SW " + element.scrollWidth);
    // console.log("CW " + element.clientWidth);
    // console.log(element.scrollWidth > element.clientWidth);
    this.$emit("isScroll", element.scrollWidth > element.clientWidth);
  },
};
</script>

<style lang="scss" scoped>
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease-out;
}
</style>
