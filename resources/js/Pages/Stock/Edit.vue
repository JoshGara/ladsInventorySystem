<template>
    <DashboardLayout>
        <div class="pa-3 text-center">
        <form @submit.prevent="submitForm">
          <v-card>
            <v-card-title>
              <span class="headline">Edit Stock</span>
            </v-card-title>
            <v-card-text>
              <v-row dense>
                <!-- Product Field -->
                <v-col cols="12" md="8" sm="6">
                  <v-text-field
                    label="Product"
                    required
                    v-model="stockForm.product"
                  ></v-text-field>
                </v-col>
  
                <!-- Quantity Field -->
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    v-model="stockForm.quantity"
                    label="Quantity"
                  ></v-text-field>
                </v-col>
  
                <!-- Serial Number Field -->
                <v-col cols="12" md="6" sm="6">
                  <v-text-field
                    label="Serial Number*"
                    required
                    v-model="stockForm.serialnum"
                  ></v-text-field>
                </v-col>
  
                <!-- Unit Price Field -->
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    label="Unit price*"
                    type="text"
                    required
                    v-model="stockForm.price"
                  ></v-text-field>
                </v-col>
  
                <!-- Category Field -->
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['IT', 'Cleaning']"
                    label="Category*"
                    required
                    v-model="stockForm.category"
                  ></v-select>
                </v-col>
              </v-row>
              <small class="text-caption text-medium-emphasis">
                *indicates required field
              </small>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-col cols="12" md="12">
                <SaveButton type="submit"></SaveButton>
              </v-col>
            </v-card-actions>
          </v-card>
        </form>
    </div>
    </DashboardLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import SaveButton from '../../components/Stock/SaveButton.vue';
  import DashboardLayout from '../../Layouts/DashboardLayout.vue';
  
  // Define props to receive data from the parent component
  const props = defineProps({
    stock: Object
  });
  
  // Initialize the form with the stock data or default values
  const stockForm = useForm({
    product: props.stock?.product || '',
    quantity: props.stock?.quantity || '',
    serialnum: props.stock?.serialnum || '',
    price: props.stock?.price || '',
    category: props.stock?.category || ''
  });
  
  const submitForm = () => {
    stockForm.put(route('stock.update', { stock: props.stock.id }), {
      onSuccess: () => {
        stockForm.reset();
        dialog.value = false;
      }
    });
  };
  </script>

  