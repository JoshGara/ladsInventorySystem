<template>
    <v-app id="inspire">
      <v-app-bar flat>
        <v-container class="mx-auto d-flex align-center justify-center">
          <v-avatar
            class="me-4 "
            image="/lads_icon.jpg"
            size="80"
          ></v-avatar>
  
          <v-btn
            href="/"
            text="Dashboard"
            variant="text"
          ></v-btn>
          <v-btn
            href="/stock"
            text="Manage Stock"
            variant="text"
          ></v-btn>
          <v-btn
            href="/order"
            text="Orders"
            variant="text"
          ></v-btn>
          <v-spacer></v-spacer>
  
          <v-responsive max-width="160">
            <v-text-field
              density="compact"
              label="Search"
              rounded="lg"
              variant="solo-filled"
              flat
              hide-details
              single-line
            ></v-text-field>
          </v-responsive>
        </v-container>
      </v-app-bar>
  
      <v-main class="bg-grey-lighten-3">
        <v-container>
          <v-row>
            <v-col cols="2">
              <v-sheet rounded="lg">
                <v-list rounded="lg">
                  <v-list-item
                    href="/"
                    title="Dashboard"
                    link
                  ></v-list-item>
                  <v-list-item
                    href="/stock"
                    title="Manage Stock"
                    link
                  ></v-list-item>
                  <v-list-item
                    href="/order"
                    title="Orders"
                    link
                  ></v-list-item>
                  <v-divider class="my-2"></v-divider>
  

                </v-list>
              </v-sheet>
            </v-col>
              
            <v-col>  
              <SuccessMessage v-if="$page.props.flash.message">{{ $page.props.flash.message }}</SuccessMessage>         
              <v-sheet
                min-height="70vh"
                rounded="lg"
              >

                <slot/>
              </v-sheet>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script setup>
  import SuccessMessage from '../components/Stock/SuccessMessage.vue';
    const links = [
      'Dashboard',
      'Stock',
      'Orders'
    ]
    const sidenav = [
        'Dashboard',
        'Manage Stock',
        
    ]
  </script>
  
