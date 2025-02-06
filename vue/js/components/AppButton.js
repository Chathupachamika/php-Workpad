export default {
    props: {
        processing: {
            type: Boolean,
            default: false
        }
    },
    template: `
        <button 
            :disabled="processing"
            class="px-6 py-3 rounded-lg font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 
                   hover:from-blue-600 hover:to-purple-700 transition-colors duration-300
                   disabled:opacity-75 disabled:cursor-not-allowed
                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50"
        >
            <span v-if="!processing">
                <slot></slot>
            </span>
            <span v-else class="flex items-center space-x-2">
                <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
                <span>Processing...</span>
            </span>
        </button>
    `
};