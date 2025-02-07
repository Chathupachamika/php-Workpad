<template>
    <form @submit.prevent="onSubmit">
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12 ml-5">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <div class="mt-2">
                <div class="sm:col-span-3">
                  <label for="product-name" class="block text-sm/6 font-medium text-gray-900">Product Name</label>
                  <Field 
                    name="productName" 
                    type="text"
                    rules="required"
                    v-slot="{ field, errors }">
                    <input 
                      v-bind="field"
                      id="product-name"
                      autocomplete="off"
                      autofocus
                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                    <span class="text-sm/6 text-red-600">{{ errors && errors[0] }}</span>
                  </Field>
                </div>
  
                <div class="sm:col-span-3 mt-2">
                  <label for="price" class="block text-sm/6 font-medium text-gray-900">Price</label>
                  <Field 
                    name="price" 
                    type="number"
                    rules="required|decimal:2"
                    v-slot="{ field, errors }">
                    <input 
                      v-bind="field"
                      id="price"
                      autocomplete="off"
                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                    <span class="text-sm/6 text-red-600">{{ errors && errors[0] }}</span>
                  </Field>
                </div>
  
                <div class="sm:col-span-3 mt-2">
                  <label for="qty" class="block text-sm/6 font-medium text-gray-900">Quantity</label>
                  <Field 
                    name="quantity" 
                    type="number"
                    rules="required|integer"
                    v-slot="{ field, errors }">
                    <input 
                      v-bind="field"
                      id="qty"
                      autocomplete="off"
                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                    <span class="text-sm/6 text-red-600">{{ errors && errors[0] }}</span>
                  </Field>
                </div>
              </div>
            </div>
  
            <div class="col-span-full">
              <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
              <Field 
                name="description" 
                rules="required"
                v-slot="{ field, errors }">
                <textarea 
                  v-bind="field"
                  id="description"
                  rows="3"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                ></textarea>
                <span class="text-sm/6 text-red-600">{{ errors && errors[0] }}</span>
              </Field>
              <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the product.</p>
            </div>
  
            <div class="col-span-full">
              <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover Photo</label>
              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <PhotoIcon class="mx-auto size-12 text-gray-300" aria-hidden="true" />
                  <div class="mt-4 flex text-sm/6 text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>Upload a file</span>
                      <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
  </template>
  
  <script setup>
  import { PhotoIcon } from '@heroicons/vue/24/solid'
  import { Field } from 'vee-validate'
  
  const onSubmit = async (values) => {
    console.log(values)
  }
  </script>