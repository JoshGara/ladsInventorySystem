<template>
<DashboardLayout>
    <div class="pa-3 text-center">
        <form @submit.prevent="form">
          <v-card>
            <v-card-title>
              <span class="headline">Order Information</span>
            </v-card-title>
            <v-card-text>
              <v-row dense>
                
                <v-col cols="12" md="8" sm="6">
                    <v-text-field
                        label="Product"
                        v-model="orderForm.product"
                    ></v-text-field>
                </v-col>
  
                
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    v-model="orderForm.orderno"
                    label="Order Number"
                  ></v-text-field>
                </v-col>
  
               
                <v-col cols="12" md="6" sm="6">
                  <v-text-field
                    label="Bill Number*"
                    required
                    v-model="orderForm.billno"
                  ></v-text-field>
                </v-col>
  
               
                <v-col cols="12" md="4" sm="6">
                  <v-text-field
                    label="Number of units sold"
                    type="text"
                    required
                    v-model="orderForm.sold"
                  ></v-text-field>
                </v-col>
              </v-row>
              
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
import DashboardLayout from '../../Layouts/DashboardLayout.vue'
import SaveButton from '../../components/Stock/SaveButton.vue'
import { useForm } from '@inertiajs/vue3';

const orderForm = useForm({
    product: '',
    orderno: '',
    billno: '',
    sold: '',
  });
const form = () => {
  orderForm.post('order', {
    onSuccess: () => {
      orderForm.reset();
    }
  });
};
</script>