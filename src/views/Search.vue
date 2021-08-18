<template>
  <div class="main">
    <search-results />
  </div>
</template>

<script>
// @ is an alias to /src
import SearchResults from "@/components/SearchResults.vue";

export default {
  name: "Search",

  components: {
    SearchResults,
  },
};
</script>
