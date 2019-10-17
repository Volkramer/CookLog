<template>
  <v-app>
    <LayoutCookLog>
      <v-content>
        <router-view></router-view>
      </v-content>
    </LayoutCookLog>
  </v-app>
</template>

<script>
import LayoutCookLog from "./layouts/LayoutCookLog";

export default {
  name: "App",
  components: {
    LayoutCookLog
  },
  data: () => ({
    //
  }),
  computed: {
    isLoggedIn: function() {
      return this.$store.getters.isLoggedIn;
    }
  },
  methods: {
    logout: function() {
      this.$store.dispatch("logout");
    }
  }
};
</script>
