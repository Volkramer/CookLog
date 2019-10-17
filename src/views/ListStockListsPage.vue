<template>
  <div>
    <h2>Liste des stocks</h2>
    <StockListsCard v-for="stockList in stockLists" :key="stockList.id" :stockList="stockList" />
    <StockListsCardTest/>
    <StockListsCardTest/>

    <h2>Page Stock</h2>
    <StockListCard/>
    <StockListCard/>
  </div>
</template>

<script>
import StockListsCard from "../components/StockListsCard.vue";
import StockService from "../services/StockService";
import StockListCard from '@/components/StockListCard.vue';
import StockListsCardTest from "../components/StockListsCardTest.vue";

  export default {
    components:{
      StockListsCard,
      StockListCard,
      StockListsCardTest
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