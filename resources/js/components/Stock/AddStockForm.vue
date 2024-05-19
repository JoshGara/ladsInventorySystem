<template>
    <div class="pa-3 text-center">
      <v-dialog v-model="dialog" max-width="600">
        <template v-slot:activator="{ props: activatorProps  }">
          <v-row>
            <v-col cols="2" offset="9">
              <AddStockButton v-bind="activatorProps"></AddStockButton>
            </v-col>
          </v-row>
        </template>
        <form @submit.prevent="submitForm">
          <v-card>
            <v-card-title>
              <span class="headline">Add Stock</span>
            </v-card-title>
            <v-card-text>
              <v-row dense>
                <v-col cols="12" md="8" sm="6">
                  <v-text-field
                    label="Product"
                    required
                    v-model="stockForm.product"
                  ></v-text-field>
                </v-col>
  
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    v-model="stockForm.quantity"
                    label="Quantity"
                  ></v-text-field>
                </v-col>
  
                <v-col cols="12" md="6" sm="6">
                  <v-text-field
                    label="Serial Number*"
                    required
                    v-model="stockForm.serialnum"
                  ></v-text-field>
                </v-col>
  
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    label="Unit price*"
                    type="text"
                    required
                    v-model="stockForm.price"
                  ></v-text-field>
                </v-col>
  
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
      </v-dialog>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import AddStockButton from '../../components/Stock/AddStockButton.vue';
  import SaveButton from '../../components/Stock/SaveButton.vue';
  import { useForm } from '@inertiajs/vue3';
  
  const stockForm = useForm({
    product: '',
    quantity: '',
    serialnum: '',
    price: '',
    category: ''
  });
  
 const dialog = ref(false)
  const submitForm = () => {
  stockForm.post('stock', {
    onSuccess: () => {
      stockForm.reset();
      dialog.value = false;
      
    }
  });
};
  </script>


  