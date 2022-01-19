<template>
  <main class="main">
    <search-results />
  </main>
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
