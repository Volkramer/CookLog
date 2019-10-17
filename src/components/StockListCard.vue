<template>
  <div>

    <v-card
      max-width="480"
      class="mx-auto"
      v-if="!isInEditMode"
    >      
      <v-list-item three-line>
        <v-list-item-avatar
          tile
          size="40"
          color="grey"
        >
          <img :src="product.image_url" >
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title class="headline mb-1">{{product.product_name}}</v-list-item-title>
          <v-list-item-subtitle>dlc/dluo: {{stock_items.dlc_dluo_date}}</v-list-item-subtitle>
          <v-list-item-subtitle>quantité: {{stock_items.quantity}} </v-list-item-subtitle>
        </v-list-item-content>

        <v-card-actions>
          <v-btn fab small class="red--text">
            <v-icon>mdi-trash-can-outline</v-icon>
          </v-btn>
          <v-btn fab small class="primary--text" @click="editProduct">
            <v-icon>mdi-file-document-edit</v-icon>
          </v-btn>
      </v-card-actions>
      </v-list-item>      
    </v-card>

    <v-card
      max-width="480"
      class="mx-auto"
      v-if="isInEditMode"
    >      
      <v-list-item three-line>
        <v-form>
          <v-list-item-content>
            <v-text-field label="date limite" v-model="productCopy.dlc_dluo_date"></v-text-field>
            <v-text-field label="quantité" v-model="productCopy.quantity"> </v-text-field>
          </v-list-item-content>

          <v-card-actions>
            <v-btn fab small class="green--text" @click="saveEdit">
              <v-icon>mdi-check</v-icon>
            </v-btn>
            <v-btn fab small class="red--text" @click="cancelEdit">
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </v-card-actions>
        </v-form>
      </v-list-item>      
    </v-card>
  </div>
</template>>

<script>
    export default {
      props:{
        
      },
      data() {
        return{
          productCopy: [],
          isInEditMode: false,
        }
      },
      methods:{
        editProduct() {
          const {
            dlc_dluo_date,
            quantity,
          } = this.stock_items;
          this.productCopy = {
            id: this.stock_items.id,
            dlc_dluo_date,
            quantity,
          };
          this.isInEditMode = true;
        },
        saveEdit() {
          this.$emit('saveEdit', this.productCopy);
          this.isInEditMode = false;
        },
        cancelEdit() {
          this.isInEditMode = false;
        },
      }
    }
</script>

<style scoped>

</style>