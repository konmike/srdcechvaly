<template>
  <div class="main">
    <last-videos v-show="!searching" />
    <search-results v-show="searching" />
  </div>
</template>

<script>
// @ is an alias to /src
import LastVideos from "@/components/LastVideos.vue";
import SearchResults from "@/components/SearchResults.vue";

export default {
  name: "Home",

  components: {
    LastVideos,
    SearchResults,
  },
  data() {
    return {
      searching: false,
    };
  },
  mounted() {
    this.emitter.on("updateQuery", (q) => {
      this.searching = q === "" ? false : true;
    });
  },
};
</script>
