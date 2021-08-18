<template>
  <div v-cloak :class="[{ empty: dataCounter == 0 }, 'box']">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    dataCounter: {
      type: Number,
      default: 0,
    },
  },
};
</script>
