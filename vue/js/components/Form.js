export default {
    template: `
        <div class="space-y-6 bg-white rounded-xl shadow-sm p-6">
            <!-- New Assignment Form -->
            <form @submit.prevent="addAssignment" class="space-y-4">
                <div class="space-y-2">
                    <input 
                        v-model="newAssignmentName" 
                        placeholder="New Assignment" 
                        type="text" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        required
                    >
                </div>
                
                <div class="space-y-2">
                    <input 
                        v-model="newAssignmentDescription" 
                        placeholder="Description" 
                        type="text" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        required
                    >
                </div>
                
                <div class="space-y-2">
                    <select 
                        v-model="newAssignmentTag"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        required
                    >
                        <option value="" disabled>Select Tag</option>
                        <option value="fundamentals">Fundamentals</option>
                        <option value="components">Components</option>
                        <option value="advanced">Advanced</option>
                        <option value="projects">Projects</option>
                    </select>
                </div>
                
                <button 
                    type="submit"
                    class="w-full px-6 py-3 rounded-lg font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 
                           hover:from-blue-600 hover:to-purple-700 transition-colors duration-300
                           focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50"
                >
                    Add Assignment
                </button>
            </form>

            <!-- Assignment List Display -->
            <div v-if="assignments.length > 0" class="space-y-3">
                <div v-for="assignment in assignments" 
                     :key="assignment.id"
                     class="p-4 rounded-lg bg-gray-50">
                    <h3 class="font-medium">{{ assignment.name }}</h3>
                    <p class="text-sm text-gray-600">{{ assignment.description }}</p>
                    <span class="text-xs bg-gray-200 px-2 py-1 rounded-full">{{ assignment.tag }}</span>
                </div>
            </div>
        </div>
    `,
    data() {
        return {
            newAssignmentName: '',
            newAssignmentDescription: '',
            newAssignmentTag: '',
            assignments: []
        };
    },
    methods: {
        addAssignment() {
            // Form validation
            if (!this.newAssignmentName.trim() || !this.newAssignmentDescription.trim() || !this.newAssignmentTag) {
                console.warn('All fields are required');
                return;
            }

            // Create new assignment object
            const newAssignment = {
                id: Date.now(), // Using timestamp as a unique ID
                name: this.newAssignmentName.trim(),
                description: this.newAssignmentDescription.trim(),
                tag: this.newAssignmentTag,
                complete: false
            };

            // Add to assignments array
            this.assignments.push(newAssignment);

            // Reset form fields
            this.newAssignmentName = '';
            this.newAssignmentDescription = '';
            this.newAssignmentTag = '';

            console.log('Assignment added:', newAssignment);
        }
    }
};