<template>
  <form action="#" @submit.prevent="getData()" class="search-bar">
    <input
      type="text"
      v-model="query"
      class="query"
      autofocus="autofocus"
      @keyup="search"
    />
    <!-- <input type="submit" value="" class="submit" /> -->
  </form>
</template>

<script>
import _ from "lodash";
import axios from "axios";

export default {
  data() {
    return {
      query: "",
    };
  },
  methods: {
    search: _.debounce(function () {
      axios
        .get(
          `https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCQnju4UrTI_MN14nEtjxrjA&maxResults=20&order=date&q=${this.query}&type=video&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
        )
        .then((response) => {
          // console.log(response.data.items);

          this.emitter.emit("updateQuery", this.query);
          this.emitter.emit("searchResults", response.data.items);
        })
        .catch((error) => {
          console.log(error);
        });
    }, 700),
    getData() {
      console.log("Give me some data");
    },
  },
};
</script>

<style lang="scss" scoped></style>
