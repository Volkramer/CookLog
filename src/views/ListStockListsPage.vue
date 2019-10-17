<template>
  <div>
    <h2>Liste des stocks</h2>
    <StockListsCard v-for="stockList in stockLists" :key="stockList.id" :stockList="stockList" />
  </div>
</template>

<script>
import StockListsCard from "../components/StockListsCard.vue";
import StockService from "../services/StockService";

  export default {
    components:{
      StockListsCard,
    },
    data(){
      return{
        stockLists:[]
      }
    },
    created(){
      StockService.getStockLists()
        .then(response => {
          this.stockLists=response.data;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style lang="scss" scoped>

</style>