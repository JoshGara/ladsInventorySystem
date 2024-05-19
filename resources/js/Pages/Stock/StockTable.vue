<template>
  
</template>

<script setup>
import { ref } from 'vue';

// Define props to receive data from the controller
const props = defineProps({
  stocks: Array,
  test: String
});

// Define headers for the data table
const headers = [
  { text: 'Product', value: 'product' },
  { text: 'Quantity', value: 'quantity' },
  { text: 'Serial No.', value: 'serialnum' },
  { text: 'Price', value: 'price' },
  { text: 'Actions', value: 'actions', sortable: false }
];

// Methods to handle edit and delete actions
const editItem = (item) => {
  console.log('Edit item:', item);
};

const deleteItem = (item) => {
  console.log('Delete item:', item);
};
</script>
