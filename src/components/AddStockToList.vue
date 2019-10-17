<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on }">
        <v-btn fab small class="green--text" v-on="on">
          <v-icon>mdi-folder-plus</v-icon>
        </v-btn>
      </template>

      <v-card>
        <v-card-title>
          <span class="headline">Nouveau stock</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field v-model="stockListName" label="nom du nouveau stock*" required></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*indique un champ nécessaire</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn
            v-on:click="addStockList"
            color="warning darken-1"
            text
            @click="dialog = false"
          >Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    dialog: false,
    stockListName: ""
  }),
  methods: {
    addStockList() {
      axios({
        url: "http://api.cooklog.local/api/stocklist",
        method: "POST",
        data: {
          name: this.stockListName
        }
      });
    }
  }
};
</script>

<style scoped>
</style>