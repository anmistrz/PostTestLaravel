<x-app-layout>
    <div>
        <div class="max-w-xl mx-auto p-6 lg:p-8">
            <p class="text-2xl font-medium text-gray-900 dark:text-white mb-4">Edit blog</p>
            <form action="/dashboard/post/update" method="POST">
                @csrf
                <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                <input type="hidden" name="postId" value="{{ $data->id }}">
                <div class="space-y-4">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog title</label>
                        <input 
                            type="text" 
                            id="first_name" 
                            name="title"
                            value="{{ $data->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insert Title" required>
                    </div>
                    <div>
                                           
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog content</label>
                        <textarea 
                            id="message" 
                            rows="6" 
                            name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." required
                        >{{ $data->description }}</textarea>
        
                    </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            <a href="/dashboard" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
        </div>
    </div>
</x-app-layout>