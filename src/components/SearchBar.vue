<template>
  <form action="#" @submit.prevent="search()" class="search-bar">
    <input
      type="text"
      v-model="query"
      class="query"
      autofocus="autofocus"
      @keyup="search"
      @keyup.enter="search"
      placeholder="např. hillsong"
    />
    <input type="submit" value="" class="submit" />
  </form>
</template>

<script>
import _ from "lodash";
// import axios from "axios";

export default {
  data() {
    return {
      query: "",
    };
  },
  methods: {
    search: _.debounce(function () {
      if (this.query === "") this.$router.push({ path: "/" });
      else this.$router.push({ path: "search", query: { q: this.query } });
    }, 700),
  },
};
</script>
