<template>
  <form action="#" @submit.prevent="getData()" class="search-bar">
    <input type="text" v-model="query" class="query" autofocus="autofocus" />
    <!-- <input type="submit" value="" class="submit" /> -->
  </form>
</template>

<script>
export default {
  data() {
    return {
      query: "",
    };
  },
  methods: {
    getData() {
      // console.log(this.query);
      this.emitter.emit("updateQuery", this.query);
    },
  },
  mounted() {
    // window.addEventListener("keyup", () => {
    //   console.log(this.query);
    //   console.log(this.$route.name);
    // console.log(this.$router.push("results"));
    // });
  },
};
</script>

<style lang="scss" scoped></style>
