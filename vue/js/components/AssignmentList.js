export default {
    template: `
        <div class="space-y-6 bg-white rounded-xl shadow-sm p-6">
            <!-- Header Section -->
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-bold text-gray-800">Assignments</h3>
                <span class="px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">
                    {{ completedAssignments }} / {{ assignments.length }}
                </span>
            </div>

            <!-- Tags Filter -->
            <div class="flex gap-2 flex-wrap">
                <button 
                    v-for="tag in tags" 
                    @click="currentTag = tag"
                    :class="[
                        'px-3 py-1 rounded-full text-sm font-medium transition-colors',
                        currentTag === tag 
                            ? 'bg-blue-500 text-white' 
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                    ]"
                >
                    {{ tag }}
                </button>
            </div>

            <!-- Assignment List -->
            <div class="space-y-3">
                <div v-for="assignment in filteredAssignments" 
                     :key="assignment.id"
                     class="group flex items-center justify-between p-4 rounded-lg bg-gray-50 
                            hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 
                            transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <input type="checkbox" 
                               v-model="assignment.complete"
                               class="h-5 w-5 text-purple-600 rounded-full 
                                      focus:ring-purple-500 focus:ring-offset-2 transition-all">
                        <div>
                            <span :class="[
                                'font-medium transition-all duration-300',
                                assignment.complete ? 'line-through text-gray-400' : 'text-gray-700'
                            ]">
                                {{ assignment.name }}
                            </span>
                            <div class="text-sm text-gray-500">{{ assignment.description }}</div>
                        </div>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-gray-500 bg-gray-100 rounded">
                        {{ assignment.tag }}
                    </span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="space-y-2">
                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-500"
                         :style="{ width: progress + '%' }">
                    </div>
                </div>
                <div class="text-sm text-gray-600 flex justify-between">
                    <span>Progress</span>
                    <span>{{ progress }}%</span>
                </div>
            </div>
        </div>
    `,
    data() {
        return {
            currentTag: 'all',
            assignments: [
                { 
                    id: 1, 
                    name: 'Learn Vue Basics', 
                    complete: false,
                    description: 'Master core Vue.js concepts and syntax',
                    tag: 'fundamentals'
                },
                { 
                    id: 2, 
                    name: 'Component Architecture', 
                    complete: false,
                    description: 'Understand Vue component system',
                    tag: 'components'
                },
                { 
                    id: 3, 
                    name: 'State Management', 
                    complete: false,
                    description: 'Learn about reactivity and data flow',
                    tag: 'advanced'
                },
                { 
                    id: 4, 
                    name: 'Build ToDo App', 
                    complete: false,
                    description: 'Create a complete application',
                    tag: 'project'
                }
            ]
        };
    },
    computed: {
        tags() {
            const tags = ['all', ...new Set(this.assignments.map(a => a.tag))];
            return tags;
        },
        filteredAssignments() {
            if (this.currentTag === 'all') return this.assignments;
            return this.assignments.filter(a => a.tag === this.currentTag);
        },
        completedAssignments() {
            return this.assignments.filter(a => a.complete).length;
        },
        progress() {
            return Math.round((this.completedAssignments / this.assignments.length) * 100);
        }
    }
};