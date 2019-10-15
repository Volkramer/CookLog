<template>
  <div>
    
    <h2>Liste de course</h2>
    <ShoppingListCard v-bind:todos="todos"></ShoppingListCard>
  </div>
</template>

<script>
import ShoppingListCard from '@/components/ShoppingListCard'

  export default {
    components:{
      ShoppingListCard,
    },
    data() {
    return {
      todos: [{
        title: 'Todo A',
        project: 'Project A',
        done: false,
      }, {
        title: 'Todo B',
        project: 'Project B',
        done: true,
      }, {
        title: 'Todo C',
        project: 'Project C',
        done: false,
      }, {
        title: 'Todo D',
        project: 'Project D',
        done: false,
      }],
    };
  },
  }
</script>

<style scoped>

</style>