<template>
  <div class="main main--about">
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
    <about-footer />
  </div>
</template>

<script>
import AboutFooter from "@/components/AboutFooter.vue";
export default {
  components: {
    AboutFooter,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>
