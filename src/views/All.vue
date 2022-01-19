<template>
  <main class="main">
    <div class="container">
      <all-interprets />
      <interpret-detail />
    </div>
  </main>
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
