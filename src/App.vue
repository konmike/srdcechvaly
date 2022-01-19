<template>
  <header class="header header--top">
    <search-bar />

    <div class="nav">
      <router-link to="/" class="nav__link">Nejnovější</router-link>
      <router-link to="/all" class="nav__link">Všechny</router-link>
      <router-link to="/about" class="nav__link">O projektu</router-link>
    </div>
  </header>
  <router-view v-slot="{ Component }">
    <transition name="fade" mode="out-in">
      <component :is="Component" />
    </transition>
  </router-view>
</template>

<script>
import SearchBar from "@/components/SearchBar.vue";
import ProjectFooter from "@/components/ProjectFooter.vue";

export default {
  components: {
    SearchBar,
    ProjectFooter,
  },
};
</script>

<style lang="scss">
#app {
  font-family: Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease-out;
}
</style>
