import AppButton from "./AppButton.js";
import AssignmentList from "./AssignmentList.js";
import GreetingInput from "./GreetingInput.js";

export default {
    components: {
        AppButton,
        AssignmentList,
        GreetingInput
    },
    template: `
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 p-8">
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-xl p-8 space-y-8">
                <!-- Header Section -->
                <header class="text-center">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Vue 3 Basics
                    </h1>
                    <p class="text-gray-600 mt-2">Learning Vue.js step by step</p>
                </header>

                <!-- Interactive Components -->
                <div class="space-y-6">
                    <greeting-input class="animate-fade-in"></greeting-input>
                    <assignment-list class="animate-slide-in"></assignment-list>
                </div>

                <!-- Components Demo Section -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <h2 class="text-2xl font-semibold text-center text-purple-600 mb-6">
                        Vue Components
                    </h2>
                    <div class="flex justify-center">
                        <app-button 
                            @click="toggleProcessing" 
                            :processing="isProcessing"
                            class="transform hover:scale-105 transition-transform"
                        >
                            Submit
                        </app-button>
                    </div>
                </div>
            </div>
        </div>
    `,
    data() {
        return {
            isProcessing: false
        };
    },
    methods: {
        toggleProcessing() {
            this.isProcessing = true;
            setTimeout(() => {
                this.isProcessing = false;
            }, 2000);
        }
    }
};