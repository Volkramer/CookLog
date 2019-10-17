<template>
  <v-app id="app">
    <v-navigation-drawer v-model="drawer" app color="#ff880a">
      <template v-slot:prepend>
        <v-list-item>
          <v-list-item-avatar>
            <img src="https://randomuser.me/api/portraits/lego/8.jpg" />
          </v-list-item-avatar>
          <v-list-item-content v-if="!isLoggedIn">
            <v-list-item-title>Non Connecté</v-list-item-title>
            <v-list-item-subtitle>
              <router-link to="/signin">Se connecter</router-link>
            </v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-content v-else>
            <v-list-item-title>{{user.username}}</v-list-item-title>
            <v-list-item-subtitle></v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </template>

      <v-divider></v-divider>
      <v-list>
        <v-list-item @click="$router.push({ name: 'home'})">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="$router.push({ name: 'stocklists'})">
          <v-list-item-action>
            <!-- 
              les icones se trouvent ici:
              https://materialdesignicons.com/ 
            -->
            <v-icon>mdi-folder</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Inventaire</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- <v-list-item @click="router.push({ name: 'recettes'})">
          <v-list-item-action>
            <v-icon>mdi-format-list-bulleted</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Recettes</v-list-item-title>
          </v-list-item-content>
        </v-list-item>-->
        <v-list-item @click="$router.push({ name: 'shoppinglist'})">
          <v-list-item-action>
            <v-icon>mdi-cart-arrow-down</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Listes de Courses</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="$router.push({ name: 'about'})">
          <v-list-item-action>
            <v-icon>mdi-information-variant</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>A propos</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="#1ea80f" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>CookLog</v-toolbar-title>
      <div class="flex-grow-1"></div>
      <v-btn icon>
        <v-icon color="red">mdi-bell</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
    </v-app-bar>

    <v-content>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer app color="#1ea80f" dark>
      <v-col class="text-center" cols="12">
        &copy; {{ new Date().getFullYear() }} —
        <strong>Les 3 Grabataires</strong>
      </v-col>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  props: {
    source: String
  },
  data: () => ({
    drawer: null,
    user: {}
  }),
  mounted() {
    this.user = this.getUser;
  },
  method: {},
  computed: {
    isLoggedIn: function() {
      return this.$store.getters.isLoggedIn;
    },
    getUser: function() {
      return this.$store.getters.userData;
    }
  }
};
</script>