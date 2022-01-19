<template>
  <main class="main">
    <last-videos />
  </main>
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
