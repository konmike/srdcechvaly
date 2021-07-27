<template>
  <div :class="[{ empty: dataCounter == 0, overflow: dataCounter > 3 }, 'box']">
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
