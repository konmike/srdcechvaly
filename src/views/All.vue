<template>
  <div class="main">
    <all-interprets />
    <interpret-detail />
  </div>
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
