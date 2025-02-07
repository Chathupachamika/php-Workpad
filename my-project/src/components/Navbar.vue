<template>
  <div>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <!-- Mobile menu button -->
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-none focus:ring-inset">
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
              <XMarkIcon v-else class="block size-6" aria-hidden="true" />
            </DisclosureButton>
          </div>

          <!-- Logo & Navigation -->
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex shrink-0 items-center">
              <img width="40" height="40" src="https://img.icons8.com/stitch/50/shop.png" alt="shop" />
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <router-link
                  v-for="item in navigation"
                  :key="item.name"
                  :to="item.href"
                  :class="[
                    isActive(item.href) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:text-white hover:underline hover:underline-offset-4 hover:decoration-2 hover:decoration-gray-500 hover:line-animation',
                    'rounded-md px-3 py-2 text-sm font-medium'
                  ]"
                  aria-current="page"
                >
                  {{ item.name }}
                </router-link>
              </div>
            </div>
          </div>

          <!-- Notification & Profile -->
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none">
              <span class="sr-only">View notifications</span>
              <BellIcon class="size-6" aria-hidden="true" />
            </button>

            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3">
              <div>
                <MenuButton class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none">
                  <span class="sr-only">Open user menu</span>
                  <img width="30" height="30" src="https://img.icons8.com/ultraviolet/40/user.png" alt="user" />
                </MenuButton>
              </div>
              <transition
                enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
              >
                <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-none">
                  <MenuItem v-slot="{ active }">
                    <router-link to="/profile" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</router-link>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <router-link to="/settings" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</router-link>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <router-link to="/logout" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign out</router-link>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>

      <!-- Mobile Navigation -->
      <DisclosurePanel class="sm:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3">
          <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.href"
            :class="[
              isActive(item.href) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:text-white hover:underline hover:underline-offset-4 hover:decoration-2 hover:decoration-gray-500 hover:line-animation',
              'block rounded-md px-3 py-2 text-base font-medium'
            ]"
          >
            {{ item.name }}
          </router-link>
        </div>
      </DisclosurePanel>
    </Disclosure>
  </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { useRoute } from 'vue-router'

const navigation = [
  { name: 'Home', href: '/' },
  { name: 'Add Product', href: '/add' },
  { name: 'Product Basket', href: '/product' },
  { name: 'Service', href: '/service' }
]

const route = useRoute()

// Function to check if the current route matches the link
const isActive = (path) => route.path === path
</script>

<style scoped>
.hover\:line-animation::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: #fff;
  transition: width .3s;
}

.hover\:line-animation:hover::after {
  width: 100%;
}
</style>
