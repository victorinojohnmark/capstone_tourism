<template>
    <div class="relative p-5 border border-gray-200 rounded-lg bg-gray-100">
        <div v-if="successReservation" class="absolute flex flex-col items-center justify-center top-0 left-0 w-full h-full bg-white bg-opacity-95 p-6 z-10">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 text-blue-600 pb-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <p class="text-green-600 font-medium text-center">Thank you! Your reservation has been submitted successfully. Our representative will get in touch to you thru email.</p>

        </div>

        <div v-if="errorReservation" class="absolute flex flex-col items-center justify-center top-0 left-0 w-full h-full bg-white bg-opacity-95 p-6 z-10">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 text-red-600 pb-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
          </svg>
          <ul>
            <li class=" list-disc" v-for="(error) in systemStore.error[model]">{{ error[0] }}</li>
          </ul>

        </div>
        <form @submit.prevent="submitReservation">
          <div class=" grid grid-cols-3 gap-3">
            <div class="col-span-1 flex flex-col" v-if="rooms.length > 0">
              <label for="room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room</label>
              <select id="room" v-model="reservation.room_id" @change="handleRoomUpdate()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled :value="null">Choose a room</option>
                <option v-for="room in rooms" :value="room.id">{{ room.name }} ({{ room.capacity }}) pax</option>
              </select>

              <!-- image previewer of room -->
              <img :src="selectedRoom ? `/storage/rooms/${selectedRoom.image}` : 'https://placehold.co/800x800?text=No+room+selected'" class="flex-1 object-cover bg-gray-50 border border-gray-300 rounded-lg mt-3" alt="">
            </div>
            <div class=" col-span-2">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dates</label>
              <VDatePicker v-model.range="reservation.range" :attributes="attributes" :min-date='new Date()' mode="date" expanded />
            </div>
          </div>
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
          <!-- {{ reservation }} -->
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit reservation</button>
          <a href="/user/reservations" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View my reservations</a>
        </form>

        <!-- {{ reservation }} -->
    </div>
</template>

<script setup>
import { nextTick, onBeforeMount, ref } from 'vue'
import { useSystemStore } from '../store/system';
import { format } from 'date-fns'

const systemStore = useSystemStore()

const today = new Date();
const vendor_id = ref(null)
const model = 'reservation'
const successReservation = ref(false)
const errorReservation = ref(false)
const rooms = ref({})
const selectedRoom = ref(null)

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

const handleError = (error) => {
    if(error.response.data.message) {
        systemStore.systemStatus = error.response.data.message
    }

    console.error('Something went wrong: '. error)
    systemStore.error = { [model]: error.response.data.errors }
    console.log(systemStore.error[model])

    errorReservation.value = true
    setTimeout(() => {
        errorReservation.value = false  
    }, 3000)

    return error
}

const emits = defineEmits(['reservationSubmitted'])

const reservation = ref({
  vendor_id,
  type: 'Day Tour',
  room_id: null,
  adult_count: 1,
  child_count: 0,
  range: {
    start: new Date(),
    end: new Date()
  }
})

const resetValues = async () => {
  reservation.value.type = 'Day Tour'
  reservation.value.adult_count = 1
  reservation.value.child_count = 0
  // reservation.value.range.start = null
  // reservation.value.range.end = null
  
  reservation.value.range = { start: new new Date(), end: new new Date() }

  reservation.value.vendor_id = vendor_id.value
  reservation.value.room_id = null
  selectedRoom.value = null

  await nextTick()
}

const handleRoomUpdate = () => {
  // set the selectedRoom value based on the selected room
  selectedRoom.value = rooms.value.find(room => room.id === reservation.value.room_id)
  console.log(selectedRoom.value)
}


const submitReservation = async () => {
  try {
        // Format the dates before sending the request
        const formattedReservation = {
            ...reservation.value,
            guest_count: reservation.value.adult_count + reservation.value.child_count,
            range: {
                start: format(reservation.value.range.start, 'yyyy-MM-dd'),
                end: format(reservation.value.range.end, 'yyyy-MM-dd')
            },

        }
        const response = await window.axios.post('/api/reservations', formattedReservation)

        if(response) {
            console.log(response.data)
            successReservation.value = true
            systemStore.reset()
            resetValues()
            setTimeout(() => {
              successReservation.value = false
                emits('reservationSubmitted')
            }, 10000);
        }

    } catch (error) {
        handleError(error)
    }
}

const getRooms = async () => {
  try {
    const response = await window.axios.get(`/api/rooms/${vendor_id.value}/get`)
    if(response) {
      console.log(response.data)
      rooms.value = response.data
    }
  } catch (error) {
    handleError(error)
  }

}


onBeforeMount(async () => {
  //get id from route
  const url = window.location.pathname;
  const segments = url.split('/');
  vendor_id.value = segments[segments.length - 1];

  await getRooms()
})
</script>