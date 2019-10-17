<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
          <template v-slot:activator="{ on }">
            <v-btn fab small class="green--text" v-on="on">
              <v-icon>mdi-plus</v-icon>
            </v-btn>
          </template>
          
          <v-card>
            <v-card-title>
              <span class="headline">Nouveau produit en stock</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field label="code barre*" required></v-text-field>
                  </v-col>

                  <v-row align="center">
                    <p>Si vous voulez rentrer une DLC</p>
                    <v-date-picker
                      label="Date DLC/DLUO"
                    >
                    </v-date-picker>
                    
                  </v-row>

                  
                  <v-col cols="12">
                    <v-text-field label="quantité*" required></v-text-field>
                  </v-col>
                  
                </v-row>
              </v-container>
              <small>*indique un champ nécessaire</small>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="red darken-1" text @click="dialog = false">Close</v-btn>
              <v-btn color="warning darken-1" text @click="dialog = false">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
  </v-row>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
    }),
  }
</script>

<style scoped>

</style>