<template>
    <DashboardLayout>
      <AddStockForm></AddStockForm>
      <div>
        <v-table>
         <thead>
          <tr>
            <th v-for="head in headers" class="text-left">
             {{ head.title }}
            </th>        
            </tr>
        </thead>
    <tbody>
      <tr
        v-for="stock in stocks"
        :key="stock.id"
      >
        <td link>{{ stock.product }}</td>
        <td link>{{ stock.quantity }}</td>
        <td link>{{ stock.serialnum }}</td>
        <td link>{{ stock.price }}</td>
        <td link>{{ stock.category }}</td>
        <td>
          <Link :href="route('stock.edit', stock.id)">
                <v-btn class="me-2" color="blue" size="small">
                  Edit
                </v-btn>
              </Link>
        </td>
        <td>
          <v-btn @click="deleteStock(stock.id)"  size="small" color="red">
            Delete
          </v-btn>
        </td>
      </tr>
    </tbody>
  </v-table>
      </div>
    </DashboardLayout>
  </template>
  
  <script setup>
  import { Link,useForm } from '@inertiajs/vue3';
  import DashboardLayout from '../../Layouts/DashboardLayout.vue';
  import AddStockForm from '../../components/Stock/AddStockForm.vue';

  const headers = [
  {
          title: 'Product',
          align: 'start',
          sortable: false,
          key: 'product',
        },
    { title: 'Quantity', key: 'quantity' },
    { title: 'Serial No.', key: 'serialnum' },
    { title : 'Price', key: 'price' },
    { title : 'Category', key: "category"},
    { title: 'Actions', key: 'actions', sortable: false }
  ];
  
  defineProps({
    stocks: Array
  });

const deleteForm = useForm({});

const deleteStock = (id) => {

  if (confirm('Are you sure you want to delete this?')){
    deleteForm.delete(route('stock.destroy', id));
  }
}
  
  </script>
  