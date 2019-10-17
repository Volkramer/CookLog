<template>
  <div class="signup">
    <v-card max-width="600px">
      <v-card-title>
        <h2 class="title">Enregistrez vous</h2>
      </v-card-title>
      <v-card-text>
        <v-form class="px-3">
          <v-text-field label="Username" v-model="username" type="username" required></v-text-field>
          <v-text-field label="Email" v-model="email" type="email" required></v-text-field>
          <v-text-field label="Mot de passe" v-model="password" type="password" required></v-text-field>
          <v-text-field
            label="Confirmez votre mot de passe"
            v-model="password_confirmation"
            type="password"
            required
          ></v-text-field>
        </v-form>
        <v-btn v-on:click="register">Validez</v-btn>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Signup",
  data() {
    return {
      username: "",
      email: "",
      password: "",
      password_confirmation: ""
    };
  },
  methods: {
    register: function() {
      let data = {
        name: this.username,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      };
      this.$store
        .dispatch("register", data)
        .then(() => this.$router.push("/"))
        .catch(err => console.log(err));
    }
  }
};
</script>

<style lang="scss" scoped>
</style>