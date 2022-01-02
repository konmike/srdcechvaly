<template>
  <article class="article">
    <last-videos />
  </article>
</template>

<script>
// @ is an alias to /src
import LastVideos from "@/components/LastVideos.vue";

export default {
  name: "Home",

  components: {
    LastVideos,
  },
};
</script>
