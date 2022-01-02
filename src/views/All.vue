<template>
  <article class="article">
    <all-interprets />
    <interpret-detail />
  </article>
</template>

<script>
import AllInterprets from "@/components/AllInterprets.vue";
import InterpretDetail from "@/components/InterpretDetail.vue";

export default {
  components: {
    AllInterprets,
    InterpretDetail,
  },
};
</script>

<style lang="scss" scoped></style>
