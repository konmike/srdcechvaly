<template>
  <article class="article article--editorial">
    <header class="header">
      <blockquote class="sidekick">
        <span
          >Túžim sa vrátiť do srdca chvály, kde si jedine Ty, jedine Ty
          Ježiš...</span
        >
        <cite>Richard Čanaky, Hudba dohrává</cite>
      </blockquote>
      <h3 class="title title--transparent">Srdce chvály</h3>
    </header>
    <div class="content">
      <h3 class="title title--transparent">České titulky k:</h3>
      <ul>
        <li>zahraniční křesťanské písně</li>
        <li>spoken word</li>
        <li>trailery</li>
        <li>filmy</li>
        <li>a další...</li>
      </ul>

      <p>
        Své tipy k otitulkování posílejte na:
        <a href="mailto:srdcechvaly@gmail.com">srdcechvaly@gmail.com</a>
      </p>

      <div class="counters">
        <h3 v-cloak>
          <span>{{ subscribers }}</span
          >&nbsp;Odběratelů
        </h3>
        <h3 v-cloak>
          <span>{{ videos }}</span
          >&nbsp;Titulek
        </h3>
      </div>

      <div class="social-links">
        <a
          href="https://1drv.ms/f/s!AlC2uXdxwQQAhzi3uv_ykp9he49I"
          class="link"
          title="Titulky ke stažení"
        >
          <i class="fas fa-closed-captioning"></i>
        </a>
        <a
          href="https://www.youtube.com/c/srdcechvaly"
          class="link"
          title="Youtube - Srdce chvály"
        >
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </article>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      subscribers: 0,
      videos: 0,
    };
  },
  methods: {},

  mounted() {
    axios
      .get(
        `https://youtube.googleapis.com/youtube/v3/channels?part=statistics&id=UCQnju4UrTI_MN14nEtjxrjA&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
      )
      .then((res) => {
        console.log(res);
        // console.log(res.data.items[0].statistics.subscriberCount);
        this.subscribers = res.data.items[0].statistics.subscriberCount;
        this.videos = res.data.items[0].statistics.videoCount;
      });
  },
};
</script>
