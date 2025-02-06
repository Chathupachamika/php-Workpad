export default {
    template: `
        <div class="space-y-4">
            <div class="flex flex-col space-y-2">
                <label for="name" class="text-sm font-medium text-gray-700">Enter your name:</label>
                <input 
                    id="name"
                    v-model="name" 
                    type="text" 
                    placeholder="Your name"
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                >
            </div>
            <div v-if="name" 
                 class="p-4 bg-purple-50 rounded-lg text-purple-700 animate-fade-in">
                Hello, {{ name }}! 👋
            </div>
        </div>
    `,

    data() {
        return {
            name: ''
        };
    }
};