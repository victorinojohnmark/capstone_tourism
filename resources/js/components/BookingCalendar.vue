<template>
    <div class="p-5 border border-gray-200 rounded-lg bg-gray-100">
        <form @submit.prevent="submitReservation">
          <VDatePicker v-model.range="reservation.range" @change="console.log(this)" :attributes="attributes" :min-date='new Date()' expanded />
          <div class="flex gap-3 py-3">

            <div id="typeSelector" class="w-full md:w-1/3">
              <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tour Type</label>
              <select id="countries" v-model="reservation.type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Choose an option</option>
                <option>Day Tour</option>
                <option>Overnight</option>
              </select>
            </div>

            <div id="guestCount" class="w-full md:2/3">
              <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How many guest?</label>
              <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                  Adult
                </span>
                <input type="number" required v-model="reservation.adult_count" min="1" class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                  Kids
                </span>
                <input type="number" required v-model="reservation.child_count" min="0" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
            </div>

            

          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit Reservation</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const today = new Date().toISOString().split('T')[0];

const attributes = ref([
  {
    key: 'today',
    highlight: {
      fillMode: 'solid',
      contentClass: 'today'
    },
    // dates: today
  }
]);

const reservation = ref({
  type: 'Day Tour',
  adult_count: 1,
  child_count: 0,
  range: {
    start: new Date(),
    end: new Date()
  }
})

const submitReservation = async () => {

}
</script>