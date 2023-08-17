<template>
    <div class="flex h-screen bg-gray-100">
        <nav class=" bg-gray-800 text-white p-4">
            <div class="text-xl font-semibold mb-4">Just Test Example</div>
            <ul class="space-y-2">
                <li class="flex items-center">
          <span class="w-6 h-6 mr-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"
              />
            </svg>
          </span>
                    <RouterLink
                        to="/upload-csv"
                        class="block text-white hover:text-gray-300 transition-colors duration-300"
                    >
                        Upload CSV
                    </RouterLink>
                </li>

            </ul>
        </nav>
        <main class="flex-1 p-10">
            <RouterView />
        </main>
    </div>
</template>

<script setup>
</script>

<style scoped>
/* Add your custom styles here */
</style>
