<template>
  <section id="uvodnik" class="section section--editorial">
    <article class="article article--editorial">
      <p>
        "Túžim sa vrátiť do srdca chvály<br />
        kde si jedine Ty, jedine Ty Ježiš" <br />
        <span class="article__citation">(Richard Čanaky, Hudba dohrává)</span>
      </p>
      <p>
        Tento web slouží jako prodloužená ruka mého Youtube kanálu.<br />
        Můžete si zde snadno najít titulky ke své oblíbené písni,<br />
        stejně tak zde v přehledné podobě najdete seznam všech doposud<br />
        vytvořených titulků dle jednotlivých
        <a
          href="http://srdcechvaly.cekuj.net/interpreti"
          class="article__link article__link--editorial"
          title="Interpreti"
          >interpretů</a
        >
        či
        <a
          href="http://srdcechvaly.cekuj.net/zanry"
          class="article__link article__link--editorial"
          title="Žánry"
          >žánrů</a
        >.
      </p>
    </article>
    <footer class="footer footer--editorial">
      <div class="footer__wrap-link">
        <a
          href="https://www.youtube.com/c/srdcechvaly"
          class="footer__link"
          title="Youtube - Srdce chvály"
        >
          <img
            src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/channel.png"
            class="footer__img"
            alt="Youtube"
          />
          <h3 class="footer__title">Youtube kanál</h3>
        </a>
      </div>
      <div class="footer__wrap-link">
        <a
          href="https://1drv.ms/f/s!AlC2uXdxwQQAhzi3uv_ykp9he49I"
          class="footer__link"
          title="Titulky ke stažení"
        >
          <img
            src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/subtitle.png"
            class="footer__img"
            alt="Titulky"
          />
          <h3 class="footer__title">Titulky</h3>
        </a>
      </div>
      <a
        href="#home"
        id="up"
        class="button-up tlacitko"
        style="display: block"
      ></a>
    </footer>
  </section>
</template>

<script>
// import LastVideos from "@/components/LastVideos.vue";
export default {
  components: {
    // LastVideos,
  },
  data() {
    return {
      // query: "",
      // queryResults: [],
      // videos: [],
    };
  },
  methods: {
    getData() {
      // console.log(this.query);
      // this.queryResults = this.videos.filter((video) =>
      //   video.title.toLowerCase().includes(this.query.toLowerCase())
      // );
      // console.log(this.queryResults[0]);
      // `https://youtube.googleapis.com/youtube/v3/search?part=snippet
      //  &channelId=UCQnju4UrTI_MN14nEtjxrjA
      //  &q=${encodeURI(this.query)}
      //  &key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E`
      //key = AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E
      //playlistUploadsId = UUQnju4UrTI_MN14nEtjxrjA
      //channelId = UCQnju4UrTI_MN14nEtjxrjA
      // axios
      //   .get(
      //     // `https://www.googleapis.com/youtube/v3/channels?id=UCQnju4UrTI_MN14nEtjxrjA&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E&part=contentDetails`
      //     `https://www.googleapis.com/youtube/v3/playlistItems?playlistId=UUQnju4UrTI_MN14nEtjxrjA&key=AIzaSyBDHrY2FBFcdwk0OStWbBW4pYjT6cJKj3E&part=snippet&order=date&maxResults=500`
      //   )
      //   .then((response) => {
      //     console.log(response.data);
      //   })
      //   .catch((error) => {
      //     console.log(error);
      //   });
    },
  },
};
</script>
