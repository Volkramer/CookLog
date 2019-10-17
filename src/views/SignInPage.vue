<template>
  <div id="signin">
    <v-card max-width="600px">
      <v-card-title>
        <h2 class="title">Connectez vous</h2>
      </v-card-title>
      <v-card-text>
        <v-form class="px-3">
          <v-text-field label="Email" v-model="email" type="email" required></v-text-field>
          <v-text-field label="Mot de passe" v-model="password" type="password" required></v-text-field>
        </v-form>
        <v-btn v-on:click="login">Validez</v-btn>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Signin",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login: function() {
      let username = this.email;
      let password = this.password;
      this.$store
        .dispatch("login", { username, password })
        .then(() => this.$router.push("/"))
        .catch(err => console.log(err));
    }
  }
};
</script>

<style scoped>
</style>