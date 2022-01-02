<template>
  <article class="article">
    <search-results />
  </article>
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
